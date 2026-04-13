<?php
class DB{

private static $pdo = null;

    // Metode savienojuma izveidei
    public static function connect() {
        if (self::$pdo === null) {
            $host = "172.27.176.1";
            $db   = "store_dev";
            $user = 'ojsula';
            $pass = 'fallen1234';
            $charset = 'utf8mb4';

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