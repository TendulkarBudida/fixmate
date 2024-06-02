<?php
session_start();

// Database connection (replace with your actual connection details)
$servername = "127.0.0.1";
$username_db = "root";
$password_db = "";
$dbname = "fixmate";

// Create connection
$conn = new mysqli($servername, $username_db, $password_db, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the username from the session
if (!isset($_SESSION['username'])) {
    // If no user is logged in, redirect to login page
    header("Location: ../../index.php");
    exit();
}

$username = $_SESSION['username'];

// Prepare the SQL query to fetch user-specific data from the database
$sql = "SELECT * FROM login_details WHERE uname = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Fetch the user data as an associative array
    $userData = $result->fetch_assoc();
} else {
    // Handle case where no user data is found
    echo "<p>No user data found for username: " . htmlspecialchars($username) . "</p>";
    $conn->close();
    exit();
}

// Close the database connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="../../css/profile.css">
</head>
<body>
    <div class="gradient-background">
        <div class="profile-container">
            <h2>Welcome <strong><?php echo htmlspecialchars($userData['uname']); ?></strong>!</h2>
            <div class="profile-info">
                <p><strong>Name:</strong> <?php echo htmlspecialchars($userData['fname']); ?></p>
                <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($userData['phoneNo']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($userData['email']); ?></p>
                <p><strong>Profession:</strong> <?php echo htmlspecialchars($userData['profession']); ?></p>
                <p><strong>Address:</strong> <?php echo htmlspecialchars($userData['address']); ?></p>
            </div>
        </div>
    </div>
</body>
</html>