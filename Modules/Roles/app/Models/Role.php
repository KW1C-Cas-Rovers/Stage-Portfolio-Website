<?php

namespace Modules\Roles\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Roles\database\factories\RoleFactory;
use Modules\Users\app\Models\User;

class Role extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * The users that belong to the role.
     *
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->using(RoleUser::class);
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return RoleFactory
     */
    public static function newFactory(): RoleFactory
    {
        return RoleFactory::new();
    }
}
