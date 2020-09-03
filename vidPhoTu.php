<?php
session_start();
include "header.php";
include "noView/bdd.php";

if(isset($_GET['choix'])){



	$video = 'SELECT id, titre, genre, url,  CONCAT(SUBSTRING_INDEX(descrip," ",20), "...") AS descript FROM videos WHERE genre = "'.$_GET['choix'].'" ORDER BY id DESC';


}else {


    $video = 'SELECT  id, titre, genre, url,  CONCAT(SUBSTRING_INDEX(descrip," ",20), "...") AS descript FROM videos ORDER BY id DESC';


}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" title="style" href="css/style_videosTuTes.css"/>
    <link rel="stylesheet" type="text/css" title="style" href="css/style_all.css"/>
    <title>Vidéos / Tutos / Tests</title>
</head>
<body>
<div class="loader"></div>
</header>

<div id="header" class="header">
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
            <a class="nav-item nav-link active" href="vidPhoTu.php">Vidéos / Tutos / Tests</a>
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
                    </li>
            
            <?php }}?>
            </div>
        </div>
    </nav>

</header>

<?php
    if(isset($_SESSION['group'])){
        if($_SESSION['group'] == 1){
?>

</div id="ifram">
<div class="container-fluid text-center">
<iframe id="result_frame" name="result_frame" style="border: none;" width="50%" height="12%" frameBorder="0" scrolling="no" ></iframe>
</div>

<div class="test mt-4 border p-3 rounded-lg">
    <legend class="h2 text-center text-primary">Ajouter une vidéo</legend>
    <form action="noView/addVideo.php" method="post"  enctype="multipart/form-data" target="result_frame">
        <div class="form-group">
            <label for="exampleFormControlInput1">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">URL de la vidéo</label>
            <input type="text" class="form-control" id="url" name="url">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Genre</label>
            <select class="form-control" id="genre" name="genre">
            <option>Vidéos</option>
            <option>Vidéos 4K</option>
            <option>Tutos</option>
            <option>Tests</option>
            <option>Épisodes</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="descrip" name="descrip" rows="3"></textarea>
        </div>
        <button  class="btn btn-primary">Ajouter</button>
    </form>
</div>



<?php }} ?>

<?php

$frontVid = $bdd->query('SELECT id, titre, genre, url,  CONCAT(SUBSTRING_INDEX(descrip," ",20), "...") AS descript FROM videos WHERE front = 1');

$front = $frontVid->fetch();


if(!empty($front['url'])){
    $ul = $front['url'];
    $replace = str_replace("=", "", $ul);

?>
<div class="vids">
<h1 class="h1Lemon  text-primary text-center m-2">Vidéo à la une</h1>

    <div class="front card mb-3 vid">
        <embed src="https://www.youtube.com/embed/<?php echo $replace;?>" allowfullscreen="true" class="vidminS">

        <div class="card-body">
            <h5 class="card-title h1Lemon"><?php echo $front['titre'];?></h5>
            <p class="card-text fontext"><?php echo $front['descript'];?></p>
            <div class="text-center">
                <a href="https://www.youtube.com/watch?v<?php echo $front['url'];?>" target="_blank" class="btn btn-primary">Regarder</a>
                <?php
                if(isset($_SESSION['group'])){
                    if($_SESSION['group'] == 1){
            ?>
                <form action="noView/delvid.php?id=<?= ($front['id'])?>"  method="post"  enctype="multipart/form-data" target="result_frame">
                    <button  class="btn btn-danger mt-3">Supprimer</button>
                </form>
                <?php }}?>
            </div>
        </div>
    </div>


<?php }?>

</div>


<ul class="nav justify-content-center mb-5 mt-3 h4">
  <li class="nav-item">
    <a class="nav-link active" href="vidPhoTu.php">Toutes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="vidPhoTu.php?choix=Vidéos">Videos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="vidPhoTu.php?choix=Vidéos 4K">Videos 4K</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="vidPhoTu.php?choix=Tutos">Tutos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="vidPhoTu.php?choix=Tests">Tests</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="vidPhoTu.php?choix=Épisodes">Épisodes</a>
  </li>
</ul>



<div class="container d-flex flex-wrap justify-content-around mb-3">
<?php
$messagesParPage= 6; //Nous allons afficher 5 messages par page.
 
//Une connexion SQL doit être ouverte avant cette ligne...
if(isset($_GET['choix'])){
    $retour_total= $bdd->query('SELECT COUNT(*) AS total FROM videos WHERE genre = "'.$_GET['choix'].'"');
}else{
$retour_total= $bdd->query('SELECT COUNT(*) AS total FROM videos');
} //Nous récupérons le contenu de la requête dans $retour_total
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
$retour_messages=$bdd->query($video.' LIMIT '.$premiereEntree.', '.$messagesParPage.'');

while($donnees_messages= $retour_messages->fetch()) // On lit les entrées une à une grâce à une boucle
{

if(!empty($donnees_messages['url'])){
    $ul = $donnees_messages['url'];
    $replace = str_replace("=", "", $ul);

?>

    <div class="card cards mb-3">

    <embed src="https://www.youtube.com/embed/<?php echo $replace;?>" allowfullscreen="true" width="319" height="250">

      <div class="card-body">
        <h5 class="card-title h1Lemon"><?php echo $donnees_messages['titre'];?></h5>
        <p class="card-text fontext"><?php echo $donnees_messages['descript'];?></p>
        <div class="text-center">
        <a href="https://www.youtube.com/watch?v<?php echo $donnees_messages['url'];?>" target="_blank" class="btn btn-primary">Regarder</a>
        <?php
        if(isset($_SESSION['group'])){
            if($_SESSION['group'] == 1){
    ?>
        <form action="noView/delvid.php?id=<?= ($donnees_messages['id'])?>"  method="post"  enctype="multipart/form-data" target="result_frame">
            <button  class="btn btn-danger mt-3">Supprimer</button>
        </form>
            <?php }}?>
        </div>
      </div>
    </div>

            <?php }?>
<?php
}

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
         if(isset($_GET['choix'])){
            echo ' <a href="vidPhoTu.php?choix='.$_GET['choix'].'&page='.$i.'">'.$i.'</a> ';
         }else{
        echo ' <a href="vidPhoTu.php?page='.$i.'">'.$i.'</a> ';
         }
     }
    
}
echo '</p>';
}
?>
        <script src="js/script.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
<script>
$(window).load(function() {
$(".loader").fadeOut("1000"); })
</script>
</body>
</html>