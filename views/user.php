<?php session_start(); ?>
<!-- get data value from database -->

<?php
require_once('../models/post.php');
// $id = $_GET['id'];
$user_data = getItemById($_SESSION['user_id']);
?>








<!-- reques header -->
<?php require_once('../templates/header.php');?>
    <div class="w-50 ">
        <div class="p-2 d-flex justify-content-around bg-light">
            <h2><a href="logIn.html" class="text-black"><i class="bi bi-house-door f text-black"></i></a></h2>
            <h2><a href="logIn.html"><i class="bi bi-people text-black"></i></a></h2>
            <h2><a href="user.php"><i class="bi bi-person-circle text-primary"></i></a></h2>
            
        </div>
        <div class="align-items-center justify-content-center d-flex">
            <div class="w-100">
                <div style="width: 100%; margin: 0;">
                    <div class="cover">
                        <div class="dropdown dropstart text-end border-1">
                                <i class="bi bi-three-dots m-3 fs-1 text-secondary" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" id="dropdown-cover"></i>

                                <ul class="dropdown-menu" id="cover-dropdown" aria-labelledby="dropdownMenuButton1">
                                    <li id="remove_cover"><a class="dropdown-item" href="#" onclick="removeCover()">Remove Cover</a></li>
                                    <li><a class="dropdown-item" href="#"><input type="file" id="file_cover" name="cover" hidden><label for="file_cover">Change Cover</label></a></li>
                                </ul>
                        </div>
                    </div>
                    <div class="user-name align-items-center d-flex"><h4 id="username"><?php echo $user_data['name'] ?></h4></div>
                    <div class="profile-pic-div">
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
                        <button class="btn btn-primary w-50 fw-bold" type="button" id="view-friends">Friends</button>
                        <button class="btn btn-primary w-50 fw-bold" type="button" id="create-post"><a href="create_post_view.php?id=<?php echo $user_data['id']?>">Create Post</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- profile -->
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
    </script>

    <!-- cover -->
    <script>
        const image_input = document.querySelector('#file_cover');
        var uploaded_image = "";

        image_input.addEventListener("change", function(){
            const reader = new FileReader();
            
            reader.addEventListener("load", ()=>{
                uploaded_image=reader.result;
                let img = document.querySelector(".cover");
                img.style.backgroundImage = "url("+ `${uploaded_image}`+")";
                // console.log(`${uploaded_image}`);
            });
            reader.readAsDataURL(this.files[0]);
            
            })

        function removeCover(){
            console.log('Hello world how are you?')
            let foobarElement = document.querySelector('.cover');
            console.log(foobarElement)
            foobarElement.style.backgroundImage = 'url()';
            foobarElement.style.backgroundColor = 'white';
            
        }
    </script>


    
<!-- request footer -->
<?php require_once('../templates/footer.php');?>