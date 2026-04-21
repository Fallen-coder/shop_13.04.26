<?php
class CustomerController
{
 public static function index(){
    $query = "SELECT
    c.id AS customer_id,
    concat(Fname, ' ',Lname) as name, c.email, c.born_at, c.points
    FROM customers c ;";

    $result = DB::query($query);

    $currentCustomer = null;


        echo "
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Born At</th>
            <th>Points</th>
        </tr>
    ";

    foreach ($result as $row) {
        echo "
        <tr>
            <td>{$row['customer_id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['born_at']}</td>
            <td>{$row['points']}</td>
        </tr>
        ";
    }

    echo "</table>";


 }

}