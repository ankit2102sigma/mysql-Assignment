<?php

$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "formvalid3";


  $conn = new mysqli($servername, $username, $password);
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

$conn->select_db($dbname);
$createtb = "CREATE TABLE IF NOT EXISTS admininfo (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(15),
                password VARCHAR(15))";

if ($conn->query($createtb) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
} 

$inserted = true ;

//inserting database
$inserttb = "INSERT INTO admininfo(username, password) VALUES ('admin', 'admin')";
if ($conn->query($inserttb) === TRUE) {
    echo "Data inserted into table";
} else {
    echo "Error inserting data: " . $conn->error;
}


$username = $_POST["username"];
$password = $_POST["password"];

$query = "SELECT `username`,`password` FROM admininfo";
$result = $conn->query($query);

// fetch all rows into an array
$rows = $result->fetch_all(MYSQLI_ASSOC);

if (checkusername($rows, $username)) {
    if (checkpassword($rows, $password)) {
        echo "<p>Valid Credentials</p>";
        header("Location: insert.php");
        die();
    } else {
      echo '<script>alert("Invalid password"); window.location.href = "index.php";</script>';
      exit;
  
    }
} else {
  echo '<script>alert("Invalid Username"); window.location.href = "index.php";</script>';
  exit;

}

$conn->close();

function checkpassword($rows, $password)
{
    foreach ($rows as $row) {
        if ($row["password"] == $password) {
            return true;
        }
    }
    return false;
}

function checkusername($rows, $username)
{
    foreach ($rows as $row) {
        if ($row["username"] == $username) {
            return true;
        }
    }
    return false;
}
