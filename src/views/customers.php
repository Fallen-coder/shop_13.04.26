<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Management</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    <h1>Shop Directory</h1>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $id => $data): ?>
                    <tr class="customer-row" onclick="toggleOrders(<?= $id ?>)">
                        <td><span id="indicator-<?= $id ?>">+</span> <?= htmlspecialchars($data['name']) ?></td>
                        <td><?= htmlspecialchars($data['email']) ?></td>
                        <td><?= count($data['orders']) ?> Orders</td>
                    </tr>

                    <?php // Task #13: Only show orders if the GET parameter is 'full' ?>
                    <?php if (isset($_GET['with-orders']) && $_GET['with-orders'] === 'full'): ?>
                        <tr id="orders-<?= $id ?>" class="orders-container" style="display:none;">
                            <td colspan="3">
                                <div class="order-details">
                                    <h4>Order History</h4>
                                    <?php if (!empty($data['orders'])): ?>
                                        <ul>
                                            <?php foreach ($data['orders'] as $order): ?>
                                                <li>
                                                    <strong>Order #<?= $order['id'] ?></strong> -
                                                    Status: <span class="status-pill"><?= $order['status'] ?></span>
                                                    (Date: <?= $order['date'] ?>)
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php else: ?>
                                        <p>No orders found.</p>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>