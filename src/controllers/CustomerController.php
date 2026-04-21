<?php
class CustomerController
{
public static function index() {
        // SQL: Join customers with their orders
        $query = "SELECT
            c.id AS customer_id,
            concat(c.Fname, ' ', c.Lname) as name,
            c.email,
            o.id AS order_id,
            o.order_date,
            o.status,
            o.arival_date
            FROM customers c
            LEFT JOIN orders o ON c.id = o.customers_id
            ORDER BY c.id ASC, o.order_date DESC;";

        $result = DB::query($query);

        // We use this array to group orders by customer ID
        $customers = [];
        foreach ($result as $row) {
            $id = $row['customer_id'];
            if (!isset($customers[$id])) {
                $customers[$id] = [
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'orders' => []
                ];
            }
            if ($row['order_id']) {
                $customers[$id]['orders'][] = [
                    'id' => $row['order_id'],
                    'date' => $row['order_date'],
                    'status' => $row['status'],
                    'arrival' => $row['arival_date']
                ];
            }
        }

        echo "<table class='customer-table'>
                <thead>
                    <tr>
                        <th>Customer (Click to expand)</th>
                        <th>Email</th>
                        <th>Orders Count</th>
                    </tr>
                </thead>
                <tbody>";

        foreach ($customers as $id => $data) {
            $orderCount = count($data['orders']);

            // Main Customer Row
            echo "<tr class='customer-row' onclick='toggleOrders($id)'>
                    <td><strong>+</strong> " . htmlspecialchars($data['name']) . "</td>
                    <td>" . htmlspecialchars($data['email']) . "</td>
                    <td>$orderCount order(s)</td>
                  </tr>";

            // Hidden Orders Row
            echo "<tr id='orders-$id' class='orders-container' style='display:none;'>
                    <td colspan='3'>
                        <div class='order-details'>
                            <h4>Order History</h4>";

            if ($orderCount > 0) {
                echo "<table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Arrival</th>
                            </tr>
                        </thead>
                        <tbody>";
                foreach ($data['orders'] as $order) {
                    echo "<tr>
                            <td>#{$order['id']}</td>
                            <td>{$order['date']}</td>
                            <td><span class='status-pill'>{$order['status']}</span></td>
                            <td>{$order['arrival']}</td>
                          </tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<p>No orders found for this customer.</p>";
            }

            echo "      </div>
                    </td>
                  </tr>";
        }

        echo "</tbody></table>";
    }
}