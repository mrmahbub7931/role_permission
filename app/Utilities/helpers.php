<?php 

/* A comment. */
// write dynamic menu function

function menu() {
    return [
        'dashboard' => [
            'icon'          => 'ni-dashboard',
            'route'         => 'dashboard',
            'title'         => 'Dashboard',
            'permission'    => 'all',
            'params'        => []
        ],
        'roles_permissions' =>  [
            'icon'          => 'ni-users',
            'route'         => 'roles.index',
            'title'         => 'Roles & Permissions',
            'permission'    => 'all',
            'params'        =>  []
        ],
        'customers' =>  [
            'icon'          => 'ni-users',
            'route'         => 'customers.index',
            'title'         => 'Customers',
            'permission'    => 'all',
            'params'        =>  []
        ],
        'admins' =>  [
            'icon'          => 'ni-users',
            'route'         => 'admins.index',
            'title'         => 'Admins',
            'permission'    => 'all',
            'params'        =>  []
        ]
    ];
}