<?php
session_start();

// Check if the user is logged in and has the "admin" type
if (!isset($_SESSION['username']) || $_SESSION['user_type'] !== 'admin') {
    // Redirect to login page if not authorized
    header('Location: ..\..\public\index.php\login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Employee</title>
    <link rel="stylesheet" href="addEmployeeStyle.css">
    <style>
        /* Style for read-only department name */
        #departmentName {
            background-color: #e9ecef; /* Light grey to indicate non-editable */
            color: #6c757d; /* Slightly darker text */
            cursor: not-allowed; /* Show not-allowed cursor */
        }
        
        #departmentName[readonly]:hover::after {
            content: "Department assignment will be managed in 'Manage Employees'"; /* Tooltip message */
            position: absolute;
            bottom: -25px;
            left: 0;
            font-size: 0.8em;
            color: #6c757d;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Add New Employee</h1>
    <form id="addEmployeeForm" action="addEmployee.php" method="POST">
        <!-- Basic Information -->
        <label for="firstName">First Name <span>*</span>:</label>
        <input type="text" id="firstName" name="First_Name" required>

        <label for="lastName">Last Name <span>*</span>:</label>
        <input type="text" id="lastName" name="Last_Name" required>

        <!-- Credentials -->
        <label for="username">Username <span>*</span>:</label>
        <input type="text" id="username" name="Username" required>

        <label for="password">Password <span>*</span>:</label>
        <input type="password" id="password" name="Password" required>

        <!-- Contact Information -->
        <label for="email">Email <span>*</span>:</label>
        <input type="email" id="email" name="Email" required>

        <!-- Department Name Display Only -->
        <label for="departmentName">Department Name:</label>
        <input type="text" id="departmentName" name="Department_Name" readonly title="Assigned in 'Manage Employees'">
        <!-- Hidden Department ID -->
        <input type="hidden" id="departmentId" name="Department_Id">

        <!-- Additional Information -->
        <label for="jobTitle">Job Title <span>*</span>:</label>
        <input type="text" id="jobTitle" name="Job_Title" required>

        <label for="branchName">Branch Name:</label>
        <input type="text" id="branchName" name="Branch_Name" placeholder="Optional">

        <label for="nationalId">National ID <span>*</span>:</label>
        <input type="text" id="nationalId" name="National_Id" required>

        <label for="birthDate">Birth Date <span>*</span>:</label>
        <input type="date" id="birthDate" name="BirthDate" required>

        <!-- User Type (Dropdown for Employee and Student) -->
        <label for="type">User Type <span>*</span>:</label>
        <select id="type" name="Type" required>
            <option value="Employee">Employee</option>
            <option value="Student">Student</option>
        </select>

        <!-- Submit Button -->
        <button type="submit">Submit</button>
        <button type="button" onclick="window.location.href='C:\unbordingSystem\src\views\adminInterface.php'>Cancel</button>
    </form>
</div>

<div id="toast" class="toast"></div> <!-- Toast notification container -->

<script src="..\..\public\js\addEmployee.js"></script>
</body>
</html>