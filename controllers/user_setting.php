<?php session_start() ?>
<?php

require_once('../models/post.php');
$name = $_POST['username'];
$email = $_POST['useremail'];
$location = $_POST['userlocation'];
$gender = $_POST['usergender'];
$date = $_POST['userdate'];
$userid = $_SESSION['user_id'];

// profile not set
if (isset($_FILES['cover']) and !isset($_FILES['profile'])) {
    $cover = $_FILES['cover']['name'];
    echo $cover;
    $cover_name = $_FILES['cover']['tmp_name'];
    $local_image="images/";
    $uploadcover = move_uploaded_file($cover_name, $local_image.$cover);
    changeUserinfoAndCover($name,$gender,$email,$date,$location,$cover, $userid);
    echo "cover";
} 

// cover not set
if (!isset($_FILES['cover']) and isset($_FILES['profile'])) {
    $profile = $_FILES['profile']['name'];
    echo $profile;
    $profile_name = $_FILES['profile']['tmp_name'];
    $local_image="images/";
    $uploadprofile = move_uploaded_file($profile_name, $local_image.$profile);
    changeUserinfoAndProfile($name,$gender,$email,$date,$location,$profile, $userid);
    echo "profile";
} 

// set all
if (isset($_FILES['cover']) and isset($_FILES['profile'])) {
    $cover = $_FILES['cover']['name'];
    $cover_name = $_FILES['cover']['tmp_name'];
    $profile = $_FILES['profile']['name'];
    $profile_name = $_FILES['profile']['tmp_name'];
    $local_image="images/";
    $uploadcover = move_uploaded_file($cover_name, $local_image.$cover);
    $uploadprofile = move_uploaded_file($profile_name, $local_image.$profile);
    changeUserinfoAndCoverProfile($name,$gender,$email,$date,$location,$cover,$profile, $userid);
    echo "all";
} 

if (!isset($_FILES['cover']) and !isset($_FILES['profile'])){changeUserinfo($name,$gender,$email,$date,$location,$userid); echo "not all";}


header('location: ../views/user.php');