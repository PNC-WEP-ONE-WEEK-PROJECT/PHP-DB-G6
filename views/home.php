
 <?php
    require_once "../templates/header.php";
 ?>

<body class="d-flex justify-content-center" style="background-color: rgb(209, 209, 209);">
<div class="w-50">
    <div class="show-nav">
        <div class="p-2 d-flex justify-content-around bg-light">
            <h2><a href="home.php" class="text-black"><i class="bi bi-house-door f text-primary"></i></a></h2>
            <h2><a href="showfriens.php"><i class="bi bi-people text-black"></i></a></h2>
            <h2><a href="user.php"><i class="bi bi-person-circle text-black"></i></a></h2>   
        </div>
    </div>
    <!-- body -->
    <div class="container-post">
        <!-- container header -->
        <div class="container-header">
            <div class="navbar">
            <?php 
            require_once "../templates/header.php"
            ?>
            </div>
        </div>
        <?php
            require_once "../models/post.php";
            $posts = returnallpostdata();
            foreach ($posts as $post):
        ?>
        <div class="cardp">
            <!-- header of card post -->
            <div class="cardp-header">
                <div class="headerleft">
                    <div class="profile">
                        <img src="../images/p2.jpg" width="50%">
                    </div>
                    <div class="title">
                        <div class="profilename">
                            <h6 style="font-size: 20px;font-weight:bold;">Sok Nhok</h6>
                        </div>
                        <div class="date">
                            <p><?php echo $post['dateofposts'];?></p>
                        </div>
                    </div>
                </div>
                <div class="headerright">
                    <div class="btn-edit">
                        <a href="edit_view.php?id=<?php echo $post['id'];?>"><button>Edit</button></a>
                    </div>
                    <div class="btn-delete">
                        <a href="../controllers/delete_post.php?id=<?php echo $post['id']?>;"><button>delete</button></a>
                    </div>
                </div>
            </div>
            <!-- description of card post -->
            <div class="cardp-description">
                <p><?php echo $post['description']; ?></p>
            </div>
            <!-- body of card post cantain text or picture -->
            <div class="cardp-body">
            <img src="../controllers/images/<?php echo $post["image"];?>" alt="">
            </div>
            <!-- comment-site -->
            <div class="comment-site">
                <div class="left">
                    <div class="profile">
                        <img src="../images/p2.jpg" alt="">
                    </div>
                </div>
                <div class="right">
                    <form action="../controllers/comment.php" method="POST">
                        <input type="text" name="comment-text" placeholder="Wrtie your comment here...">
                        <input type="hidden" value="<?php echo $post['id'];?>" name="comment-postid">
                        <a href="../models/comment.php echo $post['id'];?>"><button type="submit"><i class="bi bi-send-fill"></i></button></a>
                    </form>
                </div>
            </div>
            <!-- footer of card footer  -->
            <div class="cardp-footer">
                <div class="like">
                    <i class="bi bi-hand-thumbs-up"></i>
                    <p>55 K</p>
                </div>
                <div class="commentbtn">
                    <a href="comment_show.php?id=<?php echo $post['id'];?>"><span class="glyphicon glyphicon-comment"></span></a>
                   <p>200 K</p>
                </div>
            </div>
        </div>
        <?php
        endforeach;
        ?>
    </div>
</div>
</body>
</html>