<?php
// Step 1: Establish a connection to the database
$servername = "localhost"; // Change this to your database server name
$username = "username"; // Change this to your database username
$password = "password"; // Change this to your database password
$dbname = "ange_abijuru"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["Name"];
    $email = $_POST["Email"];
    $subject = $_POST["Subject"];
    $message = $_POST["Message"];

    // Step 3: Sanitize and validate form data (for illustration purpose only)
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $subject = mysqli_real_escape_string($conn, $subject);
    $message = mysqli_real_escape_string($conn, $message);

    // Step 4: Insert form data into the database
    $sql = "INSERT INTO Idea (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
