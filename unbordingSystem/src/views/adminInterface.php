<?php
session_start();

// Check if the user is logged in and has the "admin" type
if (!isset($_SESSION['username']) || $_SESSION['user_type'] !== 'admin') {
    // Redirect to login page if not authorized
    header('Location: ..\..\public\index.php\login.php');
    exit();
}

$username = $_SESSION['username']; // Get the logged-in username
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Interface</title>
    <link rel="stylesheet" href="..\..\public\css\adminInterfacestyle.css">
    <link rel="stylesheet" href="..\..\public\css\toastNotification.css">
    <link rel="stylesheet" href="..\..\public\css\manageProfilesStyle.css">
    <link rel="stylesheet" href="..\..\public\css\manageEmployeesStyle.css">
    <link rel="stylesheet" href="..\..\public\css\manageDepartmentStyle.css">
</head>
<body>

    <!-- Settings Icon with Dropdown -->
    <div class="settings">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSZQjnEoFzxyAH0Js7SaiX5-HqlvTkzDzMiPoldxKck4BBiABk-bB2lYENnrNir1bjtb-g&usqp=CAU" alt="Settings Icon" class="settings-img" onclick="toggleSettingsMenu()">
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
        <div class="menu-item" onclick="loadManageProfiles()">
            <img src="https://cdn1.iconfinder.com/data/icons/basic-ui-vol-5-32-px/32/ui-user-setting-profile-manage-512.png" alt="Manage Profiles Icon" class="menu-img">
            <span>Manage Profiles</span>
        </div>
        <div class="menu-item" onclick="loadManageEmployees()">
            <img src="https://goodfoodsgrocery.com/wp-content/uploads/2020/08/14-148399_employee-self-serve-portal-transparent-team-icon-png.png" alt="Manage Employees Icon" class="menu-img">
            <span>Manage Employees</span>
        </div>
        <div class="menu-item" onclick="loadManageDepartment()">
            <img src="https://cdn-icons-png.flaticon.com/128/1378/1378554.png" alt="Manage Department Icon" class="menu-img">
            <span>Manage Department</span>
        </div>

        <!-- User Icon at the Bottom, Displaying Username -->
        <div class="menu-item user-click" onclick="loadUserProfile()">
            <img src="https://cdn-icons-png.flaticon.com/512/552/552721.png" alt="User Image" class="user-img">
            <span><?php echo htmlspecialchars($username); ?></span> <!-- Display username -->
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="main-content" id="main-content">
        <!-- Dynamic Content Based on Selected Section -->
        <h1>Manage Departments</h1>

        <!-- Department Form Container -->
        <div id="department-form-container"></div>
        <div id="toast" class="toast">Action completed successfully!</div>
    </div>

    <!-- JavaScript Files for Admin Interface Functionality -->
    <script src="..\..\public\js\manageProfiles.js"></script>
    <script src="..\..\public\js\manageEmployees.js"></script>
    <script src="..\..\public\js\manageDepartment.js"></script>
    <script src="..\..\public\js\userData.js"></script> <!-- Added for displaying user data -->
</body>
</html>
