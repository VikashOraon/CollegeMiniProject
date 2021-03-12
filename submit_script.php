<?php
    include 'include/db.php';

    if(isset($_SESSION['id'])){
    
        $userId = $_SESSION['id'];
        
    }else{
        $login_msg = "<script>alert('Login First');</script>";
        header('location:index.php?login_msg='.$login_msg);
    }

    $category = $_POST['category'];

    $news = $_POST['news'];
    $news = mysqli_real_escape_string($con, $news);

    $issueDate = $_POST['issueDate'];
    $lastDate = $_POST['lastDate'];

    $insert_query = "INSERT INTO news (userID, category, news, issueDate, lastDate)
                    VALUES ('$userId', '$category', '$news', '$issueDate', '$lastDate')";
    $query_result = mysqli_query($con, $insert_query) or die(mysqli_error($con));
    
    header('location:index.php');
?>