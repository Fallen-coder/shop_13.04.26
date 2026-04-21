# Shop Management System

A professional PHP MVC application for managing customer directories and order tracking.

## 🚀 Features
- **Dashboard Statistics**: Real-time overview of total customers and orders on the home page.
- **Customer Directory**: View customer profiles including IDs, birth dates, and loyalty points.
- **Order Tracking**: Comprehensive list of orders with customer attribution (SQL Joins), status tracking, and arrival dates.
- **Status Filtering**: Filter orders by status (e.g., Pending, Completed) using GET parameters.
- **Unified Navigation**: Global navigation bar for seamless movement between Home, Customers, and Orders.
- **Modern UI**: Fully responsive layout featuring a deep-space gradient background and clean data tables.

## 🛠️ Architecture (MVC)
- **Controllers**: Logic handling in `CustomerController`, `OrderController`, and `HomeController`.
- **Models**: Efficient data fetching using PDO and SQL Joins in the `Customer` and `Order` models.
- **Views**: Clean, logic-free HTML templates with reusable partials (e.g., `nav.php`).
- **Routing**: Centralized entry point in `public/index.php` for clean URI handling.

## 📦 Setup & Installation
1. **Clone the repository**:
   ```bash
   git clone https://github.com/Fallen-coder/shop_13.04.26