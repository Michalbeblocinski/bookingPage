<?php
session_start();
require_once '../database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./style4.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wizyty</title>
</head>

<body>
    <header>
        <a href="https://mebleks.pl/"> <img class="logo" src="./logo-mebleks.png" alt="logo"> </a>

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
        <!-- ALERTS-->
        <?php
       
        if(isset($_SESSION['given_email'])){
        echo <<<ZNACZIK
        <div style="text-align: center" class="alert  alert-dismissible fade show alert-danger">

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            <strong>bład</strong> zły email
        </div>
        ZNACZIK;}
        if(isset($_SESSION['bad_time'])){
            echo <<<ZNACZIK
            <div style="text-align: center" class="alert  alert-dismissible fade show alert-danger">
    
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    
                <strong>bład</strong> data zajęta lub Podana data mineła
            </div>
            
            ZNACZIK;
            unset($_SESSION['bad_time']);
        }
       ?>

        <div class="container text-center myButtonDiv">
            <div class="row ">
                <div class="col-sm-9 col-md-6 col-lg-6 ">
                    <div id="wholeDiv">
                        <p id="buttonHeader " class="bigFont">Chcesz umówić sie na darmowy pomiar?</p>
                        <p class="mediumFont">
                            <!-- MODAL-->
                            <!-- Button trigger modal -->
                            <button type="button" class="MyButton " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Zapisz sie!
                            </button>
                            <!-- Modal -->
                        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content ">
                                    <!--FORM-->
                                    <form action="../save.php " method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Zapisz się na darmowy pomiar
                                            </h5>
                                            <button type="button " class="btn-close " data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body ">
                                            <div class="container text-center ">
                                                <div class="row ">
                                                    <div class="col-12 mt-3">
                                                        <label>Podaj swoje imię: <input type="text" name="name"
                                                                class="form" required /></label>
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <label>Podaj swoje nazwisko: <input type="text" name="lastname"
                                                                class="form" required /></label>
                                                    </div>
                                                    <div class="col-12 mt-3">

                                                        <label>Podaj swój email: <input type="email" name="email"
                                                                class="form" required /></label>

                                                    </div>
                                                    <?php
                                                    if(isset($_SESSION['given_email'])){
                                                        echo'<div class="col-12 mt-3">To nie jest poprawny adres</div>';
                                                        unset($_SESSION['given_email']);
                                                    }
                                                    ?>
                                                    <div class="col-12 mt-3">
                                                        <label>
                                                            Podaj datę: <br>
                                                            <input type="date" name="date" class="form" required>
                                                        </label>
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <label>
                                                            Podaj godzinę:<br>
                                                            <input type="time" name="time" class="form" required>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class=" MyButton3" id="closeToast"
                                                data-bs-dismiss="modal">Zamknij</button>
                                            <button type="submit" id="submitButton" class=" MyButton3"
                                                name="submitBut">Zapisz</button>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                        </p>
                    </div>
                </div>
                <div class="col-sm-1 col-md-2 col-lg-2 "></div>
                <div class="col-sm-1 col-md-2 col-lg-2 "></div>
                <div class="col-sm-1 col-md-2 col-lg-2"></div>
            </div>
        </div>
        <!--Picture -->
        <div class="pic1">
            <img src="./pic1.png" alt="projekt kuchni">
        </div>
        <!--Picture - screen is small -->
        <div class="container text-center myButtonDiv2">
            <div class="row ">
                <div class="col-2 "></div>
                <div class="col-8 "><img src="./pic1.png" alt="projekt kuchni" width="100%" height="100%"></div>
                <div class="col-2 "></div>
            </div>
        </div>
        <!--SocialMedia-->
        <div class="social">
            <div class="SocialButtonDiv">
                <a href="https://www.facebook.com/mebleksRadomsko" target="_blank"> <img class="SocialButton"
                        src="./ins.png" alt="logo"> </a>
            </div>
            <div class="SocialButtonDiv">
                <a href="https://www.instagram.com/mebleks.pl/" target="_blank"> <img class="SocialButton"
                        src="./fb.png" alt="logo"> </a>
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