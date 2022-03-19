<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
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
                return false;
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
            if (usernamevali()==false){
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
    <!-- container -->
    <div class="container">
        <!-- header container -->
        <div class="header-container">
            <h1>Facebook</h1>
        </div>
        <!-- body container -->
        <div class="body-container">
            <div class="title-container">
                <h1>Sign Up</h1>
            </div>
            <!-- form -->
            <form action="" method="POST">
                <div class="input-g1">
                    <input type="text" name="username" id="username" placeholder="username">
                    <div class="text-error" ><p><?php echo $errorusername; ?></p></div>
                </div>
                <div class="input-g1">
                    <input type="password" name="password" id="password" placeholder="password">
                    <div class="text-error"><p><?php echo $errorpassword; ?></p></div>
                </div>
                <div class="input-g1">
                    <input type="date" name="date" id="date" placeholder="date of birth">
                    <div class="text-error"><p><?php echo $errordate; ?></p></div>
                </div>
                <div class="input-g1">
                    <select name="gender">
                        <option value="" selected>gender</option>
                        <option value="m">M</option>
                        <option value="f">F</option>
                    </select>  
                    <div class="text-error"><p><?php echo $errorgender; ?></p></div>
                </div>
                <div class="input-g2">
                    <input type="text" name="email" id="email" placeholder="Email address">
                    <div class="text-error"><p><?php echo $erroremail; ?></p></div>
                </div>
                <div class="input-g2">
                    <input type="text" name="location" id="location" placeholder="Location address">
                    <div class="text-error"><p><?php echo $errorlocation; ?></p></div>
                </div>
                <div class="btn-g">
                    <button class="creat-acc">Create Account</button>
                    <button class="log-in">Log In</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>