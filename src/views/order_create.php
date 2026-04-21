<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/style.css">
    <title>Jauns pasūtījums</title>
</head>
<body>
    <?php include 'nav.php'; ?>
    <h1>Izveidot jaunu pasūtījumu</h1>

    <div class="container">
        <form action="/orders/create" method="POST" class="order-form">
            <div class="form-group">
                <label>Klients:</label>
                <select name="customers_id" required>
                    <?php foreach ($customers as $c): ?>
                        <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Statuss:</label>
                <select name="status">
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>

            <div class="form-group">
                <label>Pasūtījuma datums:</label>
                <input type="date" name="order_date" value="<?= date('Y-m-d') ?>" required>
            </div>

            <div class="form-group">
                <label>Plānotā ierašanās:</label>
                <input type="date" name="arival_date">
            </div>

            <button type="submit" class="btn-save">Saglabāt pasūtījumu</button>
            <a href="/orders" class="btn-cancel">Atcelt</a>
        </form>
    </div>
</body>
</html>