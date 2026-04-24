<nav class="main-nav">
    <a href="/">Home</a>
    
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
        <a href="/customers">Manage Customers</a>
        <a href="/customers?with-orders=full">Hierarchy</a>
        <a href="/orders">All Orders</a>
    <?php elseif (isset($_SESSION['role'])): ?>
        <a href="/orders">My Orders</a>
    <?php endif; ?>
</nav>