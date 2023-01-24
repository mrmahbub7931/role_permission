<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\User;

trait HasPermissionTrait {
    /**
     * > This function returns all the agents that belong to this user
     * 
     * @return A collection of User objects.
     */
    public function agents()
    {
        return $this->hasMany(User::class, 'parent_id')->withTimestamps();
    }

    /**
     * This user belongs to many roles.
     * 
     * @return A collection of roles.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function adminPermissions()
    {
        return $this->belongsToMany(Permission::class,'admins_permissions')->withTimestamps();
    }

}