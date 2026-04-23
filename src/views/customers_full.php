<div class="layout">


    <h1>Customer Orders Hierarchy</h1>

    <div class="container">
        <ul class="hierarchy-container">
            <?php foreach ($customers as $customer): ?>
                <li class="customer-card">
                    <div class="customer-header">
                        <span><?= htmlspecialchars($customer->name) ?></span>
                        <span style="font-size: 0.8rem; color: #777;">ID: <?= $customer->id ?></span>
                    </div>

                    <?php if (!empty($customer->orders)): ?>
                        <ul class="orders-list">
                            <?php foreach ($customer->orders as $order): ?>
                                <li class="order-item">
                                    <strong>Order #<?= $order->id ?></strong>
                                    <span>Date: <?= $order->order_date ?></span>
                                    <span class="status-pill"><?= htmlspecialchars($order->status) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="no-orders">This customer has no orders yet.</p>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>