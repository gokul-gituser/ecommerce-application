<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminEmail = "admin@gmail.com";
    $adminPassword = "admin";

    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];

    if ($userEmail === $adminEmail && $userPassword === $adminPassword) {
        $_SESSION['admin'] = true;
        echo"<script>window.open('index.php' , '_self') ;</script>";
        
    } else {
        echo "<script>alert('Invalid credentials')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <h1>Admin Login</h1>
    <form method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>