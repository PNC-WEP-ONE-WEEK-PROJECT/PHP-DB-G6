<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home-pages</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- post -->
<div class="home-page">

    <?php 
        require_once "models/post.php";
        require_once "controllers/delete_post.php";
        $id = $_GET['id'];
        deletepost($id);
        $posts = returnallpostdata();
        foreach($posts as $post):
    ?>
        <!-- header of post -->
        <div class="home-header">
            <h1>Here the menu</h1>
        </div>
        

        <!-- post card body -->
        <div class="home-body">
            <div class="post-card">
                <div class="post-card-header">
                    <!-- container about user information and some setting of post card -->
                    <div class="menu1">
                        <!-- envole profile-account name-date of post-friendship of user  -->
                        <div class="menu-left">
                            <!-- profile picture of account -->
                            <div class="img">
                                <img src="images/image-62296add80e539.04751305.jpg" width="25%">
                            </div>
                            <div class="menu-left-title">
                                <!-- username -->
                                <h4>Passerelles Numeriques</h4>
                                <!-- date of post -->
                                <p>Feb 02 2022</p>
                                <!-- friendship -->
                                <div class="logo"><img src="images/friendsicon.png" width="5%"></div>
                            </div>
                        </div>
                        <!-- settion of post -->
                        <div class="menu-right">
                            <div class="setting-btn">
                                <select name="gender">
                                    <option value="none" selected>setting</option>
                                    <option value="Edit" id="edit">Edit</option>
                                    <a href="controllers/delete_post.php?id=" <?php echo $post['id'];?>>
                                        <option value="Delete" id="delete">Delete</option>
                                    </a>
                                </select> 
                            </div>
                        </div>
                    </div>
                    <!-- container the title of post and the caption of post -->
                    <div class="menu2">
                        <p><?php echo $post['description']?></p>
                    </div>
                </div>

                <div class="post-card-body">
                    <img src="images/image-62296add80e539.04751305.jpg" width="57%">
                    <img src="images/image-62296af7108246.04371375.jpg" width="42.3%">
                </div>

                <div class="post-card-footer">
                    <div class="btn-group">
                        <img src="images/likeicon.png" width="15%">
                        <p>200 like</p>
                    </div>
                    <div class="btn-group">
                        <img src="images/Commenticon.webp" width="15%">
                        <p>200 comment</p>
                    </div>
                    <div class="btn-group">
                        <img src="images/shareicon.png" width="10%">
                        <p>2000 share</p>
                    </div>
                </div>
            </div>
            </div>
        <?php
        endforeach;
        ?>
</div>
</body>
</html>