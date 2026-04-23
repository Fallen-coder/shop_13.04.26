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

    // 2. Start the "Bucket" (Buffer)
    ob_start();
    include __DIR__ . "/../views/{$viewPath}.php";
    $content = ob_get_clean();

    // 3. Load the layout and pass the $content and $title to it
    include __DIR__ . '/../views/layout.php';
}