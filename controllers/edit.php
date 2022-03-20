<?php 

require_once "../models/edit.php";
$id = $_POST['text_edit'];
$description = $_POST['text-input-edit'];
$img = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$local_image="images/";
$upload = move_uploaded_file($tmp_name, $local_image.$img);
updateItem($id,$description,$img);

header("location: ../views/home.php");