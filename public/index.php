<?php
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

require __DIR__ . '/../db/DB.php';
require_once __DIR__ . '/../src/controllers/CustomerController.php';
require_once __DIR__ . '/../src/controllers/OrderController.php';
require_once __DIR__ . '/../src/controllers/HomeController.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Šī rinda ir obligāta, lai novērstu "Undefined variable $method" kļūdu:
$method = $_SERVER['REQUEST_METHOD'];

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

    case '/orders/create':
        // Tagad $method būs pieejams šeit:
        if ($method === 'GET') {
            OrderController::create();
        } elseif ($method === 'POST') {
            OrderController::store();
        }
        break;

    default:
        http_response_code(404);
        echo "404 - Lapa nav atrasta";
        break;
}