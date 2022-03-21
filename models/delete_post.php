<?php
// connect to database
$db = new PDO ("mysql:host=localhost;dbname=facebook_g6db","root","");
function getItemById($id)
{
    global $db;
    $statement =  $db ->prepare("SELECT id FROM  posts WHERE id=:id;");
    $statement->execute([
        ':id'=>$id
    ]);
    $item = $statement->fetch();
    return $item;
}
function deleteItem($id)
{
    global $db;
    $statement =  $db->prepare("DELETE FROM posts where id=:id");
    $statement ->execute([
        ':id' => $id
    ]);
    return ($statement->rowCount()==1);
}
function deletecomment ($id){
    global $db;
    $statement =  $db->prepare("DELETE FROM comments where postid=:id");
    $statement ->execute([
        ':id' => $id
    ]);
    return ($statement->rowCount()==1);
}
function deleteuser ($id){
    global $db;
    $statement = $db->prepare("DELETE FROM users where id=:id");
    $statement ->execute([
        ':id'=>$id
    ]);
}













?>