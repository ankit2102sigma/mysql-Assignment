<?php
    $con = mysqli_connect("localhost", "admin", "admin", "formvalid3");
    if (!$con) {
        die('not connected');
    }
    $id=$_GET['id'];
    mysqli_query($con,"delete from Post where id='$id'");
    header('location:view.php');
    ?>