<?php
require_once __DIR__ . '/../models/Customer.php';

class CustomerController {
    public static function index() {
        $rawData = Customer::getAllWithOrders();
        $customers = [];

        foreach ($rawData as $row) {
            $id = $row['customer_id'];
            if (!isset($customers[$id])) {
                $customers[$id] = [
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'orders' => []
                ];
            }
            if ($row['order_id']) {
                $customers[$id]['orders'][] = [
                    'id' => $row['order_id'],
                    'date' => $row['order_date'],
                    'status' => $row['status']
                ];
            }
        }

        // Task #11: Delegate to View
        require __DIR__ . '/../views/customers.php';
    }
}