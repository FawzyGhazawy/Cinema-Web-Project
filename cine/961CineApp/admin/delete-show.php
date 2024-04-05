<?php
include_once "conx.php";
$sql = "DELETE FROM shows WHERE showID='" . $_GET["shid"] . "'";
mysqli_query($con, $sql);

header("location:shows.php");
?>