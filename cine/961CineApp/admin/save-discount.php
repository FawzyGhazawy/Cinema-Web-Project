<?php
require_once 'conx.php';
if(isset($_POST['school']) && isset($_POST['percentage']) && isset($_POST['code'])){

    $school=$_POST['school'];
    $percentage=$_POST['percentage'];
    $code=$_POST['code'];

    $sql_add_query = "INSERT INTO discounts VALUES ('','$school','$percentage','$code')";
    $result= mysqli_query($con,$sql_add_query);
   
     header("location:discounts.php");

}
?>