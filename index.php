<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';

if (\getenv('API_ENV') != 'prd') {
    ini_set('display_errors', 1);
}

use Symfony\Component\Dotenv\Dotenv;
$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

header('Content-Type: application/json');

try {
    require_once __DIR__ . '/routes.php';
} catch (\Exception $exc) {
    http_response_code($exc->getCode());
    echo json_encode([
        'error' => $exc->getMessage(),
    ]);
}