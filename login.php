<?php
include("connection.php");


$inquiry = $_SERVER["REQUEST_METHOD"];

if($inquiry == "POST")
{
  // invalid post query
  if(empty($_POST["email"]) || empty($_POST["password"]))
  {
      exit(json_encode(array(
          "successfull" => "3"
      )));
  }
  $email = $_POST["email"];
  $password = $_POST["password"];

  $query = "SELECT * FROM users WHERE email= '" . $email . "'";
  $result = $conn->query($query);

?>