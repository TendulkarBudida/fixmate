<?php
include("../../../dbconnection.php");

// Prepare the SQL query to fetch specific user data from the database
$sql = "SELECT uname, fname, phoneNo, email, address FROM login_details WHERE profession = 'Electrician'";

// Execute the query
$result = $conn->query($sql);

$userData = [];
if ($result->num_rows > 0) {
    // Fetch the user data as an associative array
    while ($row = $result->fetch_assoc()) {
        $userData[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamer User Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../css/assistance_get.css" rel="stylesheet">
</head>
<body class="container-fluid mt-5 px-5">

<?php if (!empty($userData)): ?>
    <table class='table table-striped table-bordered'>
        <thead class='thead-dark'>
            <tr>
                <th scope='col'>Serial No</th>
                <th scope='col'>Username</th>
                <th scope='col'>Full Name</th>
                <th scope='col'>Phone Number</th>
                <th scope='col'>Email</th>
                <th scope='col'>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php $serialNo = 1; ?>
            <?php foreach ($userData as $row): ?>
                <tr>
                    <th scope='row'><?php echo $serialNo; ?></th>
                    <td><?php echo htmlspecialchars($row['uname']); ?></td>
                    <td><?php echo htmlspecialchars($row['fname']); ?></td>
                    <td><?php echo htmlspecialchars($row['phoneNo']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['address']); ?></td>
                </tr>
                <?php $serialNo++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <div class='alert alert-warning' role='alert'>No user data found for profession: Electrician</div>
<?php endif; ?>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
