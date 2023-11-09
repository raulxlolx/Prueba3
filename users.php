<?php
$conn = new mysqli("192.168.1.248", "root", "3216", "empresa");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset('utf8');
?>
