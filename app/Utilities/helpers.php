<?php 

/* A comment. */
// write dynamic menu function

// function menu() {
//     return [
//         'dashboard' => [
//             'icon'          => 'ni-dashboard',
//             'route'         => 'dashboard',
//             'title'         => 'Dashboard',
//             'permission'    => 'all',
//             'params'        => []
//         ],
//         'roles_permissions' =>  [
//             'icon'          => 'ni-users',
//             'route'         => 'roles.index',
//             'title'         => 'Platform Administration',
//             'permission'    => 'all',
//             'params'        =>  []
//         ],
//         'customers' =>  [
//             'icon'          => 'ni-users',
//             'route'         => 'customers.index',
//             'title'         => 'Customers',
//             'permission'    => 'all',
//             'params'        =>  []
//         ],
//         'admins' =>  [
//             'icon'          => 'ni-users',
//             'route'         => 'admins.index',
//             'title'         => 'Admins',
//             'permission'    => 'all',
//             'params'        =>  []
//         ]
//     ];
// }

function menu(){    
    return [
        'dashboard' => [
            'icon'          => 'ni-dashboard',
            'route'         => 'dashboard',
            'title'         => 'Dashboard',
            'permission'    => 'all',
            'params'        => [],
            'sub_menu'      => []
        ],
        'roles_permissions' =>  [
            'icon'          => 'ni-users',
            'route'         => 'roles.index',
            'title'         => 'Platform Administration',
            'permission'    => 'all',
            'params'        =>  [],
            'sub_menu' => [                
                'roles' => [                    
                    'icon' => 'minus-sm',                    
                    'route' => 'roles.index',                    
                    'params' => [],                    
                    'title' => 'Roles and Permission',                    
                    'permission' => 'all',
                    'sub_item'  => [
                        [
                            'route'         => 'roles.index',
                            'title'         => 'All Roles',
                            'permission'    => 'all',
                            'params'        =>  [],
                        ],
                        [
                            'route'         => 'roles.create',
                            'title'         => 'Add Roles',
                            'permission'    => 'all',
                            'params'        =>  [],
                        ]
                    ]                
                ],            
                'customer' => [                    
                    'icon' => 'minus-sm',                    
                    'route' => 'customers.index',                    
                    'params' => [],                    
                    'title' => 'Customers',                    
                    'permission' => 'all',
                    'sub_item'  => [
                        [
                            'route'         => 'customers.index',
                            'title'         => 'All Customers',
                            'permission'    => 'all',
                            'params'        =>  [],
                        ],
                        [
                            'route'         => 'customers.create',
                            'title'         => 'Add Customer',
                            'permission'    => 'all',
                            'params'        =>  [],
                        ]
                    ]                
                ],            
                'admin' => [                    
                    'icon' => 'minus-sm',                    
                    'route' => 'admins.index',                    
                    'params' => [],                    
                    'title' => 'Admins',                    
                    'permission' => 'all',
                    'sub_item'  => [
                        [
                            'route'         => 'admins.index',
                            'title'         => 'All Admins',
                            'permission'    => 'all',
                            'params'        =>  [],
                        ],
                        [
                            'route'         => 'admins.create',
                            'title'         => 'Add Admin',
                            'permission'    => 'all',
                            'params'        =>  [],
                        ]
                    ]                
                ],            
            ],
        ],
    ];
}