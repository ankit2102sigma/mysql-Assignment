<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
    <style>
             label {
      display: inline-block;
      padding: 8px 12px;
      background-color: #4CAF50;
      color: white;
      border-radius: 4px;
      cursor: pointer;
    }
    table {
      border-collapse: collapse;
      width: 100%;
      max-width: 1000px;
      margin:30px auto;
    }
    th, td {
      text-align: left;
      padding: 8px;
      max-width: 500px;
      word-break: break-all;

    }
    th {
      background-color: #4CAF50;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    h1{
      text-align:center;
    }
   a .button {
        background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 60px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 8px 80px;
    cursor: pointer;
        }
        .btncenter{
            display: flex;
          justify-content: center;
        }
    </style>
</head>
<body>

<?php

include  'db-connection.php';

$result = mysqli_query($conn, "select * from Post");
?>
<div>
    <h1> View Data</h1>
<table border="1">
    <thead>
        <tr>
            <th>Post_ID</th>
            <th>Post_title</th>
            <th>Post_Description</th>
            <th>Actio</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while($row = mysqli_fetch_array($result)) {
            ?>
           <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['post_title']; ?></td>
            <td><?php echo $row['post_description']; ?></td>
            <td>
            <a href="update.php?id=<?php echo $row['id']; ?>">
                <i class="fa fa-pencil" title='Edit'></i> 
            </a>
            <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this row?');">
    <i class="fa fa-trash" title="delete"></i>
</a>
            </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
</div>   
<div class="btncenter">
        <a href="insert.php">
        <button class="button">Insert Data</button>
        </a>

</div>
            
</body>
</html>
