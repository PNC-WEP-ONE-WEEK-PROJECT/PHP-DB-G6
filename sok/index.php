<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add friends pages</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container2">
        <div class="header-c2">
            <div class="title">
                <h1>Here is the menu bar</h1>
            </div>
            <div class="form">
            <form action="">
                <input type="text" name="search" placeholder="SEARCH">
                <button type="submit">Search</button>
            </form>
            </div>
            <div class="footer">
                <h4>Add friends</h4>
            </div>
        </div>
    </div>
    <div class="body-c2">
        <?php 
            $db = new PDO("mysql:host=localhost;dbname=facebook_g6db", 'root', '');
            // // $statement = $db->query("SELECT count(*) from posts;");
            // function allusers()
            // {
            //     global $db;
            //     $statement = $db->query("SELECT id FROM users;");
            //     $posts = $statement->fetchAll();
            //     echo $posts;
            //     return $posts;
        
            // }

            // echo allusers();
            
        ?>
        <script>
            let user =
         <?php 
            function allusers()
                {
                    global $db;
                    $statement = $db->query("SELECT id FROM users;");
                    $posts = $statement->fetchAll();
                    return $posts;
                    
                }
    
            allusers();
            ?>
            console.log(user);
        </script>
        <div class="card">
            <div class="card-left">
                <div class="img">
                    <img src="images/image-62296add80e539.04751305.jpg" width="5%">
                </div>
                <div class="userernme">
                    <h6>Pros Smos</h6>
                </div>
            </div>
            <div class="card-right">
                <button>Add</button>
                <button>Cancle</button>
            </div>
        </div>
    </div>
</body>
</html>

