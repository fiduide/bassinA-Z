<?php
include "bdd.php";
include "../header.php";

if(!empty($_GET['id'])){

    $couverture = $bdd->query('SELECT couverture FROM photos WHERE id = "'.htmlspecialchars($_GET['id']).'"');

    $couv = $couverture->fetch();


    RepEfface('../uploads/GrpPhotos/'.$couv['couverture']);

    $req = $bdd->prepare('DELETE FROM photos WHERE id = ?');
    $req->execute(array(htmlspecialchars($_GET['id'])));

    echo '<div id="supp" class="alert alert-success text-center mb-0" style="margin-bottom: 0%;" role="alert">';
    echo 'Supprimé (actualiser)!';
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
     echo    '<span aria-hidden="true">&times;</span>';
     echo '</button>';
    echo '</div>';
}else{
    echo '<div class="alert alert-danger text-center" role="alert">';
    echo '<B>Erreur...</B> !';
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
     echo    '<span aria-hidden="true">&times;</span>';
     echo '</button>';
    echo '</div>';
}

?>

<?php


function RepEfface($dir)
{
$handle = opendir($dir);
while($elem = readdir($handle)) 
//ce while vide tous les repertoire et sous rep
{
    if(is_dir($dir.'/'.$elem) && substr($elem, -2, 2) !== '..' && substr(
$elem, -1, 1) !== '.') //si c'est un repertoire
    {
        RepEfface($dir.'/'.$elem);
    }
    else
    {
        if(substr($elem, -2, 2) !== '..' && substr($elem, -1, 1) !== '.')
        {
            unlink($dir.'/'.$elem);
        }
    }

}

$handle = opendir($dir);
while($elem = readdir($handle)) //ce while efface tous les dossiers
{
    if(is_dir($dir.'/'.$elem) && substr($elem, -2, 2) !== '..' && substr(
$elem, -1, 1) !== '.') //si c'est un repertoire
    {
        RepEfface($dir.'/'.$elem);
        rmdir($dir.'/'.$elem);
    }
}
rmdir($dir); //ce rmdir eface le repertoire principale
}


?>