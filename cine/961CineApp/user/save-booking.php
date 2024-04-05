<?php
require_once 'conx.php';
session_start();
$uid = $_SESSION['uid'];
if(isset($_POST['numberOfTicket']) && isset($_POST['payment'])){

    $bookingID= uniqid (rand(1,8));

    $numberOfTicket=$_POST['numberOfTicket'];
    $payment=$_POST['payment'];
    $cardNumber = $_POST['cardNumber'];
    $cardExpDate = $_POST['cardExpDate'];

  

$result0 = mysqli_query($con,"SELECT * FROM users WHERE userID='" . $_GET['uid'] . "'");
$row0= mysqli_fetch_array($result0);


$result1 = mysqli_query($con,"SELECT * FROM shows WHERE showID='" . $_GET['shid'] . "'");
$row1 = mysqli_fetch_array($result1);
$showID = $row1['showID'];
$ticketPrice = $row1['ticketPrice'];
$mid=$row1['movieID'];

$createdDate= date('y-m-d');

if(isset($_POST['student'])){
$school=$_POST['school'];
$code=$_POST['code'];

$result2 = mysqli_query($con,"SELECT * FROM discounts WHERE schoolName='$school'");
$row2= mysqli_fetch_array($result2);
$couponCode = $row2['couponCode'];
$percent = $row2['percentage'];

if($code == $couponCode){

    $discountedPrice = $ticketPrice - $ticketPrice * ($percent/100.0);

    $sql_add_query = "INSERT INTO booking VALUES ('$bookingID','$showID','$uid','$mid','$numberOfTicket','$payment',
    '$cardNumber','$cardExpDate','$discountedPrice','$createdDate')";
    $result= mysqli_query($con,$sql_add_query);
   
     header("location:ranking.php?uid=$uid&mid=$mid");
}
else{
    header("location:student-error.php?uid=$uid");
}
}
else{
    $discountedPrice = $ticketPrice;

    $sql_add_query = "INSERT INTO booking VALUES ('$bookingID','$showID','$uid','$mid','$numberOfTicket','$payment',
    '$cardNumber','$cardExpDate','$discountedPrice','$createdDate')";
    $result= mysqli_query($con,$sql_add_query);
   
     header("location:ranking.php?uid=$uid&mid=$mid");
}
}
else{
    header("location:booking-error.php?uid=$uid");
}
?>