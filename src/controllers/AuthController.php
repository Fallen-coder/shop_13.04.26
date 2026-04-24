<?php

class AuthController {
    public static function showLogin() {
        returnView('login', [], 'Login');
    }

    public static function login() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = DB::query("
            SELECT c.*, r.name as role_name 
            FROM customers c
            JOIN roles r ON c.role_id = r.id
            WHERE c.email = ?
        ", [$email])->fetch();

        // FIX: Changed -> to [] brackets for array access
        if ($user && password_verify($password, $user['password'])) {
            if (session_status() === PHP_SESSION_NONE) session_start();
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role_name'];
            // Concat Fname and Lname for the session
            $_SESSION['full_name'] = $user['Fname'] . ' ' . $user['Lname'];
            
            header('Location: /');
            exit;
        }

        returnView('auth/login', ['error' => 'Invalid credentials.'], 'Login');
    }

    public static function showRegister() {
        returnView('auth/register', [], 'Create Account');
    }

    public static function register() {
        $fname = $_POST['Fname'];
        $lname = $_POST['Lname'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $exists = DB::query("SELECT id FROM customers WHERE email = ?", [$email])->fetch();
        if ($exists) {
            returnView('auth/register', ['error' => 'Email already registered.'], 'Register');
            return;
        }

        DB::query(
            "INSERT INTO customers (Fname, Lname, email, password, role_id) VALUES (?, ?, ?, ?, 2)", 
            [$fname, $lname, $email, $password]
        );

        header('Location: /login?registered=1');
        exit;
    }

    public static function logout() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        session_destroy();
        header('Location: /login');
        exit;
    }
}