<?php
require_once 'conx.php';
if(isset($_POST['name'])){

    $name=$_POST['name'];
    $category=$_POST['category'];
    $price=$_POST['price'];
 
    $pic = $_FILES['pic']['name'];
    $picTmp = $_FILES['pic']['tmp_name'];
    move_uploaded_file($picTmp,"../beverages-pics/".$pic);

    $sql_add_query = "INSERT INTO beverages VALUES ('','$name','$category','$price','$pic')";
    $result= mysqli_query($con,$sql_add_query);
   
     header("location:foods.php");

}
?>