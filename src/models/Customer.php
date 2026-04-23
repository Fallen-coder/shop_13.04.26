<?php
class Customer {
    public static function all() {
        return DB::query("SELECT id, concat(Fname, ' ', Lname) as name, born_at, points FROM customers");
    }

    public static function allWithOrders() {
        // Iegūstam datus vienā pieprasījumā, apvienojot tabulas
        return DB::query("
            SELECT
                c.id as customer_id,
                concat(c.Fname, ' ', c.Lname) as customer_name,
                o.id as order_id,
                o.order_date,
                o.status
            FROM customers c
            LEFT JOIN orders o ON c.id = o.customers_id
            ORDER BY c.id, o.order_date DESC
        ");
    }
}