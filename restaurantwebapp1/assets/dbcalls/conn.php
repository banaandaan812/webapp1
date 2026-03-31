<?php
$servername = "db";
$username = "user";
$password = "password";
$dbname = "oefendatabase";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}