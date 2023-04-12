<?php

$servername = "localhost";
$username = "ESP32";
$password = "esp32io.com";
$database_name = "listofnames";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database_name);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Taking all 5 values from the form data(input)
$id = $_REQUEST['id_del'];


// Performing insert query execution
// here our table name is college
$sql = "DELETE FROM people_tbl  WHERE id='$id'";
$conn->query($sql);





// Close connection
mysqli_close($conn);
?>  