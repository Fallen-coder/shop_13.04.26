<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Home - Stats</title>
</head>
<body>
    <?php include 'nav.php'; ?>
    <h1>Dashboard Statistics</h1>
    <div class="stats-container">
        <div class="stat-box">Customers: <?= $stats['total_customers'] ?></div>
        <div class="stat-box">Orders: <?= $stats['total_orders'] ?></div>
    </div>
</body>
</html>