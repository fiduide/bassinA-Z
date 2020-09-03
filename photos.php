<?php
session_start();
include "header.php"; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" title="style" href="css/style_all.css"/>
    <link rel="stylesheet" type="text/css" title="style" href="css/style_photos.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="assets/img/logo 5 .png" />
    <title>Photos</title>
</head>
<body>

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
                            <a class="dropdown-item active" href="photos.php">Photos</a>
                        </div>
                    </li>
            <?php }}else{?>
            <a class="nav-item nav-link active" href="photos.php">Photos</a>
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
                    </li>
            <?php }}?>
            </div>
        </div>
    </nav>

</header>

</div id="ifram"  style="background: #EFEFEF; margin: 0%;">
<div class="container-fluid text-center">
<iframe id="result_frame" name="result_frame" style="background: #EFEFEF; margin: 0%;" height="12%" frameBorder="0" scrolling="no" ></iframe>
</div>

<div class="container">

<div class="d-flex flex-wrap justify-content-around">

<?php

include "noView/bdd.php";

$messagesParPage= 12; //Nous allons afficher 5 messages par page.
$photos = 'SELECT * FROM photos ORDER BY id DESC';
//Une connexion SQL doit être ouverte avant cette ligne...
$retour_total= $bdd->query('SELECT COUNT(*) AS total FROM photos'); //Nous récupérons le contenu de la requête dans $retour_total
$donnees_total=$retour_total->fetch(); //On range retour sous la forme d'un tableau.
$total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.

//Nous allons maintenant compter le nombre de pages.
$nombreDePages=ceil($total/$messagesParPage);

if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
{
     $pageActuelle=intval($_GET['page']);

     if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
     {
          $pageActuelle=$nombreDePages;
     }
}
else // Sinon
{
     $pageActuelle=1; // La page actuelle est la n°1
}

$premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcule la première entrée à lire

// La requête sql pour récupérer les messages de la page actuelle.
$retour_messages=$bdd->query($photos.' LIMIT '.$premiereEntree.', '.$messagesParPage.'');




while($couv = $retour_messages->fetch()){

    if(substr($couv['couverture'], 0, 2) == "2_"){
        $couver = substr($couv['couverture'], 2);
    }else{
        $couver = $couv['couverture'];
    }

?>
<a style="text-decoration: none;" href="allphotos.php?id=<?=($couv['id']) ?>">
    <div class="card mb-4" style="width: 18rem;">
        <img src="uploads/GrpPhotos/<?php echo $couv['couverture'].'/'.$couver; ?>" class="card-img" style="height: 240px" alt="image de bassin">
    <div class="card-body">

        <form action="noView/delphoto.php?id=<?= ($couv['id'])?>"  method="post"  enctype="multipart/form-data" target="result_frame">
            <p class="card-text" style="font-size: 14px"><?php echo $couv['titre'];?>
            <?php
            if(isset($_SESSION['group'])){
                if($_SESSION['group'] == 1){
        ?><button class=" ml-3 btn btn-outline-danger">X</button>   <?php }}?>
        </p>
            </form>
    </div>
    </div>
</a>

<?php }


if($retour_messages->rowCount() != 0){

    echo '</div>';
    echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
    for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
    {
         //On va faire notre condition
         if($i==$pageActuelle) //S'il s'agit de la page actuelle...
         {
             echo ' [ '.$i.' ] ';
         }
         else //Sinon...
         {
              echo ' <a href="photos.php?page='.$i.'">'.$i.'</a> ';
         }
    }
    echo '</p>';
    }?>


</div>

</div>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script>
$(window).load(function() {
$(".loader").fadeOut("1000"); })
</script>
</html>