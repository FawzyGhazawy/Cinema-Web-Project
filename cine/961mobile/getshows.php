<?php
include_once 'conx.php';
$result = mysqli_query($con, "SELECT * FROM shows NATURAL JOIN movies");
$rowArray = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $movieID = $row['movieID'];
        $result1 = mysqli_query($con, "SELECT * FROM movies NATURAL JOIN shows WHERE movieID=$movieID");
        $row1 = mysqli_fetch_assoc($result1);
        $rowArray[] = $row1;
    }
    echo json_encode($rowArray);
} else {
    echo json_encode(array("error" => "Failed to fetch shows. Please try again later."));
}

