<?php
class Order {
    public $id;
    public $order_date;
    public $status;
    public $arival_date;
    public $customer_name;
    public $customers_id;

    public function __construct($data) {
        $this->id = $data['id'] ?? null;
        $this->order_date = $data['order_date'] ?? null;
        $this->status = $data['status'] ?? 'pending';
        $this->arival_date = $data['arival_date'] ?? null;
        $this->customer_name = $data['customer_name'] ?? null;
        $this->customers_id = $data['customers_id'] ?? null;
    }

    public static function all($status = null) {
        $sql = "SELECT o.id, o.order_date, concat(c.Fname, ' ', c.Lname) as customer_name,
                       o.status, o.arival_date
                FROM orders o
                JOIN customers c ON o.customers_id = c.id";

        $stmt = $status ? DB::query($sql . " WHERE o.status = ?", [$status]) : DB::query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // This returns an array of OBJECTS
        return array_map(fn($row) => new self($row), $rows);
    }

    public static function where($column, $value) {
        $stmt = DB::query($sql = "SELECT o.id, o.order_date, concat(c.Fname, ' ', c.Lname) as customer_name,
                       o.status, o.arival_date
                FROM orders o
                JOIN customers c ON o.customers_id = c.id WHERE $column = ?", [$value]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // FIX: Also return an array of OBJECTS so the view doesn't break
        return array_map(fn($row) => new self($row), $rows);
    }

    public static function save($data) {
        return DB::query(
            "INSERT INTO orders (customers_id, status, order_date, arival_date) VALUES (?, ?, ?, ?)",
            [
                (int)$data['customers_id'],
                $data['status'],
                $data['order_date'],
                !empty($data['arival_date']) ? $data['arival_date'] : null
            ]
        );
    }
}