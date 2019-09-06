<?php

namespace App\Libraries;

interface MiddlewareInterface
{
    public function handle($next);
}