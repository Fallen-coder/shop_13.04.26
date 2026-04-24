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
            returnView('customers/customers_full', ['customers' => $customers], 'Customer Hierarchy');
        } else {
            protect('admin');
            $customers = Customer::all();
            returnView('customers/customers', ['customers' => $customers], 'Customer Directory');
        }
    }
}