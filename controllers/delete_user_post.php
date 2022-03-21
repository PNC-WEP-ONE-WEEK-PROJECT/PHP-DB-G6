<?php
require_once "../models/delete_post.php";
$id = $_GET['id'];
deleteItem($id);
header('location: ../views/user.php');