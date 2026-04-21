<?php
class Customer {
    public static function all() {
        return DB::query("SELECT c.id, concat(Fname, ' ', Lname) as name, email FROM customers c");
    }

    public static function allWithOrders() {
        return DB::query("SELECT c.id as customer_id, concat(Fname, ' ', Lname) as name, email,
                          o.id as order_id, o.status, o.order_date as date
                          FROM customers c
                          LEFT JOIN orders o ON c.id = o.customers_id");
    }
}