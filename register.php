<?php
include("connection.php");



if(empty($_POST["name"]) || empty($_POST["surname"]) ||
empty($_POST["email"]) || empty($_POST["password"] ) || 
empty($_POST["phone"]))
{
    return;
}
?>