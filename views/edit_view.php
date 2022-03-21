<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit view</title>
    <link rel="stylesheet" href="../bopha/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body>
    <?php 
        require_once "../models/edit.php";
        $post = getItemById($_GET['id']);
    ?>
    <div class="mt-3 p-3 card-post align-items-center justify-content-center d-flex">
        <form action="../controllers/edit.php" class="w-75" method="post" enctype="multipart/form-data">
            <textarea class="p-2 mt-5" name="text-input-edit" w-100><?php echo $post['description'];?></textarea>
            <input type="hidden" value="<?= $post['id']?>" name='text_edit'>
            <input type="file" name ="image" class="mt-5 mb-4" id="file" accept="image/png, image/jpg">
            <input type="hiddent" name="file" value="<?= $post['image'];?>">
            <label for="file" id="btnupload" class="btn btn-primary mt-3 mb-3">Upload Image</label>
            <div id="display_image"><img></div>
            <div class="d-flex justify-content-end mt-lg-5">
                <button type="submit" class="btn btn-primary m-2 fw-bold w-25">Post</button>
                <a href="home.php"><button type="submit" class="btn btn-secondary m-2 fw-bold w-25">Concel</button></a>
            </div>
        </form>
    </div>

</body>
</html>