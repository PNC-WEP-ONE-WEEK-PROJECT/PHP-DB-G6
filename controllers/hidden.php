<?php session_start(); ?>
<?php
require_once "../models/post.php";

$id = $_GET['id'];
$userid = $_SESSION['user_id'];
hiddenpost($id,$userid);

header("location: ../views/home.php");