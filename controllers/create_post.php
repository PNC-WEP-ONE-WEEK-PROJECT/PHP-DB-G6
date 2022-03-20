<?php session_start() ?>
<?php

require_once('../models/post.php');
$text = $_POST['description'];
$img = $_FILES['image']['name'];
$userid = $_SESSION['user_id'];

if (isset($_FILES['image'])) {
    $img = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $local_image="images/";
    $upload = move_uploaded_file($tmp_name, $local_image.$img);
}
echo $text;
echo $img;
echo $userid;

createPosts($text, $img, $userid);

header('location: ../views/user.php');