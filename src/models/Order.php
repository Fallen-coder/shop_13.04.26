<?php
class Order {
    public $id;
    public $order_date;
    public $status;
    public $customer_name;

    public function __construct($data) {
        $this->id = $data['id'] ?? null;
        $this->order_date = $data['order_date'] ?? null;
        $this->status = $data['status'] ?? null;
        $this->customer_name = $data['customer_name'] ?? null;
    }

    public static function all($status = null) {
        $sql = "SELECT o.id, o.order_date, concat(c.Fname, ' ', c.Lname) as customer_name, o.status
                FROM orders o
                JOIN customers c ON o.customers_id = c.id";

        $stmt = $status ? DB::query($sql . " WHERE o.status = ?", [$status]) : DB::query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map(fn($row) => new self($row), $rows);
    }
}