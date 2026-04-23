<?php
class DB{

private static $pdo = null;
    // Helper to get the PDO instance and ensure connection
    public static function instance() {
        if (self::$pdo === null) {
            self::connect();
        }
        return self::$pdo;
    }
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


    public static function query($sql, $params = []) {
        // 1. Prepare the SQL string
        $stmt = self::instance()->prepare($sql);

        // 2. Execute it passing the data array
        $stmt->execute($params);

        // 3. Return the statement so you can fetch() if needed
        return $stmt;
    }

}