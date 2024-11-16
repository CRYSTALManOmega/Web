<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("..\..\public\index.php\login.php");
    exit();
}

// Assuming we have getUserData.php that fetches user data like the first name
include 'getUserData.php';
$firstName = $userData['First_Name'] ?? "User";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Interface</title>
    <link rel="stylesheet" href="..\..\public\css\page.css">
    <link rel="stylesheet" href="..\..\public\css\home.css">
    <link rel="stylesheet" href="..\..\public\css\tasks.css">
    <link rel="stylesheet" href="..\..\public\css\chat.css">
    <link rel="stylesheet" href="..\..\public\css\settings.css">
</head>
<body>
    <div class="settings">
        <img src="settings-icon.png" alt="Settings Icon" class="settings-img" onclick="toggleSettingsMenu()">
        <div id="settings-dropdown" class="settings-dropdown">
            <ul>
                <li>Option 1</li>
                <li>Option 2</li>
                <li>Option 3</li>
            </ul>
        </div>
    </div>

    <div class="sidebar">
        <div class="menu-item" onclick="loadHome()">
            <img src="home-icon.png" alt="Home Icon" class="menu-img">
            <span>Home</span>
        </div>
        <div class="menu-item" onclick="loadTasks()">
            <img src="tasks-icon.png" alt="Tasks Image" class="menu-img">
            <span>Tasks</span>
        </div>
        <div class="menu-item" onclick="loadChat()">
            <img src="chat-icon.png" alt="Chat Image" class="menu-img">
            <span>Department Chat</span>
        </div>
        <div class="menu-item user-click" onclick="loadUserProfile()">
            <img src="user-icon.png" alt="User Image" class="user-img">
        </div>
    </div>

    <div class="main-content" id="main-content">
        <h1>Welcome, <?php echo htmlspecialchars($firstName); ?>!</h1>
    </div>

    <script src="..\..\public\js\home.js"></script>
    <script src="..\..\public\js\tasks.js"></script>
    <script src="..\..\public\js\chat.js"></script>
    <script src="..\..\public\js\settings.js"></script>
    <script src="..\..\public\js\userProfile.js"></script>
</body>
</html>
