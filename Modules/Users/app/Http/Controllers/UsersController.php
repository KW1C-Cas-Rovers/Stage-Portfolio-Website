<?php

namespace Modules\Users\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Roles\app\Models\Role;
use Modules\Users\app\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index(): view
    {
        $users = User::with('roles')->get();

        return view('users::index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(): View
    {
        $roles = Role::all();
        return view('users::create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'preposition' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'exists:roles,id'],
        ]);

        $role = Role::find($validatedData['role']);

        if (!$role) {
            return redirect()->back()->with('error', 'Selected role does not exist.');
        }

        try {
            DB::beginTransaction();

            $user = User::create([
                'first_name' => $validatedData['first_name'],
                'preposition' => $validatedData['preposition'] ?? null,
                'last_name' => $validatedData['last_name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);

            $user->roles()->attach($role);

            DB::commit();

            return redirect()->route('users.index')->with('success', 'User created successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            logger()->error('Failed to create user: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create user. Please try again.');
        }
    }

    /**
     * Show the specified resource.
     *
     * @param $id
     * @return view
     */
    public function show($id): View
    {
        $user = User::findOrFail($id);

        return view('users::show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return view
     */
    public function edit($id): View
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('users::edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $request->validate([
            'first_name' => 'nullable|string|max:255',
            'preposition' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $user->id,
            'bio' => 'nullable|string',
            'website' => 'nullable|string|max:255',
        ]);

        $dataToUpdate = $request->only([
            'first_name',
            'preposition',
            'last_name',
            'email',
            'bio',
            'website'
        ]);

        $changes = array_diff_assoc($dataToUpdate, $user->getOriginal());

        if (!empty($changes)) {
            $user->update($dataToUpdate);

            return redirect()->route('users.index')->with('success', 'User information updated successfully.');
        }


        return redirect()->route('users.index')->with('info', 'No changes made.');
    }

    public function updateRole(Request $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        // Validate fields
        $request->validate([
            'role' => 'nullable|exists:roles,id'
        ]);

        $roleId = $request->input('role');

        if ($user->roles()->where('roles.id', $roleId)->exists()) {
            return redirect()->route('users.index')->with('info', 'User already has the selected role.');
        }

        // Assuming assignRole is a custom method in your User model
        $user->syncRoles([$roleId]);

        return redirect()->route('users.index')->with('success', 'User role updated successfully.');
    }

    /**
     * Update the specified password in storage.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function updatePassword(Request $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ], [
            'new_password.min' => 'The new password must be at least 8 characters long.',
        ]);

        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The provided current password is incorrect.']);
        }

        $user->update([
            'password' => Hash::make($request->input('new_password')),
        ]);

        return redirect()->route('users.index')->with('success', 'Password updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
