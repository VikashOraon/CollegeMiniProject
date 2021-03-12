<?php
include 'include/db.php';

$votes = array();
$filtered = array();
$ids = array();

$votes = $_POST['id'];

//filtering out null values
$filtered = array_filter($votes, 'strlen');

//getting the keys i.e news id in a separate array
$verifiedID = array_keys($filtered);

//$verifiedID is 2D array so, converting 2d to 1D
foreach($verifiedID as $id){
    $ids[] = $id;
}

$votedId = implode(",",$ids);

$update_query = "UPDATE news SET votePoint = votePoint + 1 WHERE newsID IN($votedId)";
$result = mysqli_query($con, $update_query) or die(mysqli_error($con));
header('location:index.php');
 ?>