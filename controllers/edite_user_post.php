<?php
require_once "../models/post.php";
$id = $_GET['id'];
$text = $_POST['description'];
$img = $_FILES['image']['name'];
// $userid = $_SESSION['user_id'];
require_once('../models/post.php');
if (isset($_FILES['image'])) {
    $img = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $local_image="images/";
    $upload = move_uploaded_file($tmp_name, $local_image.$img);
}
if (empty($img)){
    // createPosts($text, $img, $userid);
    editeUserPostWithoutimage($text, $id);
}
if (!empty($img)){
    // createPosts($text, $img, $userid);
    editeUserPost($text, $id, $img);
}
header('location: ../views/user.php');