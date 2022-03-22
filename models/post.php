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
 * Get all items  
 * @return array of items 
 */
function getIdOfEachPost()
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
 * Get a single item
 * @param integer $id : the item id
 
 * @return associative_array: the item related to given item id
 */
function getOnePostById($id)
{
    global $db;
    $statement = $db->prepare("SELECT * FROM posts WHERE id = :id");
    $statement->execute([
        ':id' => $id
    ]);
    return $statement->fetch();
}
/**
 * Get a single item
 * @param integer $id : the item id
 
 * @return associative_array: the item related to given item id
 */
function getUserDataById($id)
{
    global $db;
    $statement = $db->prepare("SELECT * FROM posts WHERE userid = :id ");
    $statement->execute([
        ':id' => $id
    ]);
    return $statement->fetchAll();
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
    $poststatement = $db->prepare("INSERT INTO posts(description, image, userid) values(:text, :img, :userid)");
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

// delete user post
function deleteUserPost($postId){
    global $db;
    $statement = $db->prepare("DELETE FROM posts WHERE id=:post_id;");
    $statement->execute([
        ':post_id' => $postId
    ]);
    return($statement->rowCount()==1);
}


// edite user post
function editeUserPost($description, $id, $img){
    global $db;
    $statement =  $db->prepare("UPDATE  posts SET description=:description,image=:img where id=:id");
    $statement ->execute([
        ':description'=> $description,
        ':id' => $id,
        ':img'=>$img
    ]);
    return $statement->rowCount()==1;
}

// add friends
function addFriends($userid, $friend_id) {
    global $db;
    $poststatement = $db->prepare("INSERT INTO friends(user_id, friend_id) values(:user_id, :friend_id)");
    $poststatement->execute([
        ':user_id'=>$userid,
        ':friend_id'=>$friend_id
    ]);
    return $poststatement->rowCount()==1;
}

// unfriends
function unFriends($userid, $friend_id) {
    global $db;
    $poststatement = $db->prepare("DELETE FROM friends where user_id= :userid and friend_id = :friend_id");
    $poststatement->execute([
        ':userid'=>$userid,
        ':friend_id'=>$friend_id
    ]);
    return $poststatement->rowCount()==1;
}

// get friends ID
function returnFriendId(){
    global $db;
    $statement = $db->query("SELECT*FROM friends;");
    $posts = $statement->fetchAll();
    return $posts;
}

// data hidden
function hiddenpost ($id,$userid){
    global $db;
    $statement = $db->prepare("INSERT INTO hidden (postsid,userid) values (:id,:userid)");
    $statement->execute([
        ':id'=>$id,
        ':userid'=>$userid
    ]);
    return $statement->rowCount()==1;
}

// get hidden data
function getdatahidden (){
    global $db;
    $statement = $db->query("SELECT*FROM hidden");
    $data = $statement->fetchAll();
    return $data;
}

// change user infomation
function changeUserinfo($username,$gender,$email,$date,$location,$userid){
    global $db;
    $statement = $db->prepare("UPDATE users SET name=:username,gender=:gender,email=:email,locationaddress=:location,dateofbirth=:date where id=:userid");
            $statement->execute([
                ':username' => $username,
                ':gender' => $gender,
                ':email' => $email,
                ':date' => $date,
                ':location' => $location,
                ':userid' => $userid
            ]);
            return $statement->rowCount()==1;
}
// change user infomation cover profile
function changeUserinfoAndCoverProfile($username,$gender,$email,$date,$location,$cover,$profile_img,$userid){
    global $db;
    $statement = $db->prepare("UPDATE users SET name=:username,gender=:gender,email=:email,locationaddress=:location,dateofbirth=:date, cover=:cover, profile_img=:profile_img where id=:userid");
            $statement->execute([
                ':username' => $username,
                ':gender' => $gender,
                ':email' => $email,
                ':date' => $date,
                ':location' => $location,
                ':cover' => $cover,
                ':profile_img' => $profile_img,
                ':userid' => $userid
            ]);
            return $statement->rowCount()==1;
}
// change user infomation profile
function changeUserinfoAndProfile($username,$gender,$email,$date,$location,$profile_img,$userid){
    global $db;
    $statement = $db->prepare("UPDATE users SET name=:username,gender=:gender,email=:email,locationaddress=:location,dateofbirth=:date, profile_img=:profile_img where id=:userid");
            $statement->execute([
                ':username' => $username,
                ':gender' => $gender,
                ':email' => $email,
                ':date' => $date,
                ':location' => $location,
                ':profile_img' => $profile_img,
                ':userid' => $userid
            ]);
            return $statement->rowCount()==1;
}
// change user infomation cover
function changeUserinfoAndCover($username,$gender,$email,$date,$location,$cover,$userid){
    global $db;
    $statement = $db->prepare("UPDATE users SET name=:username,gender=:gender,email=:email,locationaddress=:location,dateofbirth=:date, cover=:cover where id=:userid");
            $statement->execute([
                ':username' => $username,
                ':gender' => $gender,
                ':email' => $email,
                ':date' => $date,
                ':location' => $location,
                ':cover' => $cover,
                ':userid' => $userid
            ]);
            return $statement->rowCount()==1;
}