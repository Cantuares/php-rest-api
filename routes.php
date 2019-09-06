<?php
use App\Core\Api;
use App\Libraries\Request;
use App\Libraries\Router;

$middleware = [
    App\Middleware\AuthenticationMiddleware::class
];

$api = new Api(new Router, new Request, $middleware);

// examples
$api->call('GET', '/examples', 'exampleGet');
$api->call('POST', '/example', 'examplePost');
$api->call('PUT', '/example/([0-9]+)', 'examplePut');
$api->call('DELETE', '/example/([0-9]+)', 'exampleDelete');