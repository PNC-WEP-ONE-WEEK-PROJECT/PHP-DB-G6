<?php session_start(); ?>
<?php
require_once('../models/post.php');
$userid = $_SESSION['user_id'];
$friendid = $_GET['id'];
unFriends($userid, $friendid);
header("location: ../views/userFriends.php");