<?php
require_once 'conx.php';
$uid = $_GET['uid'];

$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
 if($pass1 == $pass2)

{
$sql = "UPDATE users SET password='$pass1' WHERE userID='$uid'";

    $result= mysqli_query($con,$sql);
   
    echo "<script>
    alert('Your password is updated');
    window.open('profile.php?uid=$uid','_self');
    </script>"; 
}
else{
    echo "<script>
    alert('Please confirm your password');
    window.open('profile.php?uid=$uid','_self');
        </script>"; 
}

?>