<?php
$servername = "172.27.176.1";
$username = "ojsula";
$password = "fallen1234";
$dbname = "store_dev";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
