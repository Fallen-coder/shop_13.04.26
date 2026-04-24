<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'My App' ?></title>
    <link rel="stylesheet" href="/../../css/style.css">
</head>
<body>
    <div class="auth-bar">
        <?php if (isset($_SESSION['user_id'])): ?>
            <span>Welcome, <strong><?= htmlspecialchars($_SESSION['full_name']) ?></strong></span>
            <a href="/logout">Logout</a>
        <?php else: ?>
            <a href="/login">Login</a>
            <span style="color:rgba(255,255,255,0.3)">|</span>
            <a href="/register">Register</a>
        <?php endif; ?>
    </div>

    <?php include 'nav.php'; ?>

    <div class="layout">
        <?= $content ?>
    </div>
</body>
</html>