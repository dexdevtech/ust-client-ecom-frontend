<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>
<form method="post">
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" name="login" value="Login">
    <a href="ForgetPass.php">Forgot Password?</a>
</form>
<?php
session_start();

$servername = "127.0.0.1"; // Replace with your server name
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "ics2608-reporting"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ... (existing code)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';

    // Sanitize user input to prevent SQL injection (consider using prepared statements)
    $email = $conn->real_escape_string($email);

    // Retrieve user details from the database based on the entered email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPasswordFromDB = $row['Password']; // Get hashed password from DB

        // Verify the entered password with the stored hashed password
        if (password_verify($password, $hashedPasswordFromDB)) {
            $_SESSION['email'] = $email; // Store email in session as logged-in user
            header("Location: test.php"); // Redirect to user profile page
            exit();
        } else {
            echo "Invalid email or password. Please try again.";
        }
    } else {
        echo "User not found. Please sign up.";
    }
}


$conn->close();
?>

</body>
</html>
