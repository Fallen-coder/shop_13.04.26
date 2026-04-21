<?php
class Order {
    // Atlasa visus pasūtījumus ar klienta vārdu
    public static function all($status = null) {
        $sql = "SELECT
                    o.id,
                    o.order_date,
                    concat(c.Fname, ' ', c.Lname) as customer_name,
                    o.status,
                    o.arival_date
                FROM orders o
                JOIN customers c ON o.customers_id = c.id";

        if ($status) {
            return DB::query($sql . " WHERE o.status = ?", [$status]);
        }
        return DB::query($sql);
    }

    // Saglabā jaunu pasūtījumu (vajadzīgs 20. uzdevumam)
    public static function save($data) {
        return DB::query(
            "INSERT INTO orders (customers_id, status, order_date, arival_date) VALUES (?, ?, ?, ?)",
            [
                $data['customers_id'],
                $data['status'],
                $data['order_date'],
                $data['arival_date']
            ]
        );
    }
}