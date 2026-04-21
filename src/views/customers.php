<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shop Directory</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    <h1>Shop Directory</h1>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Customer Info</th>
                    <th>Email</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $id => $data): ?>
                    <tr>
                        <td>
                            <strong><?= htmlspecialchars($data['name']) ?></strong>

                            <?php // Task #13: Hierarchical list shown if parameter is full ?>
                            <?php if (isset($_GET['with-orders']) && $_GET['with-orders'] === 'full' && !empty($data['orders'])): ?>
                                <ul class="order-list">
                                    <?php foreach ($data['orders'] as $o): ?>
                                        <li>Order #<?= $o['id'] ?> (<?= $o['status'] ?>)</li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($data['email']) ?></td>
                        <td><?= count($data['orders']) ?> Orders</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>