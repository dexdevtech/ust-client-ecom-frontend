<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>

<h3>Registration Details</h3>
<form method="post" action="">
    Email: <input type="email" name="email" required><br>
    Address: <input type="text" name="address" required><br>
    Age: <input type="number" name="age" required><br>
    <!-- No password field here since it's already captured in the signup process -->
    <input type="submit" name="register" value="Register">
</form>

<?php
// Error reporting turned off to prevent warnings and errors from displaying
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "127.0.0.1"; // Replace with your server name
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $dbname = "ics2608-reporting"; // Replace with your database name

    // Create connection
    $conn = @new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed");
    }

    session_start(); // Start a session to access previously submitted data
    

    // Retrieve data submitted from the previous pages
    $username = $_SESSION["username"] ?? '';
    $password = $_SESSION["password"] ?? ''; // Retrieve password from the session
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO users (email, username, password, address, age) VALUES (?, ?, ?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("sssss", $email, $username, $hashedPassword, $address, $age); // Use $hashedPassword


        // Set parameters and execute
        $email = $_POST["email"] ?? '';
        $address = $_POST["address"] ?? '';
        $age = $_POST["age"] ?? '';

        // No need to retrieve password from the form; use it from the session

        $stmt->execute();

        // Send email notification
        $to = $email; // User's email
        $subject = "Account Created";
        $message = "Hello, your account has been successfully created!";
        $headers = "From: sportwearsource@gmail.com"; // Replace with your email
        

        if (mail($to, $subject, $message, $headers)) {
            echo "Registration successful! An email has been sent to $email.";
        } else {
            echo "Registration successful! Email could not be sent.";
        }

        echo "Registration successful! An email has been sent to $email.";
        $stmt->close();
    } else {
        echo "Error in preparing statement.";
    }
    $conn->close();
}
?>
</body>
</html>
