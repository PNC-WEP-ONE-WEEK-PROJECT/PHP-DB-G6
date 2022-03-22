<?php session_start(); ?>
<?php 
require_once "../models/comment.php";
$id = $_POST['comment-postid'];
$description = $_POST['comment-text'];
$userid = $_SESSION['user_id'];
if (isset($description) and !empty($description)){
    comments($description,$userid,$id);
}

header("location: ../views/home.php");