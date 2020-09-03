<?php

$upload = 'err';
if(!empty($_FILES['file']) && !empty($_POST['pseudo']) && !empty($_POST['ville'])){
    // File upload configuration
    $targetDir = "uploads/videos/";
    $allowTypes = array('video/mp4', 'video/mov', 'video/mpeg');

    $fileName = basename($_FILES['file']['name']);

    $nomDest = $_POST['pseudo'].'_'.$_POST['ville'];

            // Vérifie si le répertoire existe :
            if (file_exists('uploads/videos/'.$nomDest)) {
                $longueur_key=6;
                $key= "";
                for($i=1;$i<$longueur_key;$i++){
                    $key.=mt_rand(0,9);
                }

                $nomDest = $_POST['pseudo'].'_'.$_POST['ville'].'_'.$key;
                mkdir('uploads/videos/'.$nomDest , 0777);
                chmod('uploads/videos/', 0777);
            }
        // Création du nouveau répertoire
        else {
            mkdir('uploads/videos/'.$nomDest , 0777);
            chmod('uploads/videos/', 0777);
        }

        $zip = new ZipArchive();
            $Create = "uploads/videos/".$nomDest."/".$nomDest.".zip";

            if ($zip->open($Create, ZipArchive::CREATE)!==TRUE) {
                exit("Impossible d'ouvrir le fichier <$Create>\n");
            }

            $dix = 11;
            $photo = array('image/jpeg', 'image/png', 'image/jpg', 'image/gif');
            for($i=1; $i<$dix; $i++){
                if(isset($_FILES['p'.$i])){
                    if(in_array($_FILES['p'.$i]['type'], $photo)){

                        $source = $_FILES['p'.$i]['tmp_name'];

                        $dest = "uploads/videos/".$nomDest."/".$_FILES['p'.$i]['name'];

                        if(move_uploaded_file($source, $dest)){
                            $zip->addFile('uploads/videos/'.$nomDest.'/'.$_FILES['p'.$i]['name'] , $_FILES['p'.$i]['name']);
                        }

                    }
            }
        }

            $dest = "uploads/videos/".$nomDest."/". $fileName;

    if(in_array($_FILES['file']['type'], $allowTypes)){
        // Upload file to the server
        if(move_uploaded_file($_FILES['file']['tmp_name'], $dest)){
            file_put_contents('uploads/videos/'.$nomDest.'/Recap.txt', 'Récapitulatif :');
            file_put_contents('uploads/videos/'.$nomDest.'/Recap.txt', "\n Nom ou Pseudo : ".$_POST['pseudo']."", FILE_APPEND);
            file_put_contents('uploads/videos/'.$nomDest.'/Recap.txt', "\n Région, Ville, département : ".$_POST['ville']."", FILE_APPEND);
            file_put_contents('uploads/videos/'.$nomDest.'/Recap.txt', "\n Volume du bassins : ".$_POST['volume']."", FILE_APPEND);
            file_put_contents('uploads/videos/'.$nomDest.'/Recap.txt', "\n Commentaire : ".$_POST['commentaire']."", FILE_APPEND);

            include "noView/bdd.php";




            $zip->addFile('uploads/videos/'.$nomDest.'/Recap.txt', 'Recap.txt');
            $zip->addFile('uploads/videos/'.$nomDest.'/'.$_FILES['file']['name'], $_FILES['file']['name']);

            $zip->close();

            $addInBDD = $bdd->prepare('INSERT INTO videouploaded (access, pseudo, Date) VALUES(?,?, NOW())');
            $addInBDD->execute(array(htmlspecialchars($nomDest), htmlspecialchars($_POST['pseudo'])));

            $upload = 'ok';
        }
    }
}
echo $upload;
?>