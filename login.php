<?php
include("connection.php");


$query = $_SERVER["REQUEST_METHOD"];

if($sorgu == "POST")
{
  // invalid post query
  if(empty($_POST["email"]) || empty($_POST["password"]))
  {
      exit(json_encode(array(
          "successfull" => "3"
      )));
  }
?>