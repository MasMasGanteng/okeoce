<?php
/**
 * Laravel BCA REST API Config.
 *
 * @author     Pribumi Technology
 * @license    MIT
 * @copyright  (c) 2017, Pribumi Technology
 */
return [
    'default'     => 'main',
    'connections' => [
        'main'        => [
            'corp_id'       => 'BCAAPI2016',
            'client_id'     => '427e2741-7767-449b-afe4-49728b558541',
            'client_secret' => 'dfc964c3-fb78-415e-8954-e2e2cd740e5f',
            'api_key'       => 'ae00e4c3-ccb2-4d46-8654-007b76fa5d5e',
            'secret_key'    => 'fca502d0-9908-4f47-8801-9fd21cb7f1e9',
            'timezone'      => 'Asia/Jakarta',
            'host'          => 'sandbox.bca.co.id',
            'scheme'        => 'https',
            'development'   => true,
            'options'       => [],
            'port'          => 443,
            'timeout'       => 30,
        ],
        'alternative' => [
            'corp_id'       => 'BCAAPI2016',
            'client_id'     => '427e2741-7767-449b-afe4-49728b558541',
            'client_secret' => 'dfc964c3-fb78-415e-8954-e2e2cd740e5f',
            'api_key'       => 'ae00e4c3-ccb2-4d46-8654-007b76fa5d5e',
            'secret_key'    => 'fca502d0-9908-4f47-8801-9fd21cb7f1e9',
            'timezone'      => 'Asia/Jakarta',
            'host'          => 'sandbox.bca.co.id',
            'scheme'        => 'https',
            'development'   => true,
            'options'       => [],
            'port'          => 443,
            'timeout'       => 30,
        ],
    ],
];