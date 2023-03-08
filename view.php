<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
 $con = mysqli_connect("localhost", "admin", "admin", "formvalid3");
if (!$con) {  
    die('not connected');
}
$result = mysqli_query($con, "select * from Post");
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
                <i class="fa fa-pencil"></i> Edit
            </a>
            <a href="delete.php?id=<?php echo $row['id']; ?>">
                <i class="fa fa-trash"></i> Delete
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
