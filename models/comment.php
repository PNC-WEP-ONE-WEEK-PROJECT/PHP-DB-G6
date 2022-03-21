<?php
require_once "database.php";

function comments($description,$userid,$id){
    global $db;
    $statement = $db->prepare("INSERT INTO comments (description,userid,postid) values (:description, :userid, :postid)");
    $statement->execute([
        ":description"=>$description,
        ":userid"=>$userid,
        ":postid"=>$id

    ]);
    return $statement->rowCount()==1;
}

function returnallcommentsdata($id){
    global $db;
    $statement = $db->query("SELECT*FROM comments where postid=$id;");
    $posts = $statement->fetchAll();
    return $posts;
}
?>


