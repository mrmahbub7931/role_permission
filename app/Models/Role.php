<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guared = ['id'];

    /**
     * The `users()` function returns a collection of users that belong to the role
     * 
     * @return A collection of users that belong to the role.
     */
    public function users()
    {
        return $this->belongsToMany(User::class,'users_roles');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'roles_permissions');
    }
}
