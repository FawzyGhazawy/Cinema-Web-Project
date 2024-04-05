<?php
require_once 'conx.php';
if(isset($_POST['title'])){

    $title=$_POST['title'];
    $category=$_POST['category'];
    $duration=$_POST['duration'];
    $releaseDate=$_POST['releaseDate'];
    $language=$_POST['language'];
 
    $poster = $_FILES['poster']['name'];
    $posterTmp = $_FILES['poster']['tmp_name'];
    move_uploaded_file($posterTmp,"../posters/".$poster);

    $trailer = $_FILES['trailer']['name'];
    $trailerTmp = $_FILES['trailer']['tmp_name'];
    move_uploaded_file($trailerTmp,"../trailers/".$trailer);


    $rate = 0;
    
    $sql_add_query = "INSERT INTO movies VALUES ('','$title','$category','$duration','$releaseDate',
    '$language','$poster','$trailer','$rate')";
    $result= mysqli_query($con,$sql_add_query);
   
     header("location:movies.php");

}
?>