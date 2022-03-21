<?php
require_once "../models/database.php";

function returnallusersdata(){
    global $db;
    $id = $_SESSION['user_id'];
    $statement = $db->query("SELECT*FROM users where id != $id;");
    $posts = $statement->fetchAll();
    return $posts;
}

?>