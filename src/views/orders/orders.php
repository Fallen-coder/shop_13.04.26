<div class="layout">

<div class="action-bar">
    <a href="/orders/create" class="btn-create">+ Create order</a>
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
<?php foreach ($orders as $order): ?>
            <tr>
                <td><?= htmlspecialchars($order->id) ?></td>
                <td><?= htmlspecialchars($order->order_date) ?></td>
                <td><?= htmlspecialchars($order->customer_name) ?></td>
                <td><?= htmlspecialchars($order->status) ?></td>
                <td><?= htmlspecialchars($order->arival_date ?? 'Not set') ?></td>
            </tr>
        <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="5">No orders found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>