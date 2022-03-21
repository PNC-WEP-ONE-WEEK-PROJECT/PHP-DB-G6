<?php 

require_once "../models/edit.php";
$id = $_POST['text_edit'];
$description = $_POST['text-input-edit'];
$image=$_POST['file'];
if(!empty($_FILES['image']['name'])){
    $image=$_FILES['image']['name'];
}
$folder = $_FILES['image']['tmp_name'];
$local_image="images/";
move_uploaded_file($folder,$local_image);
updateItem($id,$description,$image);

header("location: ../views/home.php");