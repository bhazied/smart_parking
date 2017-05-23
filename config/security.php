<?php

return [
    'access_controle' => [
        //User access controle
        ['uri' => '^api/userss$', 'method' => ['get'], 'roles' => ['ROLE_ADMIN']],
        ['uri' => '^api/users$', 'method' => ['get', 'head'], 'roles' => ['ROLE_ADMIN', 'ROLE_SUPER_ADMIN']],
        ['uri' => '^api/users$', 'method' => ['get', 'head'], 'roles' => ['ROLE_ADMIN', 'ROLE_SUPER_ADMIN']],
        ['uri' => '^api/users/{user}$', 'method' => ['get', 'head'], 'roles' => ['ROLE_ADMIN', 'ROLE_SUPER_ADMIN']],
        ['uri' => '^api/users/{user}$', 'method' => ['put', 'patch'], 'roles' => ['ROLE_ADMIN', 'ROLE_SUPER_ADMIN']],
        ['uri' => '^api/users/{user}$', 'method' => ['delete'], 'roles' => ['ROLE_ADMIN', 'ROLE_SUPER_ADMIN']],
        //Country Access Controle
        ['uri' => '^api/countries$', 'method' => ['get', 'head'], 'roles' => ['ROLE_ADMIN', 'ROLE_SUPER_ADMIN']],
        ['uri' => '^api/countries$', 'method' => ['post'], 'roles' => ['ROLE_ADMIN', 'ROLE_SUPER_ADMIN']],
        ['uri' => '^api/countries$/{user}$', 'method' => ['get', 'head'], 'roles' => ['ROLE_ADMIN', 'ROLE_SUPER_ADMIN']],
        ['uri' => '^api/countries$/{user}$', 'method' => ['put', 'patch'], 'roles' => ['ROLE_ADMIN', 'ROLE_SUPER_ADMIN']],
        ['uri' => '^api/countries$/{user}$', 'method' => ['delete'], 'roles' => ['ROLE_ADMIN', 'ROLE_SUPER_ADMIN']],
    ]
];
