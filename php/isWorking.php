<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker Question</title>
    <link rel="stylesheet" href="../css/isWorking.css">
    <script>
        function redirectToNextPage(isWorker) {
            if (isWorker) {
                window.location.href = "signup_Working.php"; // Replace with your actual worker page URL
            } else {
                window.location.href = "signup_nonWorking.php"; // Replace with your actual non-worker page URL
            }
        }
    </script>
</head>
<body>
    <div class="page-background">
        <div class="container">
            <h2>Are you a worker?</h2>
            <div class="buttons">
                <button class="yes-button" onclick="redirectToNextPage(true)">Yes</button>
                <button class="no-button" onclick="redirectToNextPage(false)">No</button>
            </div>
        </div>
    </div>
</body>
</html>