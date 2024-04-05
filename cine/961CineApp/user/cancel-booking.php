<?php
require_once 'conx.php';

$result1 = mysqli_query($con,"SELECT * FROM users WHERE userID='" . $_GET['uid'] . "'");
$row1= mysqli_fetch_array($result1);
$uid = $row1['userID'];

$sql = "DELETE FROM booking WHERE bookingID='" . $_GET['bid'] . "'";
mysqli_query($con, $sql);

   
     header("location:bookings.php?uid=$uid");



?>