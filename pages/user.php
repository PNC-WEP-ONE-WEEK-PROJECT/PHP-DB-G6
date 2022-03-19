<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body class=" d-flex justify-content-center" style="background-color: rgb(209, 209, 209);">
    <div class="w-50 ">
        <div class="p-2 d-flex justify-content-around bg-light">
            <h2><a href="logIn.html" class="text-black"><i class="bi bi-house-door f text-black"></i></a></h2>
            <h2><a href="logIn.html"><i class="bi bi-people text-black"></i></a></h2>
            <h2><a href="logIn.html"><i class="bi bi-person-circle text-black"></i></a></h2>
            
        </div>
        <div class="align-items-center justify-content-center d-flex">
            <div class="w-100">
                <div style="width: 100%; margin: 0;">
                    <div class="cover">
                        <div class="dropdown dropstart text-end ">
                                <i class="bi bi-three-dots m-3 fs-1 text-secondary" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" id="dropdown-cover"></i>

                                <ul class="dropdown-menu" id="cover-dropdown" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Remove Cover</a></li>
                                <li><a class="dropdown-item" href="#"><input type="file" id="change-cover" hidden><label for="change-cover">Change Cover</label></a></li>
                                </ul>
                        </div>
                        <!-- <img src="images/image-62296add80e539.04751305.jpg" alt=""> -->
                    </div>
                    <div class="user-name align-items-center d-flex"><h4>Hello world</h4></div>
                    <div class="profile-pic-div">
                        <img id="photo" class="rounded-circle" src="images/image-62296af7108246.04371375.jpg"  data-holder-rendered="true" alt="" srcset="">
                        <input type="file" id="file">
                        <label for="file" id="uploadBtn">choose image</label>
                    </div>
                </div>

                <div class="user-infomation mt-4 p-3">
                    <div class="d-flex"><strong>Email &#160&#160&#160&#160&#160&#160&#160:&#160&#160</strong><p>Hello world</p></div>
                    <div class="d-flex"><strong>Phone &#160&#160&#160&#160&#160:&#160&#160</strong><p>hello world</p></div>
                    <div class="d-flex"><strong>Location &#160:&#160&#160</strong><p>how are you</p></div>
                    <div class="d-flex"><strong>Datebirth:&#160&#160</strong><p>where are you</p></div>
                    <div class="d-flex"><strong>Gender &#160&#160&#160:&#160&#160</strong><p>morning</p></div>
                    <div class="d-flex w-100 gap-2">
                        <button class="btn btn-primary w-50 fw-bold" type="button" id="view-friends">Friends</button>
                        <button class="btn btn-primary w-50 fw-bold" type="button" id="create-post">Create Post</button>
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
    <!-- <script>
        const backgroundDiv = document.querySelector('.cover');
        const background-img = document.querySelector('#photo');
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

    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>