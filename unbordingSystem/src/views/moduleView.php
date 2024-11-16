<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ..\..\public\index.php\login.php"); // Redirect if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Module View</title>
    <link rel="stylesheet" href="moduleView.css"> <!-- Link to specific styles if needed -->
</head>
<body>
    <h1 id="module-title"></h1>
    <p id="module-description"></p>
    <div id="module-questions"></div>
    <button onclick="submitModule()">Submit Module</button>

    <script src="..\..\public\js\moduleView.js"></script>
</body>
</html>
