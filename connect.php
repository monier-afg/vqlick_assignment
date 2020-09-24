<?php

$host = 'localhost';
$username = 'root';
$password = '';
$db = 'vqlick_assignment';

$link = mysqli_connect($host, $username, $password, $db);

// Check connection
if (mysqli_connect_errno()) {
  echo "Error to connect MySQL: " . mysqli_connect_error();
  exit();
}
?>