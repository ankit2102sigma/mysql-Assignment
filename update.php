<?php
  include 'db-connection.php';

    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $post_title=$_POST['post_title'];
        if (!(preg_match('/^[a-zA-Z0-9 ]{1,30}$/', $post_title))) {
          echo '<script>alert("Invlalid Post Title"); window.location.href = "update.php";</script>';
          exit;
        }
        $post_description=$_POST['post_description'];
        mysqli_query($conn,"update Post set post_title='$post_title', post_description='$post_description' where id='$id'");
        header('location:view.php');
    }
    $id=$_GET['id'];
    $result=mysqli_query($conn,"select * from Post where id='$id'");
    $row=mysqli_fetch_array($result);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Data</title>
        <style>
            input[type=text] {
              width: 100%;
              padding: 12px 20px;
              margin: 8px 0;
              display: inline-block;
              border: 1px solid #ccc;
              border-radius: 4px;
              box-sizing: border-box;
            }
            
            input[type=submit] {
              width: 100%;
              background-color: #4CAF50;
              color: white;
              padding: 14px 20px;
              margin: 8px 0;
              border: none;
              border-radius: 4px;
              cursor: pointer;
            }
            
            input[type=submit]:hover {
              background-color: #45a049;
            }
            
            div.container {
              border-radius: 5px;
              background-color: #f2f2f2;
              padding: 20px;
              margin: 30px auto;
              max-width: 500px;
            }
            
            h1{
              text-align:center;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Update Data</h1>
            <form method="post" action="">
                <input type="hidden" name="id" value="<?php echo $row['id']?>">
                <label for="post_title">Post Title:</label>
                <input type="text" id="post_title" name="post_title" value="<?php echo $row['post_title']?>" required>
                <label for="post_description">Post Description:</label>
                <input type="text" id="post_description" name="post_description" value="<?php echo $row['post_description']?>" required>
                <input type="submit" name="update" value="Update">
            </form>
        </div>
    </body>
    </html>