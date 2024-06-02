<?php
session_start();

// Initialize variables
$insert_error = "";
$insert_success = "";

// Connection parameters
$servername = "127.0.0.1";
$username_db = "root";
$password_db = "";
$dbname = "fixmate";

// Connect to the database
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['username'];
    $upass = $_POST['password'];
    $fname = $_POST['name'];
    $phoneNo = $_POST['phn_no'];
    $email = $_POST['email'];
    $profession = "";
    $address = $_POST['address'];

    // Prepare SQL statement to insert user data
    $sql = "INSERT INTO login_details (uname, upass, fname, phoneNo, email, profession, address) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $uname, $upass, $fname, $phoneNo, $email, $profession, $address);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // Data insertion successful
        $insert_success = "User registered successfully!";
    } else {
        // Data insertion failed, set error message
        $insert_error = "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/signup.css">
    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm-password").value;
            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="signup-container">
        <form class="signup-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm();">
            <h2>Sign Up</h2>
            <?php
            if (!empty($insert_error)) {
                echo '<div class="error-message">' . $insert_error . '</div>';
            }
            if (!empty($insert_success)) {
                echo '<div class="success-message">' . $insert_success . '</div>';
            }
            ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="phn_no">Phn.no</label>
                <input type="text" id="phn_no" name="phn_no" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" rows="4" required></textarea>
            </div>
                
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            <button type="submit">Sign Up</button>
            <p style="text-align: center; width: 100%"><a href="../index.php">Login</a></p>
        </form>
    </div>
</body>
</html>