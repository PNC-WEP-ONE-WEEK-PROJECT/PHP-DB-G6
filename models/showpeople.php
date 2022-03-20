<?php


$db = new PDO("mysql:host=localhost;dbname=facebook_g6db", 'root', '');
function returnallusersdata(){
    global $db;
    $statement = $db->query("SELECT*FROM users;");
    $posts = $statement->fetchAll();
    return $posts;
}

?>