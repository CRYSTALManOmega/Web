<?php
// Include the database configuration
require_once '..\..\config\database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userName = $_POST['username'] ?? '';
    $userPassword = $_POST['password'] ?? '';

    if (empty($userName) || empty($userPassword)) {
        echo json_encode(["status" => "error", "message" => "Username and password are required."]);
        exit;
    }

    // Check user credentials
    $stmt = $conn->prepare("SELECT Username, Password, Type FROM User WHERE Username = ?");
    $stmt->bind_param("s", $userName);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if ($result && password_verify($userPassword, $result['Password'])) {
        $_SESSION['username'] = $userName;

        // Redirect based on user type
        switch ($result['Type']) {
            case 'employee':
            case 'student':
                echo json_encode(["status" => "success", "redirect" => "..\..\src\views\userInterface.php"]);
                break;
            case 'manager':
                echo json_encode(["status" => "success", "redirect" => "..\..\src\views\departmentManagerInterface.php"]);
                break;
            case 'admin':
                echo json_encode(["status" => "success", "redirect" => "..\..\src\views\adminInterface.php"]);
                break;
            default:
                echo json_encode(["status" => "error", "message" => "Invalid user type."]);
                break;
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid username or password."]);
    }

    $stmt->close();
    $conn->close();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="..\..\public\css\logInPagestyle.css">
</head>
<body>
<div class="container">
    <h1>Welcome Back</h1>
    <form id="loginForm" method="POST" action="">
        <input type="text" id="username" name="username" placeholder="Username" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <button type="submit">Log In</button>
    </form>
    <p id="statusMessage"></p>
</div>

<script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch('', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            const statusMessage = document.getElementById('statusMessage');
            if (data.status === 'success') {
                statusMessage.textContent = 'Login successful! Redirecting...';
                statusMessage.style.color = 'green';
                setTimeout(() => {
                    window.location.href = data.redirect;
                }, 1000);
            } else {
                statusMessage.textContent = data.message;
                statusMessage.style.color = 'red';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            const statusMessage = document.getElementById('statusMessage');
            statusMessage.textContent = 'An error occurred. Please try again.';
            statusMessage.style.color = 'red';
        });
    });
</script>
</body>
</html>
