<?php

$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "formvalid3";

//connection with mysql
  $conn = new mysqli($servername, $username, $password);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  //creating database if exist
  $createdb = "CREATE DATABASE IF NOT EXISTS $dbname";

  if ($conn->query($createdb) === TRUE) {
    echo "Database created successfully";
  } else {
    echo "Error creating database: " . $conn->error;
  }
