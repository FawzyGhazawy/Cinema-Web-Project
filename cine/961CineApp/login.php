<?php
session_start();
require_once 'conx.php';

if (isset($_POST['email']) && isset($_POST['password'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $query="select * from users where email='".$email."' AND password='".$password."'";

    $query_admin="select * from admin where email='".$email."' AND password='".$password."'";
    
    $result= mysqli_query($con,$query);

    $result_admin= mysqli_query($con,$query_admin);
    
    if(mysqli_num_rows($result)===1){
       $_SESSION['is_logged_in']=1;
        $row= mysqli_fetch_array($result);
        $uid = $row['userID'];
        $_SESSION['uid']= $uid;
        header("location:user/home-page.php");
    }
    else if(mysqli_num_rows($result_admin)===1){
        $_SESSION['is_logged_in']=1;
        $row= mysqli_fetch_array($result_admin);
        header("location:admin/home-page.php");
    }
    else{
        $_SESSION['is_logged_in']=0;
        header("location:login-error-alert.php") ;
}
}
    else{
        header("location:login-error-alert.php");
    }


 
?>