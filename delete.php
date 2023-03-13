<?php
    include_once 'db-connection.php';

    $id=$_GET['id'];
    mysqli_query($conn,"delete from Post where id='$id'");
    header('location:view.php');
    ?>