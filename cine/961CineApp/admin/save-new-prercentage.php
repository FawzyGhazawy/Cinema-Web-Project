<?php
require_once 'conx.php';
if(isset($_POST['newPercent'])){

$discountID = $_GET['did'];

$newPercent = $_POST['newPercent'];

$sql = "UPDATE discounts SET percentage='$newPercent' WHERE discountID='$discountID'";

    $result= mysqli_query($con,$sql);
   
     header("location:discounts.php");
}
?>