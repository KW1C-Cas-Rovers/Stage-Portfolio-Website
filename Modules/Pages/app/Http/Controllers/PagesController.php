<?php

namespace Modules\Pages\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Modules\Pages\app\Models\Category;
use Modules\Pages\app\Models\Page;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): view
    {
        $pages = Page::with('category')->get();
        return view('pages::index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): view
    {
        $categories = Category::all();
        return view('pages::create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug',
            'content' => 'required|json',
            'category' => 'required|exists:categories,id',
            'view' => 'required|string'
        ]);

        $category = Category::find($validatedData['category']);

        if (!$category) {
            return redirect()->back()->with('error', 'Selected category does not exist.');
        }

        try {
            DB::beginTransaction();

            $page = Page::create([
                'title' => $validatedData['title'],
                'slug' => $validatedData['slug'],
            ]);

            $view = $validatedData['view'];
            $content = view($view, compact('page'));

            $page->update(['content' => $content]);

            $page->category()->attach($category);

            DB::commit();

            return redirect()->route('pages.index')->with('success', 'Page created successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            logger()->error('Failed to create user: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create user. Please try again.');
        }
    }

    /**
     * Show the specified resource.
     * @param $id
     * @return View
     */
    public function show($id): view
    {
        $page = Page::findOrFail($id);
        return view('pages::show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return View
     */
    public function edit($id): view
    {
        $page = Page::findOrFail($id);
        $categories = Category::all();
        return view('pages::edit', compact('page', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $page = Page::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug',
            'content' => 'required|json',
            'category' => 'required|exists:categories,id'
        ]);

        $dataToUpdate = $request->only([
            'title',
            'slug',
            'content',
        ]);

        $changes = array_diff_assoc($dataToUpdate, $page->getOriginal());

        if (!empty($changes)) {
            $page->update($dataToUpdate);

            return redirect()->route('users.index')->with('success', 'User information updated successfully.');
        }
        return redirect()->route('users.index')->with('info', 'No changes made.');
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
