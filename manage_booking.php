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

// Fetch bookings
$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage Bookings</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <h1>Manage Your Bookings</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Package</th>
                <th>Date</th>
                <th>End Date</th>
                <th>Participants</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["package"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>" . $row["end_date"] . "</td>";
                    echo "<td>" . $row["participants"] . "</td>";
                    echo "<td>" . $row["gender"] . "</td>";
                    echo "<td>
                        <a href='edit_booking.php?id=" . $row["id"] . "'>Edit</a> |
                        <a href='cancel_booking.php?id=" . $row["id"] . "'>Cancel</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No bookings found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <a href="create_booking.php">Create New Booking</a>
</body>
</html>

<?php
$conn->close();
?>
