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
                </div>
                <div class="input-g1">
                    <input type="password" name="password" id="password" placeholder="password">
                </div>
                <div class="input-g1">
                    <input type="date" name="date" id="date" placeholder="date of birth">
                </div>
                <div class="input-g1">
                    <select name="gender">
                        <option value="m">M</option>
                        <option value="f">F</option>
                    </select>  
                </div>
                <div class="input-g2">
                    <input type="email" name="email" id="email" placeholder="Email address">
                </div>
                <div class="input-g2">
                    <input type="text" name="location" id="location" placeholder="Location address">
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