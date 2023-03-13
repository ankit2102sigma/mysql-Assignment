<?php

$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "formvalid3";


  $conn = new mysqli($servername, $username, $password,"formvalid3");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  //creating database if exist
  $createdb = "CREATE DATABASE IF NOT EXISTS $dbname";

  if ($conn->query($createdb) === TRUE) {
    // echo "Database created successfully";
  } else {
    echo "Error creating database: " . $conn->error;
  }

  $createtb = "CREATE TABLE IF NOT EXISTS Post (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_title VARCHAR(100),
    post_description TEXT)";

if ($conn->query($createtb) === TRUE) {
  // echo "Table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

  