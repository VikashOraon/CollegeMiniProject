<?php
    require 'include/db.php';
    
    $name = $_POST['name'];
    $name = mysqli_real_escape_string($con, $name);

    $email = $_POST['email'];
    $email = mysqli_real_escape_string($con , $email);
    $email_regex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";

    $password = $_POST['password'];
    $confirm_pw = $_POST['confirm_pw'];

    //validating password
    if(strlen($password)<6){
         $pw_err = "<span class='text-danger'>Pasword must have atleast 6 characters.</span>";
        header('location:signup.php?pw_err='.$pw_err);
    }else if($password != $confirm_pw){
        $pw_msg = "<span class='text-danger'>Password mismatch!</span>";
        header('location:signup.php?pw_msg='.$pw_msg);
    }

    $password = mysqli_real_escape_string($con , $password);
    $password = md5($password);

    //check email format
    if(!preg_match($email_regex, $email)){
        $email_err = "<span class='text-danger'>Invalid email</span>";
        header('location:signup.php?email_err='.$email_err);
    }

    //check if email already exist
    $select_query = "SELECT * FROM users WHERE email = '$email'";
    $select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
    $fetch_rows = mysqli_num_rows($select_query_result);
    echo $fetch_rows;
    if($fetch_rows != 0){
        $email_msg = "<span class='text-danger'>Email already exist!</span>";
        header('location:signup.php?email_msg='.$email_msg);
    }else{
        //insert user data
        $insert_query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        $insert_query_result = mysqli_query($con, $insert_query) or die(mysqli_error($con));

        //set session variables
        $user_id = mysqli_insert_id($con);
        $_SESSION['id'] = $user_id;
        $_SESSION['email'] = $email;

        mysqli_close($con);

        header('location:index.php');
    }
?>