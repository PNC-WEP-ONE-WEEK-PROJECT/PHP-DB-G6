<?php session_start(); ?>
<!-- get data value from database -->

<?php
require_once('../models/post.php');
// $id = $_GET['id'];
$user_data = getItemById($_GET['id']);
$data_user = getUserDataById($_GET['id'])
?>

<!-- reques header -->
<?php require_once('../templates/header.php');?>
    <div class="w-50 ">
        <div class=" show-nav">
            <div class="p-2 d-flex justify-content-around bg-light">
                <h2><a href="home.php" class="text-black"><i class="bi bi-house-door f text-black"></i></a></h2>
                <h2><a href="showfriens.php"><i class="bi bi-people text-black"></i></a></h2>
                <h2><a href="user.php"><i class="bi bi-person-circle text-black"></i></a></h2>
            </div>
        </div>
        <div class="align-items-center justify-content-center d-flex mt-5"  style="padding: 43px 0 0 0; z-index: 0;">
            <div class="w-100">
                <div style="width: 100%; margin: 0;">
                <div class="cover p-3" >
                </div>
                <div class="user-name align-items-center d-flex"><h4 id="username"><?php echo $user_data['name'] ?></h4></div>
                    <div class="profile-pic-div" style="z-index:0">
                        <img id="photo" class="rounded-circle" src="../uploads/image-62296add80e539.04751305.jpg"  data-holder-rendered="true" alt="" srcset="">
                        <input type="file" id="file" name="profile">
                        <label for="file" id="uploadBtn">choose image</label>
                    </div>
                </div>
                <div class="user-infomation mt-4 p-3">
                    <div class="d-flex"><strong>Email &#160&#160&#160&#160&#160&#160&#160:&#160&#160</strong><p id="user_email"><?php echo $user_data['email'] ?></p></div>
                    <div class="d-flex"><strong>Location &#160:&#160&#160</strong><p><?php echo $user_data['locationaddress'] ?></p id="user_location"></div>
                    <div class="d-flex"><strong>Datebirth:&#160&#160</strong><p><?php echo $user_data['dateofbirth'] ?></p id="user_datebirth"></div>
                    <div class="d-flex"><strong>Gender &#160&#160&#160:&#160&#160</strong><p><?php echo $user_data['gender'] ?></p id="user_gender"></div>
                    <div class="d-flex w-100 gap-2">
                        <button class="btn btn-primary w-50 fw-bold" type="button" id="view-friends"><a href="showfriens.php">Friends</a></button>
                        <button class="btn btn-primary w-50 fw-bold" type="button" id="create-post"><a href="create_post_view.php?id=<?php echo $user_data['id']?>">Create Post</a></button>
                    </div>
                </div>
            </div>
        </div>

        <?php foreach ($data_user as $data) {?>
            <div class="">
                <div class=" bg-light mt-3 w-100 h-100 " style="border-radius: 5px;">
                    <div class="d-flex justify-content-between w-100 p-3">
                        <div class="d-flex align-items-center gap-4">
                            <img src="../uploads/image-62296add80e539.04751305.jpg" class="rounded-circle" alt="Cinque Terre" style="height: 70px; width: 70px;">
                            <h5><strong><?php echo $user_data['name'] ?></strong></h5>
                        </div>
                        <div class="dropdown dropstart text-end border-1">
                            <i class="bi bi-three-dots m-1 fs-3 text-secondary" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" id="dropdown-cover"></i>

                            <ul class="dropdown-menu" id="cover-dropdown" aria-labelledby="dropdownMenuButton1">
                                <li id="remove_cover"><a class="dropdown-item" href="../controllers/delete_user_post.php?id=<?php echo $data['id'];?>">Delete Post</a></li>
                                <li><a class="dropdown-item" href="edite_create_post_view.php?id=<?php echo $data['id'];?>">Update Post</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="w-100 h-75">
                        <p class="mt-1" style="margin: 0 20px 0 20px;"><?php echo $data['description'] ?></p>
                        <div style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                            <?php if (!empty($data['image'])){ ?>
                            <img src="../controllers/images/<?php echo $data['image'] ?>" alt="" class="mt-3 shadow-box-example z-depth-1" style="border-radius: 2px;" >
                            <?php } ?>
                        </div>
                    </div>
                    <div class="cardp-footer d-flex justify-content-around" >
                        <div class="like">
                            <i class="bi bi-hand-thumbs-up fs-2"></i>
                            <p>55 K</p>
                        </div>
                        <div class="comment">
                            <i class="bi bi-chat-left-text fs-3"></i>
                            <p>200 K</p>
                        </div>
                    </div>
                </div>
            </div>
    <?php } ?>

    </div>

<!-- request footer -->
<?php require_once('../templates/footer.php');?>