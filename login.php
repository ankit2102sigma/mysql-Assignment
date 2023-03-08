<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Login</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <!--Stylesheet-->
    
</head>
<body>
    
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="loginadmin.php" method="POST">
        <h3>Login Here</h3>

        <label for="username">Username</label>
        <input type="text"  name = "username" >

        <label for="password">Password</label>
        <input type="password" id="password" name = "password">

        <input type="submit" name="submit" value="Log In" />
      
    </form>
 
</body>
</html>
