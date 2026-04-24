<div class="layout">

<h1>Register</h1>
<form action="/register" method="POST" class="order-form">
    <div style="display: flex; gap: 15px;">
        <div class="form-group" style="flex: 1;">
            <label>First Name:</label>
            <input type="text" name="Fname" required>
        </div>
        <div class="form-group" style="flex: 1;">
            <label>Last Name:</label>
            <input type="text" name="Lname" required>
        </div>
    </div>
    <div class="form-group">
        <label>Email:</label>
        <input type="email" name="email" required>
    </div>
    <div class="form-group">
        <label>Password:</label>
        <input type="password" name="password" required>
    </div>
    <button type="submit" class="btn-save">Create Account</button>
</form>
</div>