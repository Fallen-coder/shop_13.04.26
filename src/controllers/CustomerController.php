<?php
require_once __DIR__ . '/../models/Customer.php';

class CustomerController {
    public static function index() {
        // Task #13: Check for GET parameter
        $withOrders = isset($_GET['with-orders']) && $_GET['with-orders'] === 'full';
        $rawData = $withOrders ? Customer::allWithOrders() : Customer::all();

        $customers = [];
        foreach ($rawData as $row) {
            $id = $row['customer_id'] ?? $row['id'];
            if (!isset($customers[$id])) {
                $customers[$id] = ['name' => $row['name'], 'email' => $row['email'], 'orders' => []];
            }
            if (isset($row['order_id']) && $row['order_id']) {
                $customers[$id]['orders'][] = ['id' => $row['order_id'], 'status' => $row['status'], 'date' => $row['date']];
            }
        }
        // Task #11: Delegate to View
        require __DIR__ . '/../views/customers.php';
    }
}