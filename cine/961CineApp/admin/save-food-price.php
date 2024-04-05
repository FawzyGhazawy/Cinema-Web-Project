<?php
require_once 'conx.php';
if(isset($_POST['newPrice'])){

$beverageID = $_GET['fid'];

$newPrice = $_POST['newPrice'];

$sql = "UPDATE beverages SET price='$newPrice' WHERE beverageID='$beverageID'";

    $result= mysqli_query($con,$sql);
   
     header("location:foods.php");
}
?>