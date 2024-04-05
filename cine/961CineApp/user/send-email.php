<?php
require_once 'conx.php';
if(isset($_POST['email'])){

    $email=$_POST['email'];

    $result = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
        if(mysqli_num_rows($result)>0){

            $code = uniqid (rand(1,5));

            $sql = "UPDATE users SET password='$code' WHERE email='$email'";
            $result= mysqli_query($con,$sql);

            header("location:receive-code.php?code=$code");
        }

        else{
        echo "<script>
        alert('Your email is not found. Please make sure you entered the correct email.);
        window.open('forget-password.php','_self');
            </script>"; 
        }

}
else{
    echo "<script>
    alert('Your email is not found. Please make sure you entered the correct email.);
    window.open('forget-password.php','_self');
        </script>"; 
    }
?>