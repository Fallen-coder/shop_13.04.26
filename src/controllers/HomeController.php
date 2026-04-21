<?php
class HomeController {
    public static function index() {
        // Fetch the result first
        $customerData = DB::query("SELECT COUNT(*) as count FROM customers")->fetch(PDO::FETCH_ASSOC);
        $orderData = DB::query("SELECT COUNT(*) as count FROM orders")->fetch(PDO::FETCH_ASSOC);

        $stats = [
            'total_customers' => $customerData['count'],
            'total_orders'    => $orderData['count']
        ];

        require __DIR__ . '/../views/home.php';
    }
}