<?php 
    require_once "../templates/header.php";
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
            <div class="cotianer-showfriends">
                <div class="title">
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
            <div class="row mt-5 m-auto w-75" id="row">
                <div class="col-lg-6 left">
                    <img src="../images/p2.jpg">
                    <p class="text"><?php echo $user['name'] ?></p>
                </div>
                <div class="col-lg-6 right">
                    <button class="btn">add friends</button>
                    <a href="../controllers/delete_user.php?<?= $user['id'];?>"><button class="btn">remove</button></a>
                </div>
            </div>
            <?php
                endforeach;
            ?>
        </div>
    </div>
</body>
</html>