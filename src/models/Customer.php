<?php
require_once __DIR__ . '/Order.php';

class Customer {
    public $id;
    public $name;
    public $born_at;
    public $points;
    public $orders = []; // This will hold Order objects

    public function __construct($data) {
        // Handle both possible naming conventions from the JOIN result
        $this->id = $data['customer_id'] ?? $data['id'] ?? null;
        $this->name = $data['name'] ?? $data['customer_name'] ?? null;
        $this->born_at = $data['born_at'] ?? null;
        $this->points = $data['points'] ?? 0;
    }

    public static function all() {
        $stmt = DB::query("SELECT id, concat(Fname, ' ', Lname) as name, born_at, points FROM customers");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return array_map(fn($row) => new self($row), $rows);
    }

    public static function allWithOrders() {
        $sql = "SELECT
                    c.id as customer_id,
                    concat(c.Fname, ' ', c.Lname) as customer_name,
                    o.id as order_id,
                    o.order_date,
                    o.status
                FROM customers c
                LEFT JOIN orders o ON c.id = o.customers_id
                ORDER BY c.id, o.order_date DESC";

        $stmt = DB::query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}