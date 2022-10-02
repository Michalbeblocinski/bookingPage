<?php
session_start();

if (isset($_POST['email'])){
$email=filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
$name=filter_input(INPUT_POST,'name');
$lastname=filter_input(INPUT_POST,'lastname');
$date=filter_input(INPUT_POST,'date');
// checking date>today
$data = $date;
$obecna_data = date("Y-m-d");
$dni = (strtotime($data) - strtotime($obecna_data)) / (60*60*24);
if($dni<=0 ) {
    //bad date
    $minela=1;
}
else { 
    $minela=0;
}

$hour=filter_input(INPUT_POST,'time');
$hour2 = date('H:i:s ', strtotime($hour)-(3600));
$hour3 = date('H:i:s ', strtotime($hour)+(3600));

if(empty($email)){
    $_SESSION['given_email']=$_POST['email'];
    header('Location: view/index.php');
}
else{
    require_once 'database.php';
    //checking time
    $userQuery =$db->prepare('SELECT id FROM pomiary WHERE (date=:date AND (hourss >= :hour2 AND hourss <= :hour3 )) OR :minela =1');
    $userQuery->bindValue(':date',$date,PDO::PARAM_STR);  
    $userQuery->bindValue(':hour2',$hour2,PDO::PARAM_INT);  
    $userQuery->bindValue(':hour3',$hour3,PDO::PARAM_INT);
    $userQuery->bindValue(':minela',$minela,PDO::PARAM_INT);
    $userQuery->execute();
    $userQueryTab =  $userQuery->fetch();
    if($userQueryTab){
        $_SESSION['bad_time']=true;
        header('Location: view/index.php');
        exit();
    }else{

        $query =$db->prepare('INSERT INTO pomiary VALUES(NULL, :name, :lastname, :email, :date ,:hour)');
        $query->bindValue(':name',$name,PDO::PARAM_STR);
        $query->bindValue(':lastname',$lastname,PDO::PARAM_STR);
        $query->bindValue(':email',$email,PDO::PARAM_STR);
        $query->bindValue(':date',$date,PDO::PARAM_STR);  
        $query->bindValue(':hour',$hour,PDO::PARAM_INT);
        $query->execute(); 
    }
}
}else{
    header('Location: view/index.php');
    exit();
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
    <title>Wizyty</title>
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
                <p id="buttonHeader " class="bigFont ">Dziękujemy!</p>
                <p id="buttonHeader " class=" ">Pomyślnie wysłano.</p>
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