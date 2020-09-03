<?php
session_start();
include "header.php"; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" title="style" href="css/style_fiche.css"/>
    <link rel="stylesheet" type="text/css" title="style" href="css/style_all.css"/>
    <link rel="shortcut icon" type="image/png" href="assets/img/logo test.png" />
    <title>Fiches PDF</title>
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
            <a class="nav-item nav-link active" href="fichesPDF.php">Fiches PDF</a>
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

<?php
                if(isset($_SESSION['group'])){
                    if($_SESSION['group'] == 1){
            ?>

<div class="container">
<div class="test text-center mt-3 border p-3 rounded-lg">
    <legend class="h2 text-center text-primary">Ajouter un fichier PDF</legend>

    <form id="uploadForm" enctype="multipart/form-data">
        
        <div class="form-group text-center">
            <label>Choisir un PDF (*) : </label>
            <input type="file" name="file" id="fileInput"><br><br>
        
            <label>Choisir une image de couverture:</label>
            <input type="file" name="couverture" id="couverture"><br><br>
        
        <label for="exampleFormControlInput1">Titre (*)</label>
            <input type="text" class="form-control" style="width:50%; margin-left: auto; margin-right:auto;" id="titre" name="titre">
        </div>

        <input class="btn btn-outline-primary" type="submit" name="submit" value="UPLOAD"/>
    </form>

    <div class="progress">
        <div class="progress-bar"></div>
    </div>
    <!-- Display upload status -->
    <div id="uploadStatus"></div>
    <div id="uploadStatus2"></div>


</div>
</div>

                    <?php }}?>

<div class="container">

<form action="fichesPDF.php" method="post">
  <div class="test form-group text-center mt-3">
    <input type="text" class="form-control w-50 mr-auto ml-auto" id="choix" name="choix">
    <button type="submit" class="btn btn-outline-primary mt-3">Rechercher</button>
  </div>

<div class="d-flex flex-wrap justify-content-around mt-5 mb-5">

<?php

include "noView/bdd.php";

$messagesParPage= 9; //Nous allons afficher 5 messages par page.

$PDF = 'SELECT * FROM pdf ORDER BY id DESC';

if(isset($_POST['choix'])){
    $PDF = 'SELECT * FROM pdf WHERE titre LIKE "%'.$_POST['choix'].'%"';
}
//Une connexion SQL doit être ouverte avant cette ligne...
$retour_total= $bdd->query('SELECT COUNT(*) AS total FROM pdf'); //Nous récupérons le contenu de la requête dans $retour_total
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
$retour_messages=$bdd->query($PDF.' LIMIT '.$premiereEntree.', '.$messagesParPage.'');




while($PDF = $retour_messages->fetch()){



?>
<a href="uploads/PDF/<?php echo $PDF['pdf']; ?>" target="_blank">
    <div class="d-flex flex-column mb-3 p-3">
        <?php if($PDF['img'] != ""){?>
            <span class="text-center">
                <img src="uploads/PDF/img/<?php echo $PDF['img'];?>" style="width: 175px; height:225px;"/>
            </span>
        <?php }else { ?>
            <span class="text-center">
                <img src="uploads/PDF/img/default.png" style="width: 225px; height:200px;"/>
            </span>
        <?php } ?>
        <h1 class="text-center mt-2 text-info" style="font-size: 20px;"><?php echo $PDF['titre'];?></h1>
    </div>
</a>
<?php }


if($retour_messages->rowCount() != 0){

    echo '</div>';
    echo '<p align="center" class="page-item">Page : '; //Pour l'affichage, on centre la liste des pages
    for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
    {
         //On va faire notre condition
         if($i==$pageActuelle) //S'il s'agit de la page actuelle...
         {
             echo ' [ '.$i.' ] ';
         }
         else //Sinon...
         {
              echo ' <a href="fichesPDF.php?page='.$i.'">'.$i.'</a> ';
         }
    }
    echo '</p>';
    }?>


</div>

</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script>
$(window).load(function() {
$(".loader").fadeOut("1000"); })

$(document).ready(function(){
    // File upload via Ajax
    $("#uploadForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);
                        $(".progress-bar").width(percentComplete + '%');
                        $(".progress-bar").html(percentComplete+'%');
                    }
                }, false);
                return xhr;
            },
            type: 'POST',
            url: 'uploadPDF.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $(".progress-bar").width('0%');
                $('#uploadStatus').html('<img style="height: 10px; width: 200px;" src="assets/img/loader-21.gif"/>');
                $('#uploadStatus2').html('<small class="text-center">Veuillez patienter...</small>');
                
            },
            error:function(){
                $('.progress-bar').addClass('bg-danger progress-bar-striped');
                $('#uploadStatus2').html('');
                $('#uploadStatus').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
            },
            success: function(resp){
                if(resp == 'ok'){
                    $('#uploadForm')[0].reset();
                    $('#uploadStatus').html('<p style="color:#28A74B;">File has uploaded successfully!</p>');
                    $('.progress-bar').addClass('bg-success progress-bar-striped');
                    $('#uploadStatus2').html('');
                }else if(resp == 'err'){
                    $('.progress-bar').addClass('bg-danger');
                    $('#uploadStatus2').html('');
                    $('#uploadStatus').html('<p style="color:#EA4335;">Please select a valid file to upload.</p>');
                }
            }
        });
    });
	
    // File type validation
    $("#fileInput").change(function(){
        var allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        var file = this.files[0];
        var fileType = file.type;
        if(!allowedTypes.includes(fileType)){
            alert('Please select a valid file (PDF/DOC/DOCX/JPEG/JPG/PNG/GIF).');
            $("#fileInput").val('');
            return false;
        }
    });

});


</script>
</html>