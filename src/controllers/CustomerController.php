<?php
require_once __DIR__ . '/../models/Customer.php';

class CustomerController {
    public static function index() {
        $isFull = (isset($_GET['with-orders']) && $_GET['with-orders'] === 'full');

        if ($isFull) {
            $rawData = Customer::allWithOrders();
            $customers = [];

            foreach ($rawData as $row) {
                $cId = $row['customer_id'];

                // If this customer isn't in our list yet, create the object
                if (!isset($customers[$cId])) {
                    $customers[$cId] = new Customer($row);
                }

                // If the row contains an order, create an Order object and add it
                if ($row['order_id']) {
                    $customers[$cId]->orders[] = new Order([
                        'id' => $row['order_id'],
                        'order_date' => $row['order_date'],
                        'status' => $row['status']
                    ]);
                }
            }
            require __DIR__ . '/../views/customers_full.php';
        } else {
            $customers = Customer::all();
            require __DIR__ . '/../views/customers.php';
        }
    }
}