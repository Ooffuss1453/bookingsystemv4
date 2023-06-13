<?php
// Assuming you have the necessary MySQL credentials
$host = 'boekhoudsysteem.mysql.database.azure.com';
$username = 'sekariya';
$password = 'Prullenbak123';
$database = 'db_boekhoud';

// Create a new MySQLi instance
$mysqli = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

// Prepare and bind the insert statement
$stmt = $mysqli->prepare("INSERT INTO uitgaven (item, description, uitgaven_aantal, datum) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $item, $description, $uitgaven_aantal, $datum);

// Get the form data
$item = $_POST['item'];
$description = $_POST['description'];
$uitgaven_aantal = $_POST['uitgaven_aantal'];
$datum = $_POST['datum'];

// Execute the insert statement
$stmt->execute();

// Check for any errors during execution
if ($stmt->error) {
    die("Error during execution: " . $stmt->error);
}

// Close the prepared statement
$stmt->close();

// Close the database connection
$mysqli->close();

// Redirect back to the HTML page after successful submission
header("Location: uitgaven.php");
exit();
?>
