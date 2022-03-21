<?php session_start(); ?>
<?php 
    require_once "../templates/header.php";
    require_once "../models/post.php";
    $friends = returnFriendId();
?>
<body class="d-flex justify-content-center" style="background-color: rgb(209, 209, 209);">
<div class="contianer-showpage w-50">
        <div class="m-auto sh-nav">
            <nav class="navbar sh-nav"></nav>
                <div class="p-2 d-flex justify-content-around bg-light">
                    <h2><a href="home.php" class="text-black"><i class="bi bi-house-door f text-black"></i></a></h2>
                    <h2><a href="showfriens.php"><i class="bi bi-people text-primary"></i></a></h2>
                    <h2><a href="user.php"><i class="bi bi-person-circle text-black"></i></a></h2>
                </div>
            </nav>
        </div>
        <div class="showallusers">
            <!-- show friends container -->
            <div class="cotianer-showfriends d-flex justify-content-center" >
                <div class="title font-weight-bold" style="padding: 30px 0px 5px 40px; border-bottom: 1px solid rgb(156, 156, 156); width:90%; font-weight: bold;">
                    People
                    <?php
                        require_once "../models/showpeople.php";
                        $users = returnallusersdata();
                        $count = 0;
                        foreach($users as $user){
                            $count += 1;
                        }
                        echo $count
                    ?>
                    here that you may know and you can add as friends
                </div>
            </div>
            <?php
                require_once "../models/showpeople.php";
                $users = returnallusersdata();
                foreach ($users as $user):
                
            ?>
            <?php 
                $condition = TRUE;
                foreach($friends as $friend){
                    if ($user['id']==$friend['friend_id'] and $friend['user_id']==$_SESSION['user_id']){
                        $condition = FALSE;
                    }
                }
            ?>
            <?php if ($condition) { ?>
            <div class="row mt-5  m-auto w-100" id="row" style="padding:10px 40px 10px 40px">
                <div class="col-lg-6 left">
                    <img src="../images/p2.jpg">
                    <p><?php echo $user['name'] ?></p>
                </div>
                <div class="col-lg-4 right d-flex gap-3">
                    <a href="../controllers/addFriend.php?id=<?php echo $user['id'] ?>" id="user<?php echo $user['id'] ?>"><button type="button" class="btn btn-primary btn-sm">add friend</button></a>
                    <!-- <a href="../controllers/unfriend.php?id=<?php echo $user['id'] ?>" style="display:none" id="friend<?php echo $user['id'] ?>"><button type="button" class="btn btn-secondary btn-sm">Unfriends</button></a> -->
                    <a href="viewProfile.php?id=<?php echo $user['id'];?>"><button type="button" class="btn btn-primary btn-sm">view profile</button></a>
                </div>
            </div>
            <?php } ?>
            <?php
                endforeach;
            ?>
        </div>
    </div>
</body>
</html>