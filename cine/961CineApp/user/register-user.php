<?php
require_once 'conx.php';
if(isset($_POST['check_rh'])){    
    $uid= uniqid (rand(1,8));

    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
   

    $sql_add_query = "INSERT INTO users VALUES ('$uid','$name','$email','$phone','$password')";
    $result= mysqli_query($con,$sql_add_query);
   
    echo "<script>
    alert('Your Are Registered successfully!');
    window.open('../index.php','_self');
    </script>"; 

}
else{
    header("location:error-register.php");
}
?>