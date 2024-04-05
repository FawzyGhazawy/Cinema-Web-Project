<?php
require_once 'conx.php';
if(isset($_POST['newPrice'])){

$showID = $_GET['shid'];

$newPrice = $_POST['newPrice'];

$sql = "UPDATE shows SET ticketPrice='$newPrice' WHERE showID='$showID'";

    $result= mysqli_query($con,$sql);
   
     header("location:shows.php");
}
?>