<?php
require_once 'conx.php';

if (isset($_GET['name']) && isset($_GET['password'])) {
    $email = $_GET['name'];
    $password = $_GET['password'];

    $query = "select * from users where email='" . $email . "' AND password='" . $password . "'";

    //$query_admin = "select * from admin where email='" . $email . "' AND password='" . $password . "'";

    $result = mysqli_query($con, $query);

    //$result_admin = mysqli_query($con, $query_admin);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_array($result);
        $uid = $row['userID'];
        echo "$uid";
        // } else if (mysqli_num_rows($result_admin) === 1) {
        //     $row = mysqli_fetch_array($result_admin);

    } else {
        echo "Error: Incorrect username or password.";
    }
} else {
    echo "Error: Failed to fetch user data. Please try again later.";
}
