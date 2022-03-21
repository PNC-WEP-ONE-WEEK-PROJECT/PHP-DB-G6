<?php
    require_once "../templates/header.php";
?>
<div class="comment-show-page">
    <?php
    require_once "../models/comment.php";
    $comments = returnallcommentsdata($_GET['id']);
    foreach ($comments as $comment):
    ?>
    <div class="commentp">
        <div class="left">
            <div class="profile">
                <img src="../images/p2.jpg">
            </div>
        </div>
        <div class="right">
            <div class="above">
                <p><?php echo $comment['description'];?></p>
            </div>
            <div class="below">
                <div class="info">Like</div>
                <div class="info">Reply</div>
                <div class="info">02 Feb 2022</div>
            </div>
        </div>
    </div>
    <?php
    endforeach;
    ?>
    <div class="footer">
        <a href="home.php"><button>Home</button></a>
    </div>
</div>

