<?php
require __DIR__ .'/../db/DB.php';
require_once __DIR__. '/../src/controllers/CustomerController.php';
$conn = DB::connect();
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($requestUri === '/customers') {
    CustomerController::index($conn);
    exit;
}


    echo "<h1>"."Shop"."</h1>";









