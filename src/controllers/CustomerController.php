<?php
require_once __DIR__ . '/../models/Customer.php';

class CustomerController {
    public static function index() {
        // Just get the data and send it to the view
        $customers = Customer::all();
        require __DIR__ . '/../views/customers.php';
    }
}