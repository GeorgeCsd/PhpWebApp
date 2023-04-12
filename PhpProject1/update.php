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


$id = $_REQUEST['id_ud'];
$name = $_REQUEST['Name_ud'];
$surname = $_REQUEST['Surname_ud'];
$birthday = $_REQUEST['Birthday_ud'];

if (!empty($_REQUEST['Name_ud']) && !empty($_REQUEST['Surname_ud']) && !empty($_REQUEST['Birthday_ud'])) {


    $sql = "UPDATE people_tbl
SET Name = '$name', Surname= '$surname',Birthday= '$birthday'
WHERE ID = '$id'";
} elseif (!empty($_REQUEST['Name_ud']) && !empty($_REQUEST['Surname_ud'])) {


    $sql = "UPDATE people_tbl
SET Name = '$name', Surname= '$surname'
WHERE ID = '$id'";
} elseif (!empty($_REQUEST['Name_ud']) && !empty($_REQUEST['Birthday_ud'])) {
  
    

    $sql = "UPDATE people_tbl
SET Name = '$name', Birthday= '$birthday'
WHERE ID = '$id'";
} elseif (!empty($_REQUEST['Surname_ud']) && !empty($_REQUEST['Birthday_ud'])) {


    $sql = "UPDATE people_tbl
SET Birthday= '$birthday', Surname= '$surname'
WHERE ID = '$id'";
} elseif (!empty($_REQUEST['Name_ud'])) {


    $sql = "UPDATE people_tbl
SET Name = '$name'
WHERE ID = '$id'";
} elseif (!empty($_REQUEST['Surname_ud'])) {


    $sql = "UPDATE people_tbl
SET Surname= '$surname'
WHERE ID = '$id'";
} elseif (!empty($_REQUEST['Birthday_ud'])) {


    $sql = "UPDATE people_tbl
SET Birthday= '$birthday'
WHERE ID = '$id'";
} else {
    $sql = "";
}






// Performing insert query execution
// here our table name is college

$conn->query($sql);





// Close connection
mysqli_close($conn);
?>