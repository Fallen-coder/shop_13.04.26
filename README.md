# Shop Management System 🛍️

A professional Vanilla PHP MVC application for managing customer directories and order tracking, featuring a secure authentication system and a modern, centered UI.

## 🚀 Features
- **Secure Authentication System**: Full Login, Registration, and Logout flow using PHP native sessions and `password_hash` encryption.
- **Role-Based Access Control (RBAC)**: 
    - **Admins**: Can manage the full customer directory, view all orders, and access hierarchy reports.
    - **Customers**: Can register themselves and view only their personal order history.
- **Dashboard Statistics**: Real-time overview of total customers and orders on the home page.
- **Customer Hierarchy**: Advanced view showing customers and their nested orders using SQL Joins and Object Mapping.
- **Dynamic Auth Bar**: A top-right interface that adapts to the user's login state (Login/Register vs. Welcome/Logout).
- **Modern UI**: A professional, centered `1000px` layout with a deep-space gradient background and clean, responsive data tables.

## 🛠️ Architecture (Vanilla MVC)
This project follows a clean Model-View-Controller pattern without the overhead of heavy frameworks:

- **Controllers**: Logic handling in `CustomerController`, `OrderController`, `HomeController`, and `AuthController`.
- **Models**: Data fetching using PDO. Includes an Object-Oriented approach where database rows are mapped to Class instances (e.g., `new Order($data)`).
- **Views & Engine**: Uses a custom-built `returnView()` helper function that:
    - Manages output buffering (`ob_start`).
    - Injects content into a master `layout.php`.
    - Handles global variable extraction for clean templates.
- **Routing**: Centralized entry point in `public/index.php` for clean URI handling and protected route middleware.

## ⚙️ Technical Highlights
- **Session Security**: Implements `session_regenerate_id(true)` on login to prevent session fixation and ensure secure user transitions.
- **Data Consistency**: Models use `array_map` to ensure the Controllers always receive objects, preventing "property on array" errors in the views.
- **SQL Optimization**: Uses prepared statements throughout to prevent SQL Injection and efficient JOINs for relational data.

## 📦 Setup & Installation

1. **Clone the repository**:
   ```bash
   git clone [https://github.com/Fallen-coder/shop_13.04.26](https://github.com/Fallen-coder/shop_13.04.26)
2.**Install dependencies:**:


    composer install

3.**Environment Configuration**:


    copy .env.exsmple .env

Define your DB_HOST, DB_NAME, DB_USER, and DB_PASS.

4.**Database Setup**:

mport the provided SQL schema to your MySQL server.

Important: Ensure your roles table contains admin and customer entries for the RBAC system to function correctly.

5.**Run the Application**:

Point your local server to the public/ directory:


    php -S localhost:8000 -t public
