<?php session_start(); ?>

<!-- request header -->
<?php require_once('../templates/header.php');?>
<?php 
require_once('../models/post.php');
$id = $_SESSION['user_id'];
$user_data = getItemById($_SESSION['user_id']);
$userData = getItemById($id);
?>



<div class="w-50 ">
    <!-- menu link to other page -->
        <div class="p-2 d-flex justify-content-around bg-light">
            <h2><a href="home.php" class="text-black"><i class="bi bi-house-door f text-black"></i></a></h2>
            <h2><a href="showfriens.php"><i class="bi bi-people text-black"></i></a></h2>
            <h2><a href="user.php"><i class="bi bi-person-circle text-black"></i></a></h2> 
        </div>


        <div class="mt-3 p-3 card-post align-items-center justify-content-center d-flex">
            <form action="../controllers/user_setting.php" method="post" class="w-75" enctype="multipart/form-data">

            <!-- upload image for user post -->
                <input type="file" class="mt-5 mb-4" id="file" accept="image/png, image/jpg"  name="cover">
                <label for="file" id="btnupload" class="btn btn-primary mt-3 mb-3">Upload Image</label>


            <!-- place for show image user select -->
                <div class="cover" ><img src="../controllers/images/<?php echo $user_data['cover'] ?>" alt="" srcset=""></div>

            <!-- profile -->
                <div class="profile-pic text-center mt-5">
                    <img id="photo" src="../controllers/images/<?php echo $user_data['profile_img'] ?>"  data-holder-rendered="true" alt="" srcset="">
                    <input type="file" id="imag" hidden name="profile">
                    <label for="imag" id="uploadBtn">choose image</label>
                </div>
            
    
                        <div class="w-100" style="margin-top:70px;"><input type="text" placeholder="Name" class="p-2 form-control" style="border: none; border-bottom: 1px solid rgb(177, 177, 177);" value="<?php echo $userData['name'] ?>" name="username"></div>
                            <div class="w-100 mt-3"><input type="text" placeholder="Email" class="p-2 form-control" style="border: none; border-bottom: 1px solid rgb(177, 177, 177);" value="<?php echo $userData['email'] ?>" name="useremail"></div>
                            <div class="w-100 mt-3"><input type="text" placeholder="Location" class="p-2 form-control" style="border: none; border-bottom: 1px solid rgb(177, 177, 177);" value="<?php echo $userData['locationaddress'] ?>" name="userlocation"></div>
                            <div class="w-100 mt-3 d-flex justify-content-between">
                                <input type="date" placeholder="Datebirth" class="p-2 form-control w-50" style="border: none; border-bottom: 1px solid rgb(177, 177, 177);" value="<?php echo $userData['dateofbirth'] ?>" name="userdate">
                                <input type="text" placeholder="Gender" class="p-2 form-control w-25" style="border: none; border-bottom: 1px solid rgb(177, 177, 177);" value="<?php echo $userData['gender'] ?>" name="usergender">
                            </div>
                            <div class="d-flex justify-content-end mt-5 gap-2" >
                                <button type="submit" name="submit" class="btn btn-primary fw-bold w-25" value="upload"></button>
                            
                            <!-- button to click concel post -->
                                <button type="button" class="btn btn-secondary fw-bold w-25"><a href="user.php" >Concel</a></button>
                            </div>
            </form>
        </div>
    </div>

<!-- insert data post into database -->

<!-- script for increase sigh text area -->
    <script>
        const textarea = document.querySelector("textarea");
        textarea.addEventListener("keyup", e =>{
            textarea.style.height = "auto";
            let scHeight = e.target.scrollHeight;
            textarea.style.height = scHeight-5+"px";
        })
    </script>

<!-- if user click on button concel -->
    <script>
        function clearCreatePost(){
            document.querySelector("description").value = "";
            let image = document.querySelector("description");
            image.reload();
        }
    </script>

    <!-- profile -->
    <script>
        const imgDiv = document.querySelector('.profile-pic');
        const img = document.querySelector('#photo');
        const file = document.querySelector('#imag');
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
    </script>



<!-- request footer -->
<?php require_once('../templates/footer.php');?>