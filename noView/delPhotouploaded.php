<?php
include "bdd.php";
include "../header.php";?>
<?php

if(!empty($_GET['id'])){

    $suppV = $bdd->query('SELECT access FROM photouploaded WHERE id = "'.htmlspecialchars($_GET['id']).'"');

    $supp = $suppV->fetch();

    RepEfface('../uploads/photos/'.$supp['access']);

    $req = $bdd->prepare('DELETE FROM photouploaded WHERE id = ?');
    $req->execute(array(htmlspecialchars($_GET['id'])));

    header("Location: ../gestionAdmin.php");
}




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
