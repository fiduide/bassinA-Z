<?php

$upload = 'err';
if(!empty($_FILES['file']) && !empty($_POST['titre'])){

    // File upload configuration
    $targetDir = "uploads/PDF/";
    $allowTypes = array('application/pdf');

    $fileName = basename($_FILES['file']['name']);
    $targetFilePath = $targetDir.$fileName;

    if(in_array($_FILES['file']['type'], $allowTypes)){
        // Upload file to the server
        if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){
            $dest = "uploads/PDF/img/".$_FILES['couverture']['name'];;

            move_uploaded_file($_FILES['couverture']['tmp_name'], $dest);
            $upload = 'ok';
            include "noView/bdd.php";
            $pdf = $_FILES['file']['name'];

                $couverture = $_FILES['couverture']['name'];
         
                $req = $bdd->prepare('INSERT INTO pdf (titre, img, pdf) VALUES(?, ?, ?)');
                $req->execute(array(htmlspecialchars($_POST['titre']), htmlspecialchars($couverture), htmlspecialchars($pdf)));
        }
    }
}
echo $upload;
?>