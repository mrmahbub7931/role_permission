<?php

namespace App\Models;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $guared = ['*'];

    /**
     * The `users()` function returns a collection of users that belong to the role
     * 
     * @return A collection of users that belong to the role.
     */
    public function users()
    {
        return $this->belongsToMany(User::class,'users_roles')->withTimestamps();
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'roles_permissions')->withTimestamps();
    }
}
