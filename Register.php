<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["password"] = $_POST["password"];

    // Redirect to register page after capturing username and password
    header("Location: Registration.php");
    exit;
}
?>

</body>
</html>
