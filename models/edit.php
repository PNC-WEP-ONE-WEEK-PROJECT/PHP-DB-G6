<?php 
// connect to database
$db = new PDO ("mysql:host=localhost;dbname=facebook_g6db","root","");
function getItemById($id)
{
    global $db;
    $statement =  $db ->prepare("SELECT * FROM  posts WHERE id=:id");
    $statement->execute([
        ':id'=>$id
    ]);
    $item = $statement->fetch();
    return $item;
}

function updateItem($id, $description,$img)
{
    global $db;
    $statement =  $db->prepare("UPDATE  posts set description=:description,images=:img where id=:id");
    $statement ->execute([
        ':description'=> $description,
        ':id' => $id,
        ':img'=>$img
    ]);
    return $statement->rowCount()==1;
}

?>