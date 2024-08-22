<?php

$name = $_POST["name"];
$email = $_POST["email"];
$phoneNumber = $_POST["phoneNumber"];
$message = $_POST["message"];

$mysqli = new mysqli("localhost", "root" , "root" , "kah");



if(isset($_POST["submit"])){
  $sql= "INSERT INTO contact (name, email , phoneNumber, message) VALUES ('$name', '$email', '$phoneNumber', '$message')";
  $mysqli->query($sql);


if ($mysqli->affected_rows > 0){
  
  header("Location: home.html"); 
  exit();
}
}

?>