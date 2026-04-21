<?php
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

require __DIR__ . '/../db/DB.php';
require_once __DIR__ . '/../src/controllers/CustomerController.php';
require_once __DIR__ . '/../src/controllers/OrderController.php';
require_once __DIR__ . '/../src/controllers/HomeController.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($path) {
    case '/':
    case '':
        HomeController::index();
        break;
    case '/customers':
        CustomerController::index();
        break;
    case '/orders':
        OrderController::index();
        break;
    default:
        http_response_code(404);
        echo "404 Not Found";
        break;
}