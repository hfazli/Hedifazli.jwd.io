<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "booking_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$package = $_POST['package'];
$date = $_POST['date'];
$end_date = $_POST['end-date'];
$participants = $_POST['participants'];
$gender = $_POST['gender'];

// Insert booking into database
$sql = "INSERT INTO bookings (name, email, phone, package, date, end_date, participants, gender)
VALUES ('$name', '$email', '$phone', '$package', '$date', '$end_date', '$participants', '$gender')";

if ($conn->query($sql) === TRUE) {
    echo "Booking submitted successfully. <a href='manage_bookings.php'>Manage your bookings</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
