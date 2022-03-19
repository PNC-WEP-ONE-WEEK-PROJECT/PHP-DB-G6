<?php
/**
 * Your code here
 */
// connect to database
$db = new PDO("mysql:host=localhost;dbname=facebook_g6db", 'root', '');
function returnallpostdata(){
    global $db;
    $statement = $db->query("SELECT*FROM posts;");
    $posts = $statement->fetchAll();
    return $posts;
}

