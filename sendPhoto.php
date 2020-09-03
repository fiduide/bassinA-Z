<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" title="style" href="css/style_all.css"/>
    <link rel="stylesheet" type="text/css" title="style" href="css/style_sendVideo.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="assets/img/logo test.png" />
    <title>Envoyez vos bassins</title>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<div class="loader"></div>
<span id="send"></span>
<?php include "header.php";?>

<header>
    <div class="header">
        <img class ="header" src="assets/img/banniere5.png">
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
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    </li>            <?php }}?>
            </div>
        </div>
    </nav>

</header>


<div class="container bord mt-4 p-3 w-75">

<h1 class="titre1 text-center text-primary">Comment nous envoyer votre bassin ? </h1>

<h3 class="titre2 mt-3 text-danger"><B>1°) /!\ Favorisez les plans horizontaux</h3>


<p class="mt-3"><B><span class="text-danger">/!\ </span>Si votre fichier fait plus de 200Mo, utiliser le site<a href="https://wetransfer.com/" title="https://wetransfer.com/">WeTransfert</a> avec l'adresse mail : bassinaaz@gmail.com</B></p>

<h4 class="titre2 mt-3 text-danger text-center">Pensez à vérifier que tout est correcte sinon nous ne pourrons pas utiliser vos fichiers...</h4>

</div>



<div class="send container text-center mb-4 mt-4 ">

    <fieldset class="p-3 bord text-center">
    <form id="uploadForm" enctype="multipart/form-data">

<h1 class="titre1 text-primary">Envoyez votre bassin </h1>

<div class="test text-center">
    <div class="form-group">
        <label for="exampleInputEmail1">Nom, prénom ou "surnom" (*)</label>
        <input type="text" class="form-control" id="pseudo" name="pseudo">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Région, département, ville (*)</label>
        <input type="text" class="form-control" id="ville" name="ville">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Volume de votre bassin</label>
        <input type="text" class="form-control" id="volume" name="volume">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Commentaire</label>
        <textarea class="form-control" id="commentaire" name="commentaire" rows="3"></textarea>
    </div>
    <small>(*) obligatoire</small>
</div><br>

<table class="w-100 mt-3" id="myPara">
    <tr>
        <td>
            <button type="button" onclick="insertLastRow()" class="btn btn-outline-primary mb-2">[+] photos</button>
            <button type="button" onclick="deleteLastRow()" class="btn btn btn-outline-danger mb-2">[-] photos</button>
            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="mt-3">Photo n°1 (*) : </label>
                <input  id="fileInput" name="p1" type="file">
            </div>
        </td>
    </tr>
</table>
<div id=test></div>

<input id="submit_button" class="btn btn-primary mt-3" type="submit" value="Envoyer mon bassin"/>

<div class="progress mt-3">
<div class="progress-bar"></div>
</div>
<!-- Display upload status -->
<div id="uploadStatus"></div>
<div id="uploadStatus2"></div>


</form>

       
       

        </div>
        </div>

    </fieldset>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/script.js"></script>


<script>

$(window).load(function() {
$(".loader").fadeOut("1000"); })



    function insertLastRow(){
      var table = document.getElementById("myPara");
      if(table.rows.length == 10){
        document.getElementById('test').innerHTML =  '<div class="alert alert-warning" role="alert">'+
                '<strong>Vous avez atteint le nombre maximum de photos</strong>'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                    '<span aria-hidden="true">&times;</span>'+
                '</button>'+
                '</div>';

      }else{
        var nb_para = table.rows.length+1;
        var x = table.insertRow(table.rows.length);
        var cell1 = x.insertCell(0);
        cell1.innerHTML='<div class="form-group">'+
                                '<label for="exampleFormControlTextarea1">photo n°'+nb_para+ ' : </label>'+
                                '<input id="fileInput" name="p'+nb_para+'" type="file">'+
                            '</div>';
      }
    }

    function deleteLastRow(){
      var table = document.getElementById('myPara');
      if(table.rows.length != 1){
        table.deleteRow(table.rows.length-1);
      }
    }

    
    $(document).ready(function(){
    // File upload via Ajax
    $("#uploadForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);
                        $(".progress-bar").width(percentComplete + '%');
                        $(".progress-bar").html(percentComplete+'%');
                    }
                }, false);
                return xhr;
            },
            type: 'POST',
            url: 'uploadPhoto.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $(".progress-bar").width('0%');
                $('#uploadStatus').html('<img style="height: 10px; width: 200px;" src="assets/img/loader-21.gif"/>');
                $('#uploadStatus2').html('<small class="text-center">Veuillez patienter...</small>');
                
                
            },
            error:function(){
                $('.progress-bar').addClass('bg-danger progress-bar-striped');
                $('#uploadStatus').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
                $('#uploadStatus2').html('');
            },
            success: function(resp){
                if(resp == 'ok'){
                    $('#uploadForm')[0].reset();
                    $('#uploadStatus').html('<p style="color:#28A74B;">File has uploaded successfully!</p>');
                    $('.progress-bar').addClass('bg-success progress-bar-striped');
                    $('#uploadStatus2').html('');
                }else if(resp == 'err'){
                    $('.progress-bar').addClass('bg-danger progress-bar-striped');
                    $('#uploadStatus').html('<p style="color:#EA4335;">Please select a valid file to upload.</p>');
                    $('#uploadStatus2').html('');
                }
            }
        });
    });
	// File type validation
    $("#fileInput").change(function(){
        var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        var file = this.files[0];
        var fileType = file.type;
        if(!allowedTypes.includes(fileType)){
            alert('Please select a valid file (JPEG/JPG/PNG).');
            $("#fileInput").val('');
            return false;
        }
    });
});

</script>
</body>
</html>