<?php

namespace App\Models;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;

    protected $guared = ['*'];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_permissions')->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_permissions')->withTimestamps();
    }

    public function childPermissions()
    {
        return $this->hasMany(Permission::class, 'permissions');
    }
}
