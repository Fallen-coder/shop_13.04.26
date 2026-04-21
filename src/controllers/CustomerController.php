<?php
class CustomerController
{
    public static function index() {
        $query = "SELECT
            c.id AS customer_id,
            concat(Fname, ' ', Lname) as name,
            c.email, c.born_at, c.points
            FROM customers c;";

        $result = DB::query($query);

        // Added class="customer-table"
        echo "<table class='customer-table'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Born At</th>
                        <th>Points</th>
                    </tr>
                </thead>
                <tbody>";

        foreach ($result as $row) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['customer_id']) . "</td>
                    <td>" . htmlspecialchars($row['name']) . "</td>
                    <td>" . htmlspecialchars($row['email']) . "</td>
                    <td>" . htmlspecialchars($row['born_at']) . "</td>
                    <td>" . htmlspecialchars($row['points']) . "</td>
                  </tr>";
        }

        echo "</tbody></table>";
    }
}