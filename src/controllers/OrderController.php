<?php
require_once __DIR__ . '/../models/Order.php';
require_once __DIR__ . '/../models/Customer.php';

class OrderController {
    public static function index() {
        $status = $_GET['status'] ?? null;
        // Izmanto modeli, nevis raksta SQL šeit
        $orders = Order::all($status);
        require __DIR__ . '/../views/orders.php';
    }

    public static function create() {
        $customers = Customer::all();
        require __DIR__ . '/../views/order_create.php';
    }

    public static function store() {
        Order::save($_POST);
        header('Location: /orders');
        exit;
    }
}