<?php

return [
    'role_structure' => [
        'administrator' => [
            'admin' => 'c,r,u,d',
            'content' =>  'c,r,u,d',
        ],
        'user' => [
            'content' =>  'c,r,u,d',
        ],
    ],
    'permission_structure' => [
        'cru_user' => [
            'content' =>  'c,r,u,d'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
