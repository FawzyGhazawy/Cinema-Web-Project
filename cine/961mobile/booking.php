<?php
require_once 'conx.php';
// Check if numberOfTicket and payment are set
if (isset($_GET['numberOfTicket']) && isset($_GET['payment'])) {

    // Generate a unique booking ID
    $bookingID = uniqid(rand(1, 8));

    // Retrieve data from GET parameters
    $uid=$_GET['uid'];
    $numberOfTicket = $_GET['numberOfTicket'];
    $payment = $_GET['payment'];
    $cardNumber = $_GET['cardNumber'];
    $cardExpDate = $_GET['cardExpDate'];

    // Retrieve user information from the database
    $result0 = mysqli_query($con, "SELECT * FROM users WHERE userID='" . $_GET['uid'] . "'");
    $row0 = mysqli_fetch_array($result0);

    // Retrieve show information from the database
    $result1 = mysqli_query($con, "SELECT * FROM shows WHERE movieID='" . $_GET['shid'] . "'");
    $row1 = mysqli_fetch_assoc($result1);
    $showID = $row1['showID'];
    $ticketPrice = $row1['ticketPrice'];
    $mid = $row1['movieID'];

    // Get the current date
    $createdDate = date('y-m-d');

    // Check if school and code are set
    if (isset($_GET['code']) && isset($_GET['school'])) {
        $code = $_GET['code'];
        $school = $_GET['school'];
        // Retrieve discount information from the database
        $result2 = mysqli_query($con, "SELECT * FROM discounts WHERE schoolName='$school'");
        $row2 = mysqli_fetch_array($result2);
        $couponCode = $row2['couponCode'];
        $percent = $row2['percentage'];

        // Check if the entered code matches the coupon code
        if ($code == $couponCode) {
            // Calculate the discounted price
            $discountedPrice = $ticketPrice - $ticketPrice * ($percent / 100.0);

            // Insert booking information into the database with the discounted price
            $sql_add_query = "INSERT INTO booking VALUES ('$bookingID','$showID','$uid','$mid','$numberOfTicket','$payment',
                '$cardNumber','$cardExpDate','$discountedPrice','$createdDate')";
            $result = mysqli_query($con, $sql_add_query);

            echo "Added discount";
        } else {
            echo "Error";
        }
    } else {
        // No discount applied, use the original ticket price
        $discountedPrice = $ticketPrice;

        // Insert booking information into the database
        $sql_add_query = "INSERT INTO booking VALUES ('$bookingID','$showID','$uid','$mid','$numberOfTicket','$payment',
            '$cardNumber','$cardExpDate','$discountedPrice','$createdDate')";
        $result = mysqli_query($con, $sql_add_query);

        echo "Done";
    }
} else {
    echo "Error";
}
?>
