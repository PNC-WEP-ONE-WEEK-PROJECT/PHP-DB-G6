<?php
/**
 * Your code here
 */
// database connection
require_once "database.php";
/**
 * Get all items  
 * @return array of items 
 */
function getItems()
{
    global $db;
    $statement = $db->query("SELECT *  FROM users");
    $items = $statement->fetchAll();
    return $items;
}

/**
 * Get all items  
 * @return array of items 
 */
function getid()
{
    global $db;
    $statement = $db->query("SELECT id  FROM users");
    $items = $statement->fetchAll();
    return $items;
}

/**
 * Get a single item
 * @param integer $id : the item id
 
 * @return associative_array: the item related to given item id
 */
function getItemById($id)
{
    global $db;
    $statement = $db->prepare("SELECT * FROM users WHERE id = :id");
    $statement->execute([
        ':id' => $id
    ]);
    return $statement->fetch();
}


/**
 * Create a new item 
 * @param string  $item_name :  	the item name
 * @param integer $price :  		the price
 
 * @return boolean: true if create was successful, false otherwise
 */
function createPosts($text, $img, $userid) {
    global $db;
    $poststatement = $db->prepare("INSERT INTO posts(description, image, userid) values(:text, :image, :userid)");
    $poststatement->execute([
        ':text'=>$text,
        ':image'=>$img,
        ':userid'=>$userid
    ]);
    return $poststatement->rowCount()==1;
}

// connect to database
function returnallpostdata(){
    global $db;
    $statement = $db->query("SELECT*FROM posts;");
    $posts = $statement->fetchAll();
    return $posts;
}
