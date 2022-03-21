<?php
require_once "../models/database.php";

function returnallusersdata(){
    global $db;
    $statement = $db->query("SELECT*FROM users;");
    $posts = $statement->fetchAll();
    return $posts;
}

?>