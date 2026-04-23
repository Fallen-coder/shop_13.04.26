<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Orders Hierarchy</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Specifiski stili hierarhiskajam sarakstam, lai saderētu ar tavu dizainu */
        .hierarchy-container {
            list-style: none;
            padding: 0;
            width: 100%;
        }

        .customer-card {
            background: rgba(255, 255, 255, 0.95);
            color: #333;
            border-radius: 15px;
            margin-bottom: 20px;
            padding: 20px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .customer-header {
            font-size: 1.2rem;
            font-weight: bold;
            border-bottom: 2px solid #764ba2;
            padding-bottom: 10px;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            color: #111;
        }

        .orders-list {
            list-style: none;
            padding-left: 20px;
        }

        .order-item {
            background: #fdfdfd;
            margin: 8px 0;
            padding: 12px;
            border-left: 5px solid #764ba2;
            border-radius: 5px;
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .no-orders {
            color: #777;
            font-style: italic;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <?php include 'nav.php'; ?>

    <h1>Customer Orders Hierarchy</h1>

    <div class="container">
        <ul class="hierarchy-container">
            <?php foreach ($customers as $cId => $data): ?>
                <li class="customer-card">
                    <div class="customer-header">
                        <span><?= htmlspecialchars($data['name']) ?></span>
                        <span style="font-size: 0.9rem; color: #666;">ID: <?= $cId ?></span>
                    </div>

                    <?php if (!empty($data['orders'])): ?>
                        <ul class="orders-list">
                            <?php foreach ($data['orders'] as $order): ?>
                                <li class="order-item">
                                    <strong>#<?= $order['id'] ?></strong>
                                    <span><?= $order['date'] ?></span>
                                    <span class="status-pill"><?= htmlspecialchars($order['status']) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="no-orders">This client doesn't have orders.</p>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>