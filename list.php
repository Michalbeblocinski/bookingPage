<?php
session_start();
require_once 'database.php';
if(!isset($_SESSION['logged_id'])){


    if(isset($_POST['login'])){

        $login=filter_input(INPUT_POST,'login');
        $password=filter_input(INPUT_POST,'pass');
       
        $userQuery2=$db->prepare('SELECT id,pass FROM admins WHERE login=:login');
        $userQuery2->bindValue(':login',$login,PDO::PARAM_STR);
        $userQuery2->execute();
        $user2 = $userQuery2->fetch();
        if($user2 && ($password==$user2['pass'])){
            $_SESSION['logged_id']=$user2['pass'];
            unset( $_SESSION['bad_attemtp2']);

        }else{
            $_SESSION['bad_attemtp2']=true;
            
            header('Location: admin.php');
            exit();
        }
    }
    else{
        header('Location: admin.php');
        exit();

    }
}
$usersQuery=$db->query('SELECT * FROM pomiary');
$users=$usersQuery->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./view/style4.css">
    <link rel="stylesheet" href="./view/css/bootstrap.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin list</title>
</head>
<body>
    <header>
        <a href="https://mebleks.pl/"> <img class="logo" src="./view/logo-mebleks.png" alt="logo"> </a>

        <nav>
            <ul class="nav_links">
                <li><a href="https://mebleks.pl/">
                        <div class="floor">Strona Głowna</div>
                    </a></li>

                <li><a href="https://mebleks.pl/kontakt/">
                        <div class="floor">Kontakt</div>
                    </a></li>
                <li><a href="./loguot.php">
                        <div class="floor">Wyloguj się!</div>
                    </a></li>
            </ul>
        </nav>
    </header>
    <main>
                     
    <div class="container text-center myButtonDiv">
            <div class="row ">
                <div class="col-sm-9 col-md-6 col-lg-6 ">
                    <table id="table1">
                        <thead>
                            <tr><th colspan="6">Liczba rekordów <?= $usersQuery->rowCount() ?></th></tr>
                            <tr><th>id</th><th>imie</th><th>nazwisko</th><th>email</th><th>data</th><th>godzina</th></tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($users as $user){
                                    echo"<tr><td>{$user['id']}</td><td>{$user['neme']}</td><td>{$user['lastname']}</td><td>{$user['email']}</td><td>{$user['date']}</td><td>{$user['hourss']}</td><tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                    
                
                </div>
            </div>
    </div>
        <!--Picture -->
        <div class="pic1">
            <img src="./view/pic1.png" alt="projekt kuchni">
        </div>
        <!--Picture - screen is small -->
        <div class="container text-center myButtonDiv2">
            <div class="row ">
                <div class="col-2 "></div>
                <div class="col-8 "><img src="./view/pic1.png" alt="projekt kuchni" width="100%" height="100%"></div>
                <div class="col-2 "></div>
            </div>
        </div>
        <!--SocialMedia-->
        <div class="social">
            <div class="SocialButtonDiv">
                <a href="https://www.facebook.com/mebleksRadomsko" target="_blank"> <img class="SocialButton"
                        src="./view/ins.png" alt="logo"> </a>
            </div>
            <div class="SocialButtonDiv">
                <a href="https://www.instagram.com/mebleks.pl/" target="_blank"> <img class="SocialButton"
                        src="./view/fb.png" alt="logo"> </a>
            </div>
        </div>
    </main>
    <footer>
    </footer>
    <script src="js/bootstrap.js">
    </script>
    <script src="script.js">
    </script>
</body>

</html>