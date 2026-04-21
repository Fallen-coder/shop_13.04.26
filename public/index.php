<?php
// 1. Load the Composer Autoloader
require __DIR__ . '/../vendor/autoload.php';

// 2. Load Environment Variables (Task #12)
// This ensures DB credentials aren't hardcoded
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// 3. Include Core Classes
require __DIR__ . '/../db/DB.php';
require_once __DIR__ . '/../src/controllers/CustomerController.php';

// 4. Basic Routing logic
// parse_url helps ignore query strings like ?with-orders=full
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($requestUri === '/customers' || $requestUri === '/') {
    // 5. Delegate to Controller (Task #11)
    CustomerController::index();
} else {
    // Basic 404 handler
    http_response_code(404);
    echo "<h1>404 - Page Not Found</h1><p>Try going to /customers</p>";
}