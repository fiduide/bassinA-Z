<?php
session_start();
include "header.php";
include "noView/bdd.php";

if(isset($_GET['id'])){
    $addVue = $bdd->query('UPDATE videouploaded SET vue = 1 WHERE id = '.$_GET['id'].'');
}

if(isset($_GET['idPhoto'])){
    $addVue = $bdd->query('UPDATE photouploaded SET vue = 1 WHERE id = '.$_GET['idPhoto'].'');
}

if(isset($_GET['id'])){

    $req = $bdd->query('SELECT id FROM videos WHERE front = 1 ');

    if($req->rowCount() != 0){

    $r = $req->fetch();

    $suppFront = $bdd->query('UPDATE videos SET front = 0 WHERE id = '.$r['id'].'');
    }

    $addFront = $bdd->query('UPDATE videos SET front = 1 WHERE id = '.$_GET['id'].'');

}



$video = 'SELECT  id, titre, genre, front FROM videos ORDER BY id DESC';

$videosParTab= 5; //Nous allons afficher 5 messages par page.

//Une connexion SQL doit être ouverte avant cette ligne...

$retour_total= $bdd->query('SELECT COUNT(*) AS total FROM videos');
 //Nous récupérons le contenu de la requête dans $retour_total
$donnees_total=$retour_total->fetch(); //On range retour sous la forme d'un tableau.
$total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.

//Nous allons maintenant compter le nombre de pages.
$nombreDePages=ceil($total/$videosParTab);

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

$premiereEntree=($pageActuelle-1)*$videosParTab; // On calcule la première entrée à lire

// La requête sql pour récupérer les messages de la page actuelle.
$retour_donnee=$bdd->query($video.' LIMIT '.$premiereEntree.', '.$videosParTab.'');
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" title="style" href="css/style_all.css"/>
    <link rel="shortcut icon" type="image/png" href="assets/img/logo test.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Administrateur</title>
</head>
<body>


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
            <a class="nav-item nav-link" href="fichesPDF.php">Fiches PDF</a>
            <a class="nav-item nav-link" href="contact.php">Contact</a>
            <?php
                if(isset($_SESSION['group'])){
                    if($_SESSION['group'] == 1){
            ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="photos.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

<div class="text-center">
<?php
$visited = $bdd->query('SELECT nb_visited FROM visite');
$visite= $visited->fetch();
echo '<h1 class="text-center mb-4">Nombre de visiteur : '.$visite['nb_visited'].'</h1> '
?>
</div>


<div class="row mt-3">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Vidéos Tutos Tests <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M6 12.796L11.481 8 6 3.204v9.592zm.659.753l5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
</svg></a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Groupe Photo <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-image" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14.002 2h-12a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zm-12-1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12z"/>
  <path d="M10.648 7.646a.5.5 0 0 1 .577-.093L15.002 9.5V14h-14v-2l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71z"/>
  <path fill-rule="evenodd" d="M4.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
</svg></a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="true">Vidéos Uploaded <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cloud-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
  <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z"/>
</svg></a>
      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="true">Photos Uploaded <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cloud-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
  <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z"/>
</svg></a>
<a class="nav-link" id="v-pills-pdf-tab" data-toggle="pill" href="#v-pills-pdf" role="tab" aria-controls="v-pills-pdf" aria-selected="true">PDF <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-richtext-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7 2l.5-2.5 3 3L10 5a1 1 0 0 1-1-1zM7 6.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm-.861 1.542l1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047l1.888.974V9.5a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V9s1.54-1.274 1.639-1.208zM5 11a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
</svg></a>
    </div>
  </div>
  <div class="col-9">
    <div class="tab-content" id="v-pills-tabContent">
    
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
      <table class="table table-hover">
                <thead>
                <tr>
                    <th>Titre</th>
                    <th>genre</th>
                    <th>Mise en avant</th>
                </tr>
                </thead>
                <tbody>
                <?php
                 while($donnee= $retour_donnee->fetch()) // On lit les entrées une à une grâce à une boucle
                 {
                    
                    echo '<tr>';
                        echo'<td>'.$donnee['titre'].'</td>';
                        echo'<td>'.$donnee['genre'].'</td>';
                        if($donnee['front'] == '0'){
                            echo'<td><a href="gestionAdmin.php?id='.($donnee['id']).'" class="btn btn-primary active">Mettre en avant</a><a href="noView/delVidparGet.php?id='.($donnee['id']).'" class="btn btn-danger">Supprimer</a></td>';
                        }else{
                            echo'<td><a  href="gestionAdmin.php?id='.($donnee['id']).'" class="btn btn-primary disabled">Mettre en avant</a><a href="noView/delVidparGet.php?id='.($donnee['id']).'" class="btn btn-danger">Supprimer</a></td>';
                        }
                    echo '</tr>';
                 }
                ?>
               
                </tbody>
                <?php
            if($retour_donnee->rowCount() != 0){

            echo '</div>';
            echo '<p align="center">'; //Pour l'affichage, on centre la liste des pages
            for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
            {
                //On va faire notre condition
                if($i==$pageActuelle) //S'il s'agit de la page actuelle...
                {
                    echo ' [ '.$i.' ] ';
                }

                else //Sinon...
                {
                    
                    echo '<a href="gestionAdmin.php?page='.$i.'">'.$i.'</a> ';
                    
                }
                
            }
            echo '</p>';
            }
            ?>

            </table>
      </div>

      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
      <?php
            $photoAll = $bdd->query('SELECT titre, couverture, id, description FROM photos ORDER BY id DESC');

      ?>
      <table class="table table-hover">
                <thead>
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                 while($photo= $photoAll->fetch()) // On lit les entrées une à une grâce à une boucle
                 {
                    echo '<tr>';
                        echo'<td>'.$photo['titre'].'</td>';
                        echo'<td>'.$photo['description'].'</td>';
                        echo'<td><a href="noView/delPhotoparGet.php?id='.($photo['id']).'" class="btn btn-danger">Supprimer</a></td>';
                    echo '</tr>';
                 }
                ?>
                </tbody>
            </table>
      </div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
      <?php
            $videoUploaded = $bdd->query('SELECT * FROM videouploaded');

      ?>
      <table class="table table-hover">
                <thead>
                <tr>
                    <th>Pseudo</th>
                    <th>Nom du fichier</th>
                    <th>Date d'envoie</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                 while($vidUp= $videoUploaded->fetch()) // On lit les entrées une à une grâce à une boucle
                 {
                    if($vidUp['vue'] == '1'){
                    echo '<tr style="color: #007BFF;">';
                    }
                    else{
                        echo '<tr>';
                    }
                        echo'<td>'.$vidUp['pseudo'].'</td>';
                        echo'<td>'.$vidUp['access'].'</td>';
                        echo'<td>'.$vidUp['Date'].'</td>';
                        echo '<form action="gestionAdmin.php?id='.($vidUp['id']).'" method="POST">';
                        echo'<td><a class="btn btn-primary" href="uploads/videos/'.$vidUp['access'].'/'.$vidUp['access'].'.zip" download>Télécharger</a><a href="noView/delVideoUploaded.php?id='.($vidUp['id']).'" class="btn btn-danger">Supprimer</a>';
                        if($vidUp['vue'] == '0'){
                        echo '<button type="submit" class="btn btn-success">Déjà vue</button>';
                        }else{
                            echo '<button type="submit" class="btn btn-success" disabled>Déjà vue</button>';
                        }
                        echo '</form></td>';
                    echo '</tr>';
                 }
                ?>
                </tbody>
            </table>
      </div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
      <?php
            $photouploaded = $bdd->query('SELECT * FROM photouploaded');

      ?>
      <table class="table table-hover">
                <thead>
                <tr>
                    <th>Pseudo</th>
                    <th>Nom du fichier</th>
                    <th>Date d'envoie</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                 while($phoUp= $photouploaded->fetch()) // On lit les entrées une à une grâce à une boucle
                 {
                    if($phoUp['vue'] == '1'){
                    echo '<tr style="color: #007BFF;">';
                    }
                    else{
                        echo '<tr>';
                    }
                        echo'<td>'.$phoUp['pseudo'].'</td>';
                        echo'<td>'.$phoUp['access'].'</td>';
                        echo'<td>'.$phoUp['Date'].'</td>';
                        echo '<form action="gestionAdmin.php?idPhoto='.($phoUp['id']).'" method="POST">';
                        echo'<td><a class="btn btn-primary" href="uploads/photos/'.$phoUp['access'].'/'.$phoUp['access'].'.zip" download>Télécharger</a><a href="noView/delPhotouploaded.php?id='.($phoUp['id']).'" class="btn btn-danger">Supprimer</a>';
                        if($phoUp['vue'] == '0'){
                        echo '<button type="submit" class="btn btn-success">Déjà vue</button>';
                        }else{
                            echo '<button type="submit" class="btn btn-success" disabled>Déjà vue</button>';
                        }
                        echo '</form></td>';
                    echo '</tr>';
                 }
                ?>
                </tbody>
            </table>
      </div>

      
      <div class="tab-pane fade" id="v-pills-pdf" role="tabpanel" aria-labelledby="v-pills-pdf-tab">
      <?php
            $pdf = $bdd->query('SELECT * FROM pdf ORDER BY id DESC');

      ?>
      <table class="table table-hover">
                <thead>
                <tr>
                    <th>Nom du PDF</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                 while($p = $pdf->fetch()) // On lit les entrées une à une grâce à une boucle
                 {
                        echo '<tr>';
                        echo'<td>'.$p['titre'].'</td>';
                        echo'<td><a href="noView/delPDFparGet.php?idPDF='.($p['id']).'" class="btn btn-danger">Supprimer</a></td>';
                    echo '</tr>';
                 }
                ?>
                </tbody>
            </table>
      </div>
    </div>
  </div>
</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/script.js"></script>
<script>


$(window).load(function() {
$(".loader").fadeOut("1000"); })
</script>

</html>