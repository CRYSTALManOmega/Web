<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "company_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userName = $_POST['username'];
$userPassword = $_POST['password'];

$stmt = $conn->prepare("SELECT Username, Password, Type FROM User WHERE Username = ?");
$stmt->bind_param("s", $userName);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();

if ($result && password_verify($userPassword, $result['Password'])) { // Corrected this line
    $_SESSION['username'] = $userName;
    switch ($result['Type']) {
        case 'employee':
        case 'student':
            header("Location: ../../src/views/userInterface.php");
            break;
        case 'manager':
            header("Location: ../../src/views/departmentManagerInterface.php");
            break;
        case 'admin':
            header("Location: ../../src/views/adminInterface.php");
            break;
        default:
            echo "Invalid user type.";
            break;
    }
} else {
    echo "Invalid username or password.";
}
?>
