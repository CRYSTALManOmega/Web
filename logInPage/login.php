<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In Page</title>
    <link rel="stylesheet" href="logInPageStyle.css"> <!-- Link to external CSS -->
</head>
<body>

<div class="container">
    <h1>Onboard with Us</h1>

    <form id="loginForm">
        <input type="text" id="userName" name="username" placeholder="Username" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
    </form>

    <p id="statusMessage"></p>
</div>

<script src="loginScript.js"></script> <!-- Link to external JavaScript file -->
</body>
</html>