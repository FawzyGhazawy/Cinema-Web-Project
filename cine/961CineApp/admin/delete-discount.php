<?php
include_once "conx.php";
$sql = "DELETE FROM discounts WHERE discountID='" . $_GET["did"] . "'";
mysqli_query($con, $sql);

header("location:discounts.php");
?>