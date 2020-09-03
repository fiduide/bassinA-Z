<?php
include "bdd.php";
include "../header.php";?>
<?php
if(!empty($_GET['id'])){

    $req = $bdd->prepare('DELETE FROM videos WHERE id = ?');
    $req->execute(array(htmlspecialchars($_GET['id'])));

    echo '<div id="supp" class="alert alert-success mt-4 text-center" role="alert">';
    echo 'La vidéo a bien été supprimé (actualiser la page) !';
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
     echo    '<span aria-hidden="true">&times;</span>';
     echo '</button>';
    echo '</div>';
}else{
    echo '<div class="alert alert-danger mt-4 text-center" role="alert">';
    echo '<B>Erreur...</B> !';
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
     echo    '<span aria-hidden="true">&times;</span>';
     echo '</button>';
    echo '</div>';
}