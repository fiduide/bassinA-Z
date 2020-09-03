<?php
include "bdd.php";
include "../header.php";?>
<?php
if(!empty($_GET['id'])){

   

    $req = $bdd->prepare('DELETE FROM videos WHERE id = ?');
    $req->execute(array(htmlspecialchars($_GET['id'])));
    header("Location: ../gestionAdmin.php");
}