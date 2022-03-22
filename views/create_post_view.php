<?php session_start(); ?>

<!-- request header -->
<?php require_once('../templates/header.php');?>



<div class="w-50 ">
    <!-- menu link to other page -->
        <div class="p-2 d-flex justify-content-around bg-light">
            <h2><a href="home.php" class="text-black"><i class="bi bi-house-door f text-black"></i></a></h2>
            <h2><a href="showfriens.php"><i class="bi bi-people text-black"></i></a></h2>
            <h2><a href="user.php"><i class="bi bi-person-circle text-black"></i></a></h2> 
        </div>


        <div class="mt-3 p-3 card-post align-items-center justify-content-center d-flex">
            <form action="../controllers/create_post.php" method="post" class="w-75" enctype="multipart/form-data">

            <!-- The describtion of user post -->
                <textarea type='text' class="p-2 mt-5" placeholder="Text" name="description"></textarea>

            <!-- upload image for user post -->
                <input type="file" class="mt-5 mb-4" id="file" accept="image/png, image/jpg"  name="image">
                <label for="file" id="btnupload" class="btn btn-primary mt-3 mb-3">Upload Image</label>


            <!-- place for show image user select -->
                <div id="display_image"><img></div>
            
            <!-- group of button -->
                <div class="d-flex justify-content-end mt-lg-5">

                <!-- Button to click post -->
                    <input type="submit" name="submit" class="btn btn-primary m-2 fw-bold w-25" value="upload">
                
                <!-- button to click concel post -->
                    <button type="button" class="btn btn-secondary m-2 fw-bold w-25"><a href="create_post_view.html" >Concel</a></button>
                </div>
            </form>
        </div>
    </div>

<!-- insert data post into database -->


    
<!-- script for upload image -->
    <script>
        
        const image_input = document.querySelector('#file');
        var uploaded_image = "";

        image_input.addEventListener("change", function(){
            const reader = new FileReader();
            
            reader.addEventListener("load", ()=>{
                uploaded_image=reader.result;
                const img = document.querySelector("img");
                img.src = `${uploaded_image}`;
                console.log(document.querySelector('#display_image'));
            });
            reader.readAsDataURL(this.files[0]);
        })
    </script>

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




<!-- request footer -->
<?php require_once('../templates/footer.php');?>