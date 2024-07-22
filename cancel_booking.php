<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "booking_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "DELETE FROM bookings WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Booking canceled successfully. <a href='manage_bookings.php'>Manage your bookings</a>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
