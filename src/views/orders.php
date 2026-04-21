<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Orders List</title>
</head>
<body>
    <?php include 'nav.php'; ?>

    <h1>All Orders</h1>

    <div class="filter">
        <a href="/orders">All</a> |
        <a href="/orders?status=completed">Completed</a> |
        <a href="/orders?status=pending">Pending</a>
    </div>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($orders)): ?>
                    <?php foreach ($orders as $o): ?>
                        <tr>
                            <td>#<?= $o['id'] ?></td>
                            <td><span class="status-pill"><?= htmlspecialchars($o['status']) ?></span></td>
                            <td><?= $o['order_date'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="3">No orders found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>