<?php 

$conn=new msqli("192.168.1.248","root","3216","empresa");
$conn->query("SET NAMES 'UTF8' ");
if(!$conn){

die("connection failed : " .$conn->connect_error);
}
?>