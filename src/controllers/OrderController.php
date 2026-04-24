<?php
require_once __DIR__ . '/../models/Order.php';
require_once __DIR__ . '/../models/Customer.php';

class OrderController {
    public static function index() {
    protect(); 
    
    $userId = $_SESSION['user_id'];
    $role = $_SESSION['role'];

    if ($role === 'admin') {
        // Ensure this also returns an array to match the customer view
        $orders = Order::all(); 
    } else {
        // This returns an array, which caused the property warning
        $orders = Order::where('customers_id', $userId);
    }

    returnView('orders/orders', ['orders' => $orders], 'Orders');
}

    public static function create() {
        // We need the list of customers for the dropdown menu
        $customers = Customer::all();
        returnView('orders/order_create', ['customers' => $customers], 'Create order');
    }

    public static function store() {
        // This calls the save() method we just added
        Order::save($_POST);

        // Redirect back to the orders list
        header('Location: /orders');
        exit;
    }
}