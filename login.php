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

  if($result->num_rows == 0)
  {
      exit(json_encode(array(
          "successfull" => "2"
      )));
  }
  else // users found
  {
      $resultcontent = $result->fetch_assoc();
      
      if($resultcontent["password"] == $password) // if the password is correct too
      {
      $token = bin2hex(random_bytes(20));
      $query = "UPDATE register_info SET token = '" . $token . "'  WHERE id = " . $resultcontent["id"];

      $result2 = $conn->query($query);
      if($result2 === true)
      {
          setcookie("token", $token);
          echo(json_encode(array(
              "successfull" => "1",
              "name"        => "admin",
              "id"          => $resultcontent["id"],
              "token"       => $token
          )));
      }
      else
      {
          exit(json_encode(array(
              "successfull" => "0"
          )));
      }
    }
  }
}
else
{
    exit(json_encode(array(
        "successfull" => "0"
    )));
}


?>