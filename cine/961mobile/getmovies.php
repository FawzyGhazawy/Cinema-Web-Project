<?php
include_once 'conx.php';
$result = mysqli_query($con, "SELECT * FROM movies");
$rowArray = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {  
        $rowArray[] = $row;
        //array_push($return_array, $row_array);
    }
    echo json_encode($rowArray);
} else {
    echo json_encode(array("error" => "Failed to fetch shows. Please try again later."));
}

