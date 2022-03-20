<?php

require_once "../models/delete_post.php";
$id = $_GET['id'];

deleteuser($id);

header("location: ../views/showfriens.php");