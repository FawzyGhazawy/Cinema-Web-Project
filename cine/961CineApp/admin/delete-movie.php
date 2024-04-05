<?php
include_once "conx.php";
$sql = "DELETE FROM movies WHERE movieID='" . $_GET["mid"] . "'";
mysqli_query($con, $sql);

header("location:movies.php");
?>