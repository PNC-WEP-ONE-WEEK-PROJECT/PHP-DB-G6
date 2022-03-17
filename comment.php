<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comment blank</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="comment-body">
        <?php 
        $time = [1,1,1,1,1,1,1,1,1,1,1,1];
        foreach ($time as $t):
        ?>
        <div class="card">
            <div class="profile">
                <img src="images/image-62296add80e539.04751305.jpg" width="20%">
            </div>
            <div class="comment-box">
                <div class="comment-text">
                    <p>Well done </p>
                </div>
                <div class="comment-info">
                    <ul>
                        <li>like</li>
                        <li>reply</li>
                        <li>Feb 02 2020</li>
                    </ul>
                </div>
            </div>
            <div class="comment-reply">
                
            </div>
        </div>
        <?php
        endforeach;
        ?>
    </div>
    <div class="comment-footer">
            <div class="profile">
                <img src="images/image-62296add80e539.04751305.jpg" width="20%">
            </div>
            <div class="form">
                <form action="">
                    <input type="text" placeholder="write your comment...">
                    <button type="submit" class="submitcomment">submit</button>
                </form>
            </div>
        </div>
</body>
</html>