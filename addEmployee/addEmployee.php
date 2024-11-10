<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "company_database";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch departments for dropdown if the 'fetch_departments' parameter is set
if (isset($_GET['fetch_departments'])) {
    $result = $conn->query("SELECT Department_Id, Name FROM Department");
    $departments = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($departments);
    exit;
}

// Handle adding a new employee if it's a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['First_Name'] ?? '';
    $lastName = $_POST['Last_Name'] ?? '';
    $email = $_POST['Email'] ?? '';
    $username = $_POST['Username'] ?? '';
    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $departmentId = $_POST['Department_Id'] ?? '';
    $jobTitle = $_POST['Job_Title'] ?? '';
    $branchName = $_POST['Branch_Name'] ?? '';
    $nationalId = $_POST['National_Id'] ?? '';
    $birthDate = $_POST['BirthDate'] ?? '';
    $type = $_POST['Type'] ?? '';
    $created = date("Y-m-d H:i:s");

    // SQL statement with placeholders for safe data binding
    $sql = "INSERT INTO User (First_Name, Last_Name, Email, Username, Password, Department_Id, Job_Title, Branch_Name, National_Id, BirthDate, Type, Created)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssss", $firstName, $lastName, $email, $username, $password, $departmentId, $jobTitle, $branchName, $nationalId, $birthDate, $type, $created);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
