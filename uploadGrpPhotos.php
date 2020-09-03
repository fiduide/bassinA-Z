<?php

$upload = 'err';
if(!empty($_FILES['p1']) && !empty($_POST['description']) && !empty($_FILES['couverture'])&& !empty($_POST['titre'])){

    $nomDest = $_FILES['couverture']['name'];

    
    // File upload configuration
    
    $allowTypes = array('image/jpeg', 'image/png', 'image/bmp', 'image/jpg');

    $fileName = basename($_FILES['p1']['name']);


            // Vérifie si le répertoire existe :
            if (file_exists('uploads/GrpPhotos/'.$nomDest)) {
                $longueur_key=6;
                $key= "";
                for($i=1;$i<$longueur_key;$i++){
                    $key.=mt_rand(0,9);
                }

                $nomDest = $_FILES['couverture']['name'].'_'.$key;
                mkdir('uploads/GrpPhotos/'.$nomDest , 0777);
                chmod('uploads/GrpPhotos/', 0777);
            }
        // Création du nouveau répertoire
        else {
            mkdir('uploads/GrpPhotos/'.$nomDest , 0777);
            chmod('uploads/GrpPhotos/', 0777);
        }

        $dest = "uploads/GrpPhotos/".$nomDest."/". $_FILES['couverture']['name'];
        
            move_uploaded_file($_FILES['couverture']['tmp_name'], $dest);

            $dix = 7;
            for($i=2; $i<$dix; $i++){

                if(isset($_FILES['p'.$i])){
                $source = $_FILES['p'.$i]['tmp_name'];

                $dest = "uploads/GrpPhotos/".$nomDest."/".$_FILES['p'.$i]['name'];
                move_uploaded_file($source, $dest);
                }
            }

            

    if(in_array($_FILES['p1']['type'], $allowTypes)){
        // Upload file to the server
        $dest = "uploads/GrpPhotos/".$nomDest."/". $fileName;

        if(move_uploaded_file($_FILES['p1']['tmp_name'], $dest)){

    $couverture = $nomDest;
    $p1 = $_FILES['p1']['name'];

    if(!isset($_FILES['p2'])){
        $p2 = NULL;
    }else{
        $p2 = $_FILES['p2']['name'];
    }
    if(!isset($_FILES['p3'])){
        $p3 = NULL;
    }else{
        $p3 = $_FILES['p3']['name'];
    }
    if(!isset($_FILES['p4'])){
        $p4 = NULL;
    }else{
        $p4 = $_FILES['p4']['name'];
    }
    if(!isset($_FILES['p5'])){
        $p5 = NULL;
    }else{
        $p5 = $_FILES['p5']['name'];
    }
    if(!isset($_FILES['p6'])){
        $p6 = NULL;
    }else{
        $p6 = $_FILES['p6']['name'];
    }

    include "noView/bdd.php";

    $req = $bdd->prepare('INSERT INTO photos (titre, description, couverture, p1, p2, p3, p4, p5, p6) VALUES(?,?, ?, ?, ?, ?, ?, ?, ?)');
    $req->execute(array(htmlspecialchars($_POST['titre']), htmlspecialchars($_POST['description']), htmlspecialchars($couverture), htmlspecialchars($p1),  htmlspecialchars($p2),  htmlspecialchars($p3),  htmlspecialchars($p4),  htmlspecialchars($p5),  htmlspecialchars($p6)));


            $upload = 'ok';
        }
    }
}
echo $upload;
?>