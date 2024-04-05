<?php
require_once 'conx.php';
$uid = $_GET['uid'];
$mid =  $_GET['mid'];

if(isset($_POST['star1'])){
    $rate = 1;
    $sql = "UPDATE movies SET rate='$rate' WHERE movieID='$mid'";
     $result= mysqli_query($con,$sql);
}

else if(isset($_POST['star2'])){
    $rate = 2;
    $sql = "UPDATE movies SET rate='$rate' WHERE movieID='$mid'";
     $result= mysqli_query($con,$sql);
}

else if(isset($_POST['star3'])){
    $rate = 3;
    $sql = "UPDATE movies SET rate='$rate' WHERE movieID='$mid'";
     $result= mysqli_query($con,$sql);
}

else if(isset($_POST['star4'])){
    $rate = 4;
    $sql = "UPDATE movies SET rate='$rate' WHERE movieID='$mid'";
    $result= mysqli_query($con,$sql);
}

     header("location:home-page.php?uid=$uid");
?>