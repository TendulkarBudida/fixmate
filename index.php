<?php
session_start();

// Initialize variables
$login_error = "";
$username = "";

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
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement to retrieve user credentials
    $sql = "SELECT * FROM login_details WHERE uname = ? AND upass = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    // Execute the prepared statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if a row exists with matching credentials
    if ($result->num_rows == 1) {
        // Authentication successful, start session and redirect to php/isWorking.php with uname parameter
        $_SESSION['username'] = $username;
        header("Location: php/app/app.php");
        exit();
    } else {
        // Authentication failed, set error message
        $login_error = "Invalid username or password";
    }

    // Close statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-container">
        <form class="login-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h2>Login</h2>
            <?php
            if (!empty($login_error)) {
                echo '<div class="error-message">' . $login_error . '</div>';
            }
            ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
            </div>
         
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
       
            <button type="submit">Login</button>
            <p>Don't have an account? <a href="php/isWorking.php">Sign up</a></p>
        </form>
    </div>
</body>
</html>