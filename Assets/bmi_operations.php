<?php
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "bmi"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $bmi = $weight / (($height / 100) * ($height / 100));
    $timestamp = date("Y-m-d H:i:s");

    $stmt = $conn->prepare("INSERT INTO bmi_data (name, age, height, weight, bmi, timestamp) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sdddds", $name, $age, $height, $weight, $bmi, $timestamp);

    if ($stmt->execute()) {
        echo json_encode(array("message" => "Data stored successfully"));
    } else {
        echo json_encode(array("error" => "Error: " . $stmt->error));
    }

    $stmt->close();
}

$conn->close();
?>
