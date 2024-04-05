<?php
require_once 'conx.php';

    $movieID=$_POST['movieID'];
    $date=$_POST['date'];
    $startTime=$_POST['startTime'];
    $hall=$_POST['hall'];
    $ticketPrice=$_POST['ticketPrice'];

    $sql_add_query = "INSERT INTO shows VALUES ('','$movieID','$date',
    '$startTime','$hall','$ticketPrice')";
    $result= mysqli_query($con,$sql_add_query);
   
     header("location:shows.php");


?>