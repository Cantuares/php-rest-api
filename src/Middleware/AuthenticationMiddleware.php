<?php

namespace App\Middleware;

use App\Libraries\MiddlewareInterface;

class AuthenticationMiddleware implements MiddlewareInterface
{
    public function handle($next)
    {
        $next();
    }
}
