<?php
require __DIR__ .'/../db/DB.php';
require_once __DIR__. '/../src/controllers/CustomerController.php';

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($requestUri === '/customers') {
    CustomerController::index();
    exit;
}


    echo "<h1>"."Shop"."</h1>";









