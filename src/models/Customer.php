<?php
class Customer {
    public static function all() {
        return DB::query("SELECT id, concat(Fname, ' ', Lname) as name, born_at, points FROM customers");
    }
}