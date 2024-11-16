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

    // Fetch user's department
    $userStmt = $conn->prepare("SELECT Department_Id FROM User WHERE Username = ?");
    $userStmt->bind_param("s", $username);
    $userStmt->execute();
    $userResult = $userStmt->get_result()->fetch_assoc();
    $departmentId = $userResult['Department_Id'];

    // Fetch department video
    $videoStmt = $conn->prepare("SELECT Video_Path FROM Department_Welcome_Video WHERE Department_Id = ?");
    $videoStmt->bind_param("i", $departmentId);
    $videoStmt->execute();
    $videoResult = $videoStmt->get_result()->fetch_assoc();

    // Fetch task updates (modules)
    $modulesStmt = $conn->prepare("SELECT Name, Date_Assigned FROM Module WHERE Department_Id = ?");
    $modulesStmt->bind_param("i", $departmentId);
    $modulesStmt->execute();
    $modulesResult = $modulesStmt->get_result();

    $modules = [];
    while ($module = $modulesResult->fetch_assoc()) {
        $modules[] = [
            "name" => $module["Name"],
            "assignedDate" => $module["Date_Assigned"]
        ];
    }

    echo json_encode([
        "videoPath" => $videoResult['Video_Path'] ?? "default-video-path.mp4",
        "modules" => $modules
    ]);

    $userStmt->close();
    $videoStmt->close();
    $modulesStmt->close();
} else {
    echo json_encode(["error" => "User not logged in"]);
}

$conn->close();
?>
