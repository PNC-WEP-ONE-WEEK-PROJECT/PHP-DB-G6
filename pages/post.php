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
        <div class="mt-3 p-3 card-post align-items-center justify-content-center d-flex">
            <form action="" class="w-75">
                <textarea class="p-2 mt-5" placeholder="Text "></textarea>
                <input type="file" class="mt-5 mb-4" id="file" accept="image/png, image/jpg">
                <label for="file" id="btnupload" class="btn btn-primary mt-3 mb-3">Upload Image</label>
                <div id="display_image"><img></div>
                <div class="d-flex justify-content-end mt-lg-5">
                    <button type="submit" class="btn btn-primary m-2 fw-bold w-25">Post</button>
                    <button type="submit" class="btn btn-secondary m-2 fw-bold w-25">Concel</button>
                </div>
            </form>
        </div>
    </div>
    

    

    <script>
        const image_input = document.querySelector('#file');
        var uploaded_image = "";

        image_input.addEventListener("change", function(){
            const reader = new FileReader();
            
            reader.addEventListener("load", ()=>{
                uploaded_image=reader.result;
                const img = document.querySelector("img");
                img.src = `${uploaded_image}`;
                console.log(`${uploaded_image}`);
            });
            reader.readAsDataURL(this.files[0]);
        })
    </script>

    <script>
        const textarea = document.querySelector("textarea");
        textarea.addEventListener("keyup", e =>{
            textarea.style.height = "auto";
            let scHeight = e.target.scrollHeight;
            textarea.style.height = scHeight-5+"px";
        })
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>