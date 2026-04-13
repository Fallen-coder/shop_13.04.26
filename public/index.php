<?php


require __DIR__ .'/../db/connect.php';
    echo "<h1>"."Shop"."</h1>";







$query = "SELECT
    c.id AS customer_id,
    concat(Fname,Lname) as name, c.email, c.born_at, c.points
    FROM customers c ;";

$result = $conn->query($query);

$currentCustomer = null;

echo "<ol>";
if ($result->num_rows>0){
    while($row = $result->fetch_assoc())
    {

            //iterate over all the fields
            echo "<li>"." id: " . $row["customer_id"]. " ||| Name: " . $row["name"]." ||| email: " . $row["email"]. " ||| born_at: " . $row["born_at"]. " ||| points: " . $row["points"]."</li>"."<br>";
    }
}
else
{
    echo "no customers";
}
echo "</ol>";