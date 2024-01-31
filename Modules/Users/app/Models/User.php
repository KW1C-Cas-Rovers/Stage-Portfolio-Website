<?php

namespace Modules\Users\app\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Pages\app\Models\Page;
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
    ];

    protected $guarded = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
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
     * @return bool
     */
    public function hasRole(string $roleName): bool
    {
        return $this->roles()->where('name', $roleName)->exists();
    }

    /**
     * Check if the user has a specific role.
     *
     * @param array $roleNames
     * @return bool
     */
    public function hasAnyRole(array $roleNames): bool
    {
        $matchingRoles = $this->roles()->whereIn('name', $roleNames)->get();

        return $matchingRoles->isNotEmpty();
    }

    /**
     * Get the pages created by the user.
     *
     * @return HasMany
     */
    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return UserFactory
     */
    public static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }
}
