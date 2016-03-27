<?php

return [

    'estonia' => [

        'swedbank' => [
            'seller_id' => '',
            'seller_name' => '',
            'seller_acc_num' => '',
            'private_key_passphrase' => '',
            'private_key' => '',
            'public_key' => ''
        ],

        'seb' => [
            'seller_id' => 'uid100010',
            'seller_name' => '',
            'seller_acc_num' => '',
            'private_key_passphrase' => '',
            'private_key' => base_path() . '/ssl/seb/user_key.pem',
            'public_key' => base_path() . '/ssl/seb/bank_cert.pem',
            'request_url' => 'http://localhost:8080/banklink/seb-common'
        ],
    ]
];