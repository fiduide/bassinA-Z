<?php
session_start();
if(!isset($_COOKIE['visited'])){
setcookie('visited', '0', (time() + 2*365*24*60*60), '/', '', false);
}

if(isset($_COOKIE['visited'])){
    if($_COOKIE['visited'] == 0){
        setcookie('visited', '1', (time() + 2*365*24*60*60), '/', '', false);
        include "noView/bdd.php";
        $addVisiteur = $bdd->query('UPDATE visite SET nb_visited = nb_visited + 1 WHERE visiteur = visiteur');
    }
}

include "header.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <META NAME="TITLE" CONTENT="Bassin A à Z">
    <META NAME="AUTHOR" CONTENT="Cappe Dorian">
    <META NAME="DESCRIPTION" CONTENT="Bienvenu sur bassin A à Z le tour de France de vos bassins  bassinaaz.fr est un site spécialisé dédié à votre passion : le bassin, les carpes koï et tout ce qui touche à cet univers. Retrouvez ici des conseils bassin, tutos, tests et des photos ou vidéos de vos bassins de jardin. Dijonnais (21) et passionné par l’univers des bassins, j’ai créé ce site afin de mettre à l’honneur les bassins d’autres passionnés de toute la France et du reste du monde.  Vous êtes amateur de bassin, venez nous rejoindre sur bassinaaz.fr, la chaîne Youtube, la page Facebook ou Instagram. Vous voulez faire connaître votre bassin, envoyez moi vos photos et vidéos. ">
    <META NAME="KEYWORDS" CONTENT="bassin, bassins, bassin, amateur, amateur bassin, bassin de jardin, vidéo bassin, conseil bassin, bassinAàZ">
    <META NAME="OWNER" CONTENT="Stéphane Cappe">
    <META NAME="ROBOTS" CONTENT="index,all">
    <META NAME="Reply-to" CONTENT="dorian161100@hotmail.fr">
    <META NAME="REVISIT-AFTER" CONTENT="15">

    <link rel="stylesheet" type="text/css" title="style" href="css/style_index.css"/>
    <link rel="stylesheet" type="text/css" title="style" href="css/style_all.css"/>
    <title>Accueil</title>
</head>
<body style="margin: 0%; padding: 0%;">

<div class="loader"></div>

<header>
    <div class="header">
        <img class ="header" src="assets/img/banniere4.png">
    </div>

    <nav class="navbar navbar-expand-lg navbar-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-item nav-link active" href="index.php"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door-fill mb-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
  <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
</svg> Accueil <span class="sr-only">(current)</span></a>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Envoyez vos bassins
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="sendVidPho.php">Videos</a>
                <a class="dropdown-item" href="sendPhoto.php">Photos</a>
            </div>
            </li>
            <a class="nav-item nav-link" href="vidPhoTu.php">Vidéos / Tutos / Tests</a>
            <?php
                if(isset($_SESSION['group'])){
                    if($_SESSION['group'] == 1){
            ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="photos.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Photos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="addPhotos.php">Ajouter un groupe de photos</a>
                            <a class="dropdown-item" href="photos.php">Photos</a>
                        </div>
                    </li>
            <?php }}else{?>
            <a class="nav-item nav-link" href="photos.php">Photos</a>
            <?php } ?>
            <a class="nav-item nav-link" href="fichesPDF.php">Fiches PDF</a>
            <a class="nav-item nav-link" href="contact.php">Contact</a>
            <?php
                if(isset($_SESSION['group'])){
                    if($_SESSION['group'] == 1){
            ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="photos.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admin Panel
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="gestionAdmin.php">Gestion <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
  <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
</svg></a>
                            <a class="nav-item nav-link" href="noView/deco.php">Se déconnecter</a>
                        </div>
                    </li>            <?php }}?>
            </div>
        </div>
    </nav>

</header>


<div class="container-fluid " id="home">
  <div class="row">
    <div class="col-sm-2">
        <div class="logo">
            <ul>
                <li><a href="https://www.youtube.com/channel/UCROhgOOKpe-egTV-FFkqAkg" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                <li><a href="https://www.facebook.com/letourdefrancedevosbassinsetjardins" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></a></i></li>
                <li><a href="https://www.instagram.com/tour_de_france_de_vos_bassins/" target="_blank"><i class="fa fa-instagram" aria-hidden="true" target="_blank"></a></i></li>
            </ul>
        </div>
    </div>
    <div class=" channel col-lg-8">
        <h1 class="titre1 text-center mt-3" style="color: blue;">Bassin A à Z - Le tour de France de vos bassins</h1>

        <div class="text-center">
            <a href="https://www.youtube.com/channel/UCROhgOOKpe-egTV-FFkqAkg" target="_blank">
                <video width="520" height="340" class="rounded" class="vid" controls loop autoplay="true">
                    <source src="assets/video/page accueil youtube.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </a>
        </div>
        <p class="titre1 text-center mt-3">Bienvenue sur <B style="color:blue;">bassin A à Z - le tour de France de vos bassins</B></p>

       
        <p class="titre2 mt-3 text-center h5">Dijonnais (21) et passionné par l’univers des bassins, j’ai créé ce site afin de mettre à l’honneur les bassins
        d’autres passionnés de toute la France et du monde.</p>
        <p class="mt-3 text-center h5">Conseils, tutos, vos bassins en vidéos... Une page Facebook et une chaîne Youtube dédiées à votre passion :
Bassin A à Z – le tour de France de vos bassins</p>
    </div>
    <div class="col-sm">
        <div class="text-center subcrib">
            <a href="https://www.youtube.com/channel/UCROhgOOKpe-egTV-FFkqAkg/?sub_confirmation=1" target="_blank"><img src="assets/img/sub.png"/></a>
        </div>
    </div>
  </div>
</div>
<a href="connexion.php" style="color: white;">.</a>
</body>


<script type="text/javascript" src="js/jquery.js"></script>
<script>
$(window).load(function() {
$(".loader").fadeOut("1000"); })
</script>
</html>