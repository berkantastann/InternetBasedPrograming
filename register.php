<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $full_name = $_POST['full_name'] ?? "";
    $email = $_POST['email'] ?? "";
    $gender = $_POST['gender'] ?? "";

    // Validate form data (example: checking if email is valid)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address!";
        exit;
    }

    // Insert data into "student" table
    $sql = "INSERT INTO student (full_name, email, gender) VALUES ('$full_name', '$email', '$gender')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
