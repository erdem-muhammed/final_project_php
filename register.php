<?php
include("connection.php");



if(empty($_POST["name"]) || empty($_POST["surname"]) ||
empty($_POST["email"]) || empty($_POST["password"] ) || 
empty($_POST["phone"]))
{
    return;
}
$name = $_POST["name"];
$surname = $_POST["surname"];
$email = $_POST["email"];
$pass = $_POST["password"];
$phone_number = $_POST["phoneNumber"];


echo "setup";
?>