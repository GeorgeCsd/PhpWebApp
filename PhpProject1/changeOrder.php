<?php

$servername = "localhost";
$username = "ESP32";
$password = "esp32io.com";
$database_name = "listofnames";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $database_name);
// Check connection

$position = $_POST['position'];

$i = 1;
foreach ($position as $k => $v) {
    $sql = "Update people_tbl SET position_order=" . $i . " WHERE ID=" . $v;
    $mysqli->query($sql);

    $i++;
}
?>