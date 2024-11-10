<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Interface</title>
    <link rel="stylesheet" href="page.css"> <!-- General CSS -->
    <link rel="stylesheet" href="home.css"> <!-- Home-specific CSS -->
    <link rel="stylesheet" href="tasks.css"> <!-- Tasks-specific CSS -->
    <link rel="stylesheet" href="chat.css"> <!-- Chat-specific CSS -->
    <link rel="stylesheet" href="settings.css"> <!-- Settings-specific CSS -->
</head>
<body>

    <!-- Settings Icon at the Top Right with Dropdown -->
    <div class="settings">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSZQjnEoFzxyAH0Js7SaiX5-HqlvTkzDzMiPoldxKck4BBiABk-bB2lYENnrNir1bjtb-g&usqp=CAU" alt="Settings Icon" class="settings-img" onclick="toggleSettingsMenu()">
        <!-- Dropdown menu for settings -->
        <div id="settings-dropdown" class="settings-dropdown">
            <ul>
                <li>Option 1</li>
                <li>Option 2</li>
                <li>Option 3</li>
            </ul>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <div class="sidebar">
        <div class="menu-item" onclick="loadHome()">
            <img src="https://t3.ftcdn.net/jpg/06/90/99/14/360_F_690991487_DxPr6XooHnzJ530dkWXnSQMs8E7Sw3qj.jpg" alt="Home Icon" class="menu-img">
            <span>Home</span>
        </div>
        <div class="menu-item" onclick="loadTasks()">
            <img src="https://p7.hiclipart.com/preview/402/143/651/computer-icons-check-mark-clipboard-clip-art-perform-tasks-thumbnail.jpg" alt="Tasks Image" class="menu-img">
            <span>Tasks</span>
        </div>
        <div class="menu-item" onclick="loadChat()">
            <img src="https://png.pngitem.com/pimgs/s/148-1489636_chat-icon-png-image-free-download-searchpng-chat.png" alt="Chat Image" class="menu-img">
            <span>Department Chat</span>
        </div>

        <!-- User Icon at the Bottom to Load Profile -->
        <div class="menu-item user-click" onclick="loadUserProfile()">
            <img src="https://cdn-icons-png.flaticon.com/512/552/552721.png" alt="User Image" class="user-img">
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="main-content" id="main-content">
        <!-- Content loads here dynamically based on menu selection -->
    </div>

    <!-- Link to external JavaScript files -->
    <script src="home.js"></script> <!-- Home-specific JavaScript -->
    <script src="tasks.js"></script> <!-- Tasks-specific JavaScript -->
    <script src="chat.js"></script> <!-- Chat-specific JavaScript -->
    <script src="settings.js"></script> <!-- Settings-specific JavaScript -->
    <script src="userProfile.js"></script> <!-- JavaScript for loading user profile -->
    <script src="userData.js"></script>
</body>
</html>
