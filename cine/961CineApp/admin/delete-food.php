<?php
include_once "conx.php";
$sql = "DELETE FROM beverages WHERE beverageID='" . $_GET["fid"] . "'";
mysqli_query($con, $sql);

header("location:foods.php");
?>