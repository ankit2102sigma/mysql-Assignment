<?php
include_once 'db-connection.php';


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
    //inserting database
  $inserttb = "INSERT INTO admininfo(username, password) VALUES ('ankit', 'arora')";
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

  if (checkusername($result, $username)) {
    if (checkpassword($result, $password)) {
      echo "<p>Valid Credentials</p>";
      header("Location: insert.php/");
        die();
    } else {
      echo "<p>Invalid Password</p>";
    }
  } else {
    echo "<p>Invalid Username</p>";
  }
  
  $conn->close();



function checkpassword($result, $password) {
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      if ($row["password"] == $password) {
        return true;
      }
    }
  }
  return false;
}

function checkusername($result, $username) {
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      if ($row["username"] == $username) {
        return true;
      }
    }
  }
  return false;
}

?>