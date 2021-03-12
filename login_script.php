<?php
    //conecting to database
    require 'include/db.php';

    $email = $_POST['email'];
    $email = mysqli_real_escape_string($con, $email);

    $password = $_POST['password'];
    $password = mysqli_real_escape_string($con , $password);
    $password = md5($password);

    //Fetching user data
    $login_query = "SELECT userID, email FROM users WHERE email = '$email' AND password = '$password'";
    $query_result = mysqli_query($con, $login_query) or die(mysqli_error($con));
    $total_rows = mysqli_num_rows($query_result);
   
    //set Session variables
    if($total_rows != 0){
        $user_array = mysqli_fetch_assoc($query_result);
        $_SESSION['id'] = $user_array['userID'];
         $_SESSION['email'] = $email;
        header('location:index.php');
    }else{
        $error = "<span class='text-danger'>Invalid Credentials</span>";
        header('location:login.php?err='.$error);
    }
?>