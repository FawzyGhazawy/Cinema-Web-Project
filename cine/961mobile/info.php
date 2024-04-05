<?php
require_once 'conx.php';
$movieID = $_GET['movieID'];

$result = mysqli_query($con, "SELECT * FROM shows NATURAL JOIN movies WHERE movieID=$movieID");
$rowArray = array();

if (mysqli_num_rows($result) > 0) {
    $return_array = array();
    while ($row = mysqli_fetch_array($result)) {
        array_push($return_array, $row);
    }
    echo json_encode($return_array);
} else {
    echo json_encode(array("error" => "Failed to fetch shows. Please try again later."));
}
