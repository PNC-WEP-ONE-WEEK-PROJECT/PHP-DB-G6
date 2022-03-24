<?php session_start(); ?>
<!-- get data value from database -->

<?php
require_once('../models/post.php');
// $id = $_GET['id'];
$user_data = getItemById($_SESSION['user_id']);
$data_user = getUserDataById($_SESSION['user_id'])
?>








<!-- reques header -->
<?php require_once('../templates/header.php');?>
    <div class="w-50 ">
        <div class=" show-nav">
            <div class="p-2 d-flex justify-content-around bg-light">
                <h2><a href="home.php" class="text-black"><i class="bi bi-house-door f text-black"></i></a></h2>
                <h2><a href="showfriens.php"><i class="bi bi-people text-black"></i></a></h2>
                <h2><a href="user.php"><i class="bi bi-person-circle text-primary"></i></a></h2>
            </div>
        </div>
        <div class="align-items-center justify-content-center d-flex mt-5"  style="padding: 43px 0 0 0; z-index: 0;">
            <div class="w-100">
                <div style="width: 100%; margin: 0;">
                <div class="cover p-3 bg-light" style="background-image: url(../controllers/images/<?php echo $user_data['cover'] ?>); ">
                </div>
                <div class="user-name align-items-center d-flex"><h4 id="username"><?php echo $user_data['name'] ?></h4></div>
                    <div class="profile-pic-div mt-5" style="z-index:0">
                        <img id="photo" class="rounded-circle" src="../controllers/images/<?php echo $user_data['profile_img'] ?>"  data-holder-rendered="true" alt="" srcset="">
                    </div>
                </div>
                <div class="user-infomation mt-4 p-3">
                    <div class="d-flex"><strong>Email &#160&#160&#160&#160&#160&#160&#160:&#160&#160</strong><p id="user_email"><?php echo $user_data['email'] ?></p></div>
                    <div class="d-flex"><strong>Location &#160:&#160&#160</strong><p><?php echo $user_data['locationaddress'] ?></p id="user_location"></div>
                    <div class="d-flex"><strong>Datebirth:&#160&#160</strong><p><?php echo $user_data['dateofbirth'] ?></p id="user_datebirth"></div>
                    <div class="d-flex"><strong>Gender &#160&#160&#160:&#160&#160</strong><p><?php echo $user_data['gender'] ?></p id="user_gender"></div>
                    <div class="d-flex w-100 gap-2">
                    <a href="userFriends.php?id=<?php echo $user_data['id'];?>" class="btn btn-primary w-50 fw-bold" id="view-friends">Friends</a>
                    <a href="setting.php?id=<?php echo $user_data['id'];?>" class="btn btn-primary w-50 fw-bold" id="view-friends">setting</a>
                        <button class="btn btn-primary w-50 fw-bold" type="button" id="create-post"><a href="create_post_view.php?id=<?php echo $user_data['id']?>" class="text-light">Create Post</a></button>
                    </div>
                </div>
            </div>
        </div>

        <?php foreach ($data_user as $data) {?>
            <div class="">
                <div class=" bg-light mt-3 w-100 h-100 " style="border-radius: 5px;">
                    <div class="d-flex justify-content-between w-100 p-3">
                        <div class="d-flex align-items-center gap-4">
                            <img src="../controllers/images/<?php echo $user_data['profile_img'] ?>" class="rounded-circle" alt="Cinque Terre" style="height: 70px; width: 70px;">
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
                    <div class="cardp-footer d-flex justify-content-around"  style="text-align: center; margin-top:10px; color:white; border-top:1px solid gray">
                        <div class="like" style= "margin:auto; width:50%; margin-top:10px;">
                            <i class="bi bi-hand-thumbs-up fs-2 text-dark"></i>
                            <p class="text-dark">55 K</p>
                        </div>
                        <div class="comment" style= "margin:auto; width:50%; margin-top:10px">
                            <i class="bi bi-chat-left-text fs-3 text-dark"></i>
                            <p class="text-dark">200 K</p>
                        </div>
                    </div>
                </div>
            </div>
    <?php } ?>

    </div>


    
<!-- 
    <script>
        const imgDiv = document.querySelector('.profile-pic-div');
        const img = document.querySelector('#photo');
        const file = document.querySelector('#file');
        const uploadBtn = document.querySelector('#uploadBtn');

        // if user hover on profile div
        imgDiv.addEventListener('mouseenter', function()
        {
            uploadBtn.style.display='block';
        });

        //  if we hover out from img div
        imgDiv.addEventListener('mouseleave', function()
        {
            uploadBtn.style.display = "none";
        });

        // lets work for image showing function

        // when we choose a photo to upload
        file.addEventListener('change', function()
        {
            const choosedFile = this.files[0];

            if (choosedFile) {

                const reader = new FileReader();

                reader.addEventListener('load', function(){
                    img.setAttribute('src', reader.result);
                    
                });
                
                reader.readAsDataURL(choosedFile);
            }
        })
    </script> -->

    <!-- cover -->
    <script>
    //     let img = document.getElementByClassName(".cover");
    //     img.style.backgroundImage = "url('8.PNG')";
    // </script>


    
<!-- request footer -->
<?php require_once('../templates/footer.php');?>