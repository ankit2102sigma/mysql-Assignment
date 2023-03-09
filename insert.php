<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
body{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    
}


input[type=text], select, textarea {
  width: 100%; 
  padding: 12px; 
  border: 1px solid #ccc; 
  border-radius: 4px; 
  box-sizing: border-box; 
  margin-top: 6px; 
  margin-bottom: 16px;
  resize: vertical 
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
    <title>Insert Data</title>
</head>
<body>
  <div class="main">
  <h1 style="text-align: center;">Enter Table Data</h1>
<div class="container">
  <form action="insert.php" method="POST">

    <label for="fname">Post Title</label>
    <input type="text" id="fname" name="Post_title" placeholder="Post Title...">

    <label for="subject">Post Description</label>
    <textarea id="subject" name="Post_description" placeholder="Post Description..." style="height:200px"></textarea>

    <input  type="submit" name="submit" value="Submit">
  </form>
  
  
  <?php
// Database credentials
$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "formvalid3";

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->select_db($dbname);
$createtb = "CREATE TABLE IF NOT EXISTS Post (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  post_title VARCHAR(100),
  post_description TEXT)";


if ($conn->query($createtb) === TRUE) {
  // echo "Table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if (isset($_POST['submit'])) {
    // Get form data
    $post_title = $conn->real_escape_string($_POST['Post_title']);
    $post_description = $conn->real_escape_string($_POST['Post_description']);

    $sql = "INSERT INTO Post (post_title, post_description) VALUES ('$post_title', '$post_description')";
    if ($conn->query($sql) === TRUE) {
        header("Location: /mysqlAssi/view.php ");
        exit;
    } else {
        echo "Error inserting data: " . $conn->error;
    }
}

$conn->close();
?>

</div>
</div>
</body>
</html>