<div class="layout">
    <h1>Create New Order</h1>

    <div class="container">
        <form action="/orders/create" method="POST" class="order-form">
            <div class="form-group">
                <label>Customer:</label>
                <select name="customers_id" required>
                    <?php foreach ($customers as $c): ?>
                        <option value="<?= $c->id ?>"><?= htmlspecialchars($c->name) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Status:</label>
                <select name="status">
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>

            <div class="form-group">
                <label>Order Date:</label>
                <input type="date" name="order_date" value="<?= date('Y-m-d') ?>" required>
            </div>

            <div class="form-group">
                <label>Arrival Date (Estimated):</label>
                <input type="date" name="arival_date">
            </div>

            <button type="submit" class="btn-save">Create Order</button>
            <a href="/orders" class="btn-cancel">Cancel</a>
        </form>
    </div>
</div>