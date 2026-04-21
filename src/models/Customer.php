<?php
class Customer {
    public static function getAllWithOrders() {
        $query = "SELECT
            c.id AS customer_id,
            concat(c.Fname, ' ', c.Lname) as name,
            c.email,
            o.id AS order_id,
            o.order_date,
            o.status,
            o.arival_date
            FROM customers c
            LEFT JOIN orders o ON c.id = o.customers_id
            ORDER BY c.id ASC, o.order_date DESC;";

        return DB::query($query);
    }
}