<?php
$servername = "boekhoudsysteem.mysql.database.azure.com";
$username = "sekariya";
$password = "Prullebak123";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?> 