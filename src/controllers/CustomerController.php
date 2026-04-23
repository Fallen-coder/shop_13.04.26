<?php
require_once __DIR__ . '/../models/Customer.php';

class CustomerController {
    public static function index() {
        $isFull = (isset($_GET['with-orders']) && $_GET['with-orders'] === 'full');

        if ($isFull) {
            $rawData = Customer::allWithOrders();
            $customers = [];

            // Grupējam pasūtījumus zem katra klienta
            foreach ($rawData as $row) {
                $cId = $row['customer_id'];
                if (!isset($customers[$cId])) {
                    $customers[$cId] = [
                        'name' => $row['customer_name'],
                        'orders' => []
                    ];
                }
                if ($row['order_id']) {
                    $customers[$cId]['orders'][] = [
                        'id' => $row['order_id'],
                        'date' => $row['order_date'],
                        'status' => $row['status']
                    ];
                }
            }
            require __DIR__ . '/../views/customers_full.php';
        } else {
            $customers = Customer::all();
            require __DIR__ . '/../views/customers.php';
        }
    }
}