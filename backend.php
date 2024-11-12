<?php
// Database credentials
$servername = "localhost"; // Database host
$username = "root";        // Database username 
$password = "";            // Database password 
$dbname = "sri_lanka_tourism"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $package = $_POST['package'];
    $message = $_POST['message'];

    // Insert data into database
    $sql = "INSERT INTO enquiries (fullName, email, phone, package, message) 
            VALUES ('$fullName', '$email', '$phone', '$package', '$message')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "<p>Thank you for your enquiry! We will get back to you shortly.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
