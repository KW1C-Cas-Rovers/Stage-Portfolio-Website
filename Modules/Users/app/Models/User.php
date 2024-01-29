<?php

namespace Modules\Users\app\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Roles\app\Models\Role;
use Modules\Roles\app\Models\RoleUser;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'users';

    protected $primaryKey = 'id';

    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'first_name',
        'preposition',
        'last_name',
        'email',
        'password',
        'role',
        'avatar',
        'bio',
        'website',
        'is_active',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be appended to the model's array representations.
     *
     * @var array
     */
    protected $appends = ['full_name'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes'
    ];

    protected $guarded = [
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'two_factor_recovery_codes' => 'json',
    ];

    /**
     * Gets the full name attributes
     *
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        $parts = [$this->first_name, $this->preposition, $this->last_name];

        $trimmedParts  = array_map(fn ($part) => trim($part), array_filter($parts));

        return implode(' ', $trimmedParts) ?: 'User';
    }

    /**
     * Sets the full name attribute
     *
     * @return void
     */
    public function setFullNameAttribute(): void
    {
        $this->attributes['full_name'] = $this->getFullNameAttribute();
    }



    /**
     * The roles that belong to the user.
     *
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class)->using(RoleUser::class);
    }

    /**
     * Sync the roles for the user.
     *
     * @param array $roleIds The IDs of the roles to sync.
     * @return void
     */
    public function syncRoles(array $roleIds): void
    {
        $this->roles()->sync($roleIds);
    }

    /**
     * Assign a role to the user.
     *
     * @param mixed $roleId The ID of the role to assign.
     * @return void
     */
    public function assignRole(mixed $roleId): void
    {
        $this->roles()->attach($roleId);
    }

    /**
     * Detach a role from the user.
     *
     * @param mixed $roleId The ID of the role to detach.
     * @return void
     */
    public function detachRole(mixed $roleId): void
    {
        $this->roles()->detach($roleId);
    }

    /**
     * Check if the user has a specific role.
     *
     * @param string $roleName The name of the role to check for.
     * @return BelongsToMany
     */
    public function hasRole(string $roleName): BelongsToMany
    {
        return $this->roles()->where('name', $roleName);
    }
}
