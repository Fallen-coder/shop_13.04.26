<?php
class DB{

private static $pdo = null;

    // Metode savienojuma izveidei
    public static function connect() {
        if (self::$pdo === null) {
            $host = $_ENV['DB_HOST'];
            $db   = $_ENV['DB_NAME'];
            $user = $_ENV['DB_USER'];
            $pass = $_ENV['DB_PASS'];
            $charset = $_ENV['DB_CHARSET'];


            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

            try {
                self::$pdo = new PDO($dsn, $user, $pass);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Savienojuma kļūda: " . $e->getMessage());
            }
        }
    }

    // Metode vaicājumu izpildei
    public static function query($sqlQuery) {
        self::connect(); // pārliecināmies, ka ir savienojums
        return self::$pdo->query($sqlQuery);
    }

}