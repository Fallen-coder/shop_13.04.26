<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class="action-bar">
    <a href="/orders/create" class="btn-create">+ Jauns pasūtījums</a>
</div>
    <h1>Orders List</h1>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Order Date</th>
                    <th>Customer Name</th>
                    <th>Status</th>
                    <th>Arrival Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($orders)): ?>
                    <?php foreach ($orders as $row): ?>
                        <tr>
                            <td>#<?= $row['id'] ?></td>
                            <td><?= $row['order_date'] ?></td>
                            <td><strong><?= htmlspecialchars($row['customer_name'] ?? '') ?></strong></td>
                            <td><span class="status-pill"><?= htmlspecialchars($row['status'] ?? '') ?></span></td>
                            <td><?= $row['arival_date'] ?? '<em>TBD</em>' ?></td>
                        </tr>
                        <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="5">No orders found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>