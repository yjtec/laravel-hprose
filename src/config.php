<?php
return [
    'tcp_uris'       => json_decode(env('HPROSE_TCP_URIS','["tcp://0.0.0.0:1314"]')),
    'http_uri'       => env('HPROSE_HTTP_URI', 'http://0.0.0.0:8086'),
    'enable_servers' => array_keys(array_filter([
        'hprose.socket_server'      => env('ENABLE_SOCKET_SERVER', true),
        'hprose.swoole_http_server' => env('ENABLE_SWOOLE_HTTP_SERVER', true),
    ], function ($v, $k) {
        return $v;
    }, ARRAY_FILTER_USE_BOTH)),
    'parameter'      => 'App\\Rpc\\Parameters',
    'controller'     => 'App\\Rpc\\Controllers',
];
