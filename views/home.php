
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
                            <p>Sok Nhok</p>
                        </div>
                        <div class="date">
                            <p><?php echo $post['dateofposts'];?></p>
                        </div>
                    </div>
                </div>
                <div class="headerright">
                    <div class="btn-edit">
                        <a href="edit_view.php?id=<?php echo $post['id'];?>"><button>edit</button></a>
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
            <img src="../controllers/images/<?php echo $post["images"];?>" alt="">
            </div>
            <!-- footer of card footer  -->
            <div class="cardp-footer">
                <div class="like">
                    <i class="bi bi-hand-thumbs-up"></i>
                    <p>55 K</p>
                </div>
                <div class="comment">
                    <span class="glyphicon glyphicon-comment"></span>
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