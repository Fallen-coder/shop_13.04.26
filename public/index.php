<?php
require __DIR__ .'/../db/DB.php';
require_once __DIR__. '/../src/controllers/CustomerController.php';
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Customer Directory</h1>

    <div class="container">
        <?php
        if ($requestUri === '/customers') {
            CustomerController::index();
        } else {
            echo "<p>Welcome to the shop! Visit /customers to see the list.</p>";
        }
        ?>
    </div>
</body>
</html>