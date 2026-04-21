<?php
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

require __DIR__ . '/../db/DB.php';
require_once __DIR__ . '/../src/controllers/CustomerController.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($path === '/customers' || $path === '/') {
    CustomerController::index();
}