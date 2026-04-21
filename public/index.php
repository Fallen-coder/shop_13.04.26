<?php
require __DIR__ .'/../db/DB.php';
require_once __DIR__. '/../src/controllers/CustomerController.php';

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($requestUri === '/customers') {
    CustomerController::index();
    exit;
}


    echo "<h1>"."Shop"."</h1>";









