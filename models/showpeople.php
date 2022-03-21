<?php


$db = new PDO("mysql:host=localhost;dbname=facebook_g6db", 'root', '');
function returnallusersdata(){
    global $db;
    $id = $_SESSION['user_id'];
    $statement = $db->query("SELECT*FROM users where id != $id;");
    $posts = $statement->fetchAll();
    return $posts;
}

?>