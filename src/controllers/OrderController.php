<?php
class OrderController {
    public static function index() {
        $status = $_GET['status'] ?? null;

        if ($status) {
            // Task #17: Filtering by status
            $orders = DB::query("SELECT * FROM orders WHERE status = ?", [$status]);
        } else {
            // Task #16: All orders
            $orders = DB::query("SELECT * FROM orders");
        }

        require __DIR__ . '/../views/orders.php';
    }
}