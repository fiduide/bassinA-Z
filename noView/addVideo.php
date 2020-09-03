<?php
include "bdd.php";
include "../header.php";?>
<?php
if(!empty($_POST['titre']) && !empty($_POST['genre']) && !empty($_POST['url'])){


        $url = $_POST['url'];
        $egals = '=';
        $ul = strstr($url, $egals);


    $req = $bdd->prepare('INSERT INTO videos (titre, genre, descrip, url) VALUES(?, ?, ?, ?)');
    $req->execute(array(htmlspecialchars($_POST['titre']), htmlspecialchars($_POST['genre']), htmlspecialchars($_POST['descrip']),  htmlspecialchars($ul)));

    echo '<div class="alert alert-success mt-4 text-center" role="alert">';
    echo 'La vidéo <B>'.$_POST['titre'].' </B> a bien été ajouté ! (actualiser la page)';
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

?>