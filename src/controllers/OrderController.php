<?php
class OrderController {
    public static function index() {
        $orders = DB::query("
            SELECT
                o.id,
                o.order_date,
                concat(c.Fname, ' ', c.Lname) as customer_name,
                o.status,
                o.arival_date  -- Fixed: changed from arrival_date to arival_date
            FROM orders o
            JOIN customers c ON o.customers_id = c.id
        ");

        require __DIR__ . '/../views/orders.php';
    }
}