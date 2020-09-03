<?php
session_start();
include "header.php";
include "noView/bdd.php";

$couverture = $bdd->query('SELECT * FROM photos WHERE id = "'.$_GET['id'].'"');


?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" title="style" href="css/style_all.css"/>
<link rel="stylesheet" type="text/css" title="style" href="css/style_allphotos.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" type="image/png" href="assets/img/logo 5 .png" />
<title>Photos</title>
</head>
<body>

<div class="loader"></div>


<header>
<div class="header">
<img class ="header" src="assets/img/banniere6.png">
</div>

<nav class="navbar navbar-expand-lg navbar-light">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    <a class="nav-item nav-link" href="index.php"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door-fill mb-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
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
                <a class="nav-link dropdown-toggle active" href="photos.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

<div class="container">
    <div class="text-center">
        <h1 class="text-center text-primary mt-3">Cliquez sur les photos pour les voir en taille réelle </h1>
        <a href="photos.php"><button type="button" class="btn btn-outline-primary mb-2">Retour</button></a>
    </div>

<div class="d-flex justify-content-center flex-wrap">

    <?php
        $couv = $couverture->fetch();

        if(substr($couv['couverture'], 0, 2) == "2_"){
            $couver = substr($couv['couverture'], 2);
        }else{
            $couver = $couv['couverture'];
        }

    ?>

<a href="uploads/GrpPhotos/<?php echo $couv['couverture'].'/'.$couv['p1']; ?>" title="clique pour voir en taille réelle" target="_blank">
<div class=" taille" style="width: 18rem;">
    <img src="uploads/GrpPhotos/<?php echo $couv['couverture'].'/'.$couv['p1']; ?>" class="d-block w-100" alt="...">
</div>
</a>

<?php if(!empty($couv['p2'])){?>
<a href="uploads/GrpPhotos/<?php echo $couv['couverture'].'/'.$couv['p2']; ?>" title="clique pour voir en taille réelle" target="_blank">
    <div class=" taille" style="width: 18rem;">
        <img src="uploads/GrpPhotos/<?php echo $couv['couverture'].'/'.$couv['p2']; ?>" class="d-block w-100" alt="...">
    </div>
</a>
<?php }?>

<?php if(!empty($couv['p3'])){?>
<a href="uploads/GrpPhotos/<?php echo $couv['couverture'].'/'.$couv['p3']; ?>" title="clique pour voir en taille réelle" target="_blank">
    <div class=" taille" style="width: 18rem;">
        <img src="uploads/GrpPhotos/<?php echo $couv['couverture'].'/'.$couv['p3']; ?>" class="d-block w-100" alt="...">
    </div>
</a>
<?php }?>

<?php if(!empty($couv['p4'])){?>
<a href="uploads/GrpPhotos/<?php echo $couv['couverture'].'/'.$couv['p4']; ?>" title="clique pour voir en taille réelle" target="_blank">
    <div class=" taille" style="width: 18rem;">
        <img src="uploads/GrpPhotos/<?php echo $couv['couverture'].'/'.$couv['p4']; ?>" class="d-block w-100" alt="...">
    </div>
</a>
<?php }?>

<?php if(!empty($couv['p5'])){?>
<a href="uploads/GrpPhotos/<?php echo $couv['couverture'].'/'.$couv['p5']; ?>" title="clique pour voir en taille réelle" target="_blank">
    <div class=" taille" style="width: 18rem;">
        <img src="uploads/GrpPhotos/<?php echo $couv['couverture'].'/'.$couv['p5']; ?>" class="d-block w-100" alt="...">
    </div>
</a>
<?php }?>

<?php if(!empty($couv['p6'])){?>
<a href="uploads/GrpPhotos/<?php echo $couv['couverture'].'/'.$couv['p6']; ?>" title="clique pour voir en taille réelle" target="_blank">
    <div class="taille" style="width: 18rem;">
        <img src="uploads/GrpPhotos/<?php echo $couv['couverture'].'/'.$couv['p6']; ?>" class="d-block w-100" alt="...">
    </div>
</a>
<?php }?>

</div>
</div>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script>
$(window).load(function() {
$(".loader").fadeOut("1000"); })
</script>
</html>