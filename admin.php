<?php
session_start();
if(isset($_SESSION['logged_id'])){
    header('Location: list.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./view/style4.css">
    <link rel="stylesheet" href="./view/css/bootstrap.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
            </ul>
        </nav>
    </header>
    <main>
    <div class="container text-center myButtonDiv">
            <div class="row ">
                <div class="col-sm-9 col-md-6 col-lg-6 ">
                    <form method ="post" action="list.php">
                        <label>Login: <input type ="text" name="login"></label>
                        <label>Hasło: <input type ="password" name="pass" id="pass"></label>
                        <input type="submit" value="Zaloguj się" class="m-3">
                        <?php
                         if(isset($_SESSION['bad_attemtp2'])){
                            echo '<p>Nieporpawny login lub hasło</p>';
                           
                            unset($_SESSION['bad_attemtp2']);
                           
                         }
                        ?>
                    </form>
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