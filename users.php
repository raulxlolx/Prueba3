<?php
$server="127.0.0.1";
$user="root";
$pass= "3216";
$database="empresa"
$conn = new mysqli($server, $user, $pass, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset('utf8');
?>
