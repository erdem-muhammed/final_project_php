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


$conn = new mysqli($server_name, $server_user, $server_pass, $database_name);
//check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "INSERT INTO users (`name`, `surname`, `email`, `password`, `phone_number`) VALUES ( '$name', '$surname', '$email', '$pass', '$phone_number')";
  echo "query gönderiliyor";
  if ($conn->query($sql) === TRUE) {
    echo(json_encode(array(
        "successfull" => "1"
    )));
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();

?>