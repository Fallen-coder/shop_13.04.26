<?php
require_once __DIR__ . '/../models/Order.php';
require_once __DIR__ . '/../models/Customer.php';

class OrderController {
    public static function index() {
        $status = $_GET['status'] ?? null;
        $orders = Order::all($status);
        returnView('orders', ['orders' => $orders], 'orders');
    }

    public static function create() {
        // We need the list of customers for the dropdown menu
        $customers = Customer::all();
        returnView('order_create', ['customers' => $customers], 'Create order');
    }

    public static function store() {
        // This calls the save() method we just added
        Order::save($_POST);

        // Redirect back to the orders list
        header('Location: /orders');
        exit;
    }
}