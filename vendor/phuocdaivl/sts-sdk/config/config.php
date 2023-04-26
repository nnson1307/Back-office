<?php

return [
    'user_management' => [
        'base_uri'  => env('STS_UM_URI','http://localhost:5100'),
        'client_id' => env('STS_UM_CLIENT_ID', 'd6568c38-49ff-90b1-bfc0-5892e97221a9'),
        'client_secret' => env('STS_UM_CLIENT_SECRET', '1b9005bc-a50e-372b-b7ce-325b8f6b454f')
    ],
    'system_user_management' => [
        'base_uri'  => env('STS_SUM_URI','http://localhost:5100'),
        'client_id' => env('STS_SUM_CLIENT_ID', 'd6568c38-49ff-90b1-bfc0-5892e97221a9'),
        'client_secret' => env('STS_SUM_CLIENT_SECRET', '1b9005bc-a50e-372b-b7ce-325b8f6b454f')
    ],
    'tenant_user_management' => [
        'base_uri'  => env('STS_TUM_URI','http://localhost:5100'),
        'client_id' => env('STS_TUM_CLIENT_ID', 'd6568c38-49ff-90b1-bfc0-5892e97221a9'),
        'client_secret' => env('STS_TUM_CLIENT_SECRET', '1b9005bc-a50e-372b-b7ce-325b8f6b454f')
    ],
    'tenant_management' => [
        'base_uri'  => env('STS_TM_URI', 'http://localhost:5101')
    ],
    'openssl' => [
        'secret_key'  => env('STS_OP_SECRET', ''),
        'salt'        => env('STS_OP_SALT', '')
    ]
];