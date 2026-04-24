<?php
/**
 * Renders a view wrapped in the master layout.
 *
 * @param string $viewPath Path to the view file (e.g., 'customers')
 * @param array $data Data to be extracted and used in the view
 * @param string $title The page title
 */
function returnView($viewPath, $data = [], $title = 'My App') {
    // 1. Extract data array into variables ($customers, $stats, etc.)
    extract($data);

    // Check if a user is logged in to provide a full name globally
    $displayName = $_SESSION['full_name'] ?? 'Guest';
    
    // 2. Start the "Bucket" (Buffer)
    ob_start();
    include __DIR__ . "/../views/{$viewPath}.php";
    $content = ob_get_clean();

    // 3. Load the layout and pass the $content and $title to it
    include __DIR__ . '/../views/layout.php';
}



function protect($requiredRole = null) {
    if (session_status() === PHP_SESSION_NONE) session_start();

    // 1. If not logged in, kick to login page
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }

    // 2. If an admin role is required but user is just a customer
    if ($requiredRole === 'admin' && $_SESSION['role'] !== 'admin') {
        die("Access Denied: Admins only.");
    }
}