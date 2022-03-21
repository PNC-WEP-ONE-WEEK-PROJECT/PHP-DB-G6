<?php session_start(); ?>
<?php
require_once('../models/post.php');
$userid = $_SESSION['user_id'];
$friendid = $_GET['id'];
addFriends($userid, $friendid);
header("location: ../views/showfriens.php");