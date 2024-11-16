<?php
session_start();
header('Content-Type: application/json');

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "company_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    echo json_encode(["error" => "Database connection failed"]);
    exit;
}

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $stmt = $conn->prepare("SELECT First_Name FROM User WHERE Username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    echo json_encode(["firstName" => $result['First_Name']]);
} else {
    echo json_encode(["error" => "User not logged in"]);
}

$stmt->close();
$conn->close();
?>
