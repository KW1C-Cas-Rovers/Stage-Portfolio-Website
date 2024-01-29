<?php

namespace Modules\Roles\app\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RoleUser extends Pivot
{
    use HasFactory;

    protected $table = 'role_user';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'role_id',
        'created_at',
        'updated_at'
    ];

    /**
     * Scope a query to only include users with a given role.
     *
     * @param Builder $query
     * @param int $roleId
     * @return Builder
     */
    public function scopeRole(Builder $query, int $roleId): Builder
    {
        return $query->where('role_id', $roleId);
    }

    /**
     * Scope a query to only include roles for a given user.
     *
     * @param Builder $query
     * @param int $userId
     * @return Builder
     */
    public function scopeUser(Builder $query, int $userId): Builder
    {
        return $query->where('user_id', $userId);
    }
}
