<?php session_start() ?>
<?php require_once('../models/post.php') ?>

<!-- Check the input of user to create new account -->
    <?php
        $db = new PDO("mysql:host=localhost;dbname=facebook_g6db", 'root', '');
        $condition = !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['date']) && !empty($_POST['gender']) && !empty($_POST['email']) && !empty($_POST['location']);
        if ($_SERVER['REQUEST_METHOD']=='POST' && $condition){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $date = $_POST['date'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $location = $_POST['location'];

            $statement = $db->prepare("INSERT INTO users (name,gender,email,password,locationaddress,dateofbirth) VALUES (:username, :gender,:email,:password,:location,:date)");
            $statement->execute([
                ':username' => $username,
                ':gender' => $gender,
                ':password' => $password,
                ':email' => $email,
                ':date' => $date,
                ':location' => $location 
            ]);
            $items = getItems();
            $user_id = 0;
            foreach ($items as $item){
                if ($password==$item['password']){        
                    $_SESSION['user_id'] = $item['id'];
                    header('location: user.php?id='.$item['id']);
                }
                // $user_id = $item['id'];
            
            }
        }


        
        // DATA
        $errorusername ="";
        $errorpassword = "";
        $errordate = "";
        $errorgender = "";
        $erroremail = "";
        $errorlocation = "";

        // VALIDATION USERNAME
        function usernamevali (){
            if (empty($_POST['username'])){
                return 1;
            }else if (ctype_alnum($_POST['username'])){
                return 2;
            }
        }

        // VALIDATION PASSWORD
        function passwordvali(){
            if (empty($_POST['password'])){
                return 1;
            }else if (strlen($_POST['password'])<8){
                return 2;
            }
        }

        // VALIDATION DATE
        function datevali (){
            if (empty($_POST['date'])){
                return false;
            }else {
                return true;
            }
        }

        // validation gender 
        function gendervali (){
            if (empty($_POST['gender'])){
                return false;
            }else {
                return true;
            }
        }
        
        // validation email
        function emailvali (){
            if (isset($_POST['email'])){
                if (empty($_POST['email'])){
                    return 2;
                }else {
                    for ($i=0;$i<strlen($_POST['email']);$i++){
                        if ($_POST['email'][$i]=="@"){
                            return 1;
                        }
                    }
                }
            }
        }

        // validation location
        function locationvali (){
            if (empty($_POST['location'])){
                return false;
            }else {
                return true;
            }
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            // check username
            if (usernamevali()==1){
                $errorusername = "Please input username!";
            }
            // check password
            if (passwordvali()==1){
                $errorpassword = "please input your password!";
            }else if (passwordvali()!=1 and passwordvali()==2){
                $errorpassword = "password must be more than 8 character!";
            }
            // check date
            if (datevali()==false){
                $errordate = "pleas select the date!";
            }else if(datevali()==true) {
                $errordate = "";
            }
            // check gender
            if (gendervali()==false){
                $errorgender = "please select gender!";
            }else if (gendervali()==true){
                $errorgender = "";
            }
            // check email
            if (emailvali()==2){
                $erroremail = "please input your email!";
            }else if (emailvali()!=1){
                $erroremail = "Email address must be contian '@'!";
            }
            // check location
            if (locationvali()==false){
                $errorlocation = "please input your location address!";
            }else if (locationvali()==true){
                $errorlocation = "";
            }
        }
        

     
    ?>





<!-- request header -->
<?php require_once('../templates/header.php');?>

    <!-- container -->
    <div class="containeri">
        <!-- header container -->
        <!-- <div class="header-container">
            <h1>Facebook</h1>
        </div> -->
        <!-- body container -->
        <div class="body-container bg-primary">
            <div class="title-container">
                <h1>Sign Up</h1>
            </div>
            <!-- form -->
            <form action="" method="POST">
                <div class="input-g1">
                    <input type="text" name="username" id="username" placeholder="username">
                    <small class="form-text text-danger"> <?php echo $errorusername; ?></small>
                </div>

                <div class="input-g1">
                    <input type="password" name="password" id="password" placeholder="password">
                    <small class="form-text text-danger"> <?php echo $errorpassword; ?></small>
                </div>

                <div class="input-g1">
                    <input type="date" name="date" id="date" placeholder="date of birth">
                    <small class="form-text text-danger"> <?php echo $errordate; ?></small>
                </div>

                <div class="input-g1">
                    <select name="gender">
                        <option value="" selected>gender</option>
                        <option value="m">M</option>
                        <option value="f">F</option>
                    </select>  
                    <small class="form-text text-danger"> <?php echo $errorgender; ?></small>
                </div>

                <div class="input-g2 text-dark">
                    <input type="text" name="email" id="email" placeholder="Email address">
                    <small class="form-text text-danger"> <?php echo $erroremail; ?></small>
                </div>
                <div class="input-g2 text-dark">
                    <input type="text" name="location" class="text-dark" id="location" placeholder="Location address">
                    <small class="form-text text-danger"> <?php echo $errorlocation; ?></small>
                </div>
                <div class="btn-g">
                    <button class="creat-acc btn btn-light fw-bold text-dark w-25">Create</button>
                    <button class="log-in btn btn-light fw-bold text-dark w-25"><a href="../index.php">LogIn</a></button>
                </div>
            </form>
        </div>
    </div>

<?php 

?>
<!-- request footer -->
<?php require_once('../templates/footer.php')?>
</html>