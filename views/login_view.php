<?php session_start(); ?>

<?php require_once('models/post.php')?>
<!-- validation of input -->
<?php 
$user_name_error="";
$password_error="";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST["username"])){
        $user_name_error="Please input your user name";
    }
    if (empty($_POST["passwords"])){
        $password_error="Please input your password";
    }
    $items = getItems();
    foreach ($items as $item){
        if ($_POST["username"]==$item['name'] and $_POST["passwords"]==$item['password']){        
            $_SESSION['user_id'] = $item['id'];
            header('location: views/user.php?id='.$item['id']);
        }
        if ($_POST["username"]!=$item['name']){
            $user_name_error="User name is not correct. Please try again!";
        }
        if ($_POST["passwords"]!=$item['password']){
            $password_error="Your Passwords is not correct. Please try again!";
        }

    }
}
?>








<!-- reques header -->
<?php require_once('templates/header.php');?>

<div class="w-50 p-lg-5">

        <h1 class="fw-bold text-primary text-center">FACEBOOK</h1>
        <div class="p-lg-5 bg-primary mt-5">
            <div class="text-center"><h2>Login</h2></div>
            <div class="form-group mt-5 d-flex justify-content-center br">
                <div class="w-75">

                <!-- form login user -->
                    <form action="" method="post">

                    <!-- input user name -->
                        <input type="text" class="form-control p-4" placeholder="User Name" name="username">
                        <small class="form-text text-danger"> <?php echo $user_name_error; ?></small>

                    <!-- input user passwords -->
                        <input type="password" class="form-control mt-4" placeholder="Passwords" name="passwords">
                        <small class="form-text text-danger"> <?php echo $password_error; ?></small>

                        
                    
                    <!-- group button -->
                        <div class="d-flex justify-content-end mt-lg-5">

                        <!-- button click to log in account -->
                            <button type="submit" class="btn btn-light m-2 fw-bold">login</button>

                        <!-- button click to create new account -->
                            <button type="submit" class="btn btn-light m-2 fw-bold"><a href="views/signUp.php">Create</a></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<!-- reques footer -->
<?php require_once('templates/footer.php');?>

