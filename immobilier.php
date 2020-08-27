<?php
//http://victoriachaour.epizy.com/immobilier.php

$bdd = new PDO('mysql:host=sql203.epizy.com;dbname=epiz_25935030_logement','epiz_25935030','h90cTbc49EfyRW', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8" ) );
//$bdd = new PDO('mysql:host=localhost;dbname=immobilier','root','', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8" ) );

var_dump($bdd);

$error = '';
$content = '';

if( isset($_POST) && !empty($_POST) ){

    foreach($_POST as $key => $value){
        $_POST[$key] = htmlentities( addslashes( $value ));
        //print '<pre>';
        //    print_r( $_POST );
        //print '</pre>';
    }

    // champs obligatoire
    if( empty($_POST['titre']) ){
        $error .= "Le titre est obligatoire<br>";
    }

    if( empty($_POST['adresse']) ){
        $error .= "L'adresse est obligatoire<br>";
    }

    if( empty($_POST['ville']) ){
        $error .= "La ville est obligatoire<br>";
    }

    if( empty($_POST['cp']) ){
        $error .= "Le code postal est obligatoire<br>";
    }

    if( empty($_POST['prix']) ){
        $error .= "Le prix est obligatoire<br>";
    }

    if( empty($_POST['type']) ){
        $error .= "Le type de logement est obligatoire<br>";
    }

    // vérification du code postal et de sa longuer et si c'est un chiffre 
    if( $_POST['cp']){

        if( strlen($_POST['cp']) != 5){
            $error .= 'Le code postal rentrée doit contenir 5 chiffres<br>';
        }
        if( !is_numeric($_POST['cp']) ){
            $error .= 'Vous devez renseigner des nombres pour le code postal<br>';
        }

    }

    // vérification de prix 
    if( $_POST['prix']){

        if( !is_numeric($_POST['prix']) ){
            $error .= 'Vous devez renseigner des nombres pour le prix<br>';
        }

        if( !ctype_digit($_POST['prix'])){
            $error .= 'Le prix doit être un nombre entier<br>';
        }

    }

    // vérification de la surface 
    if( $_POST['surface']){

        if( !is_numeric($_POST['surface']) ){
            $error .= 'Vous devez renseigner des nombres pour la surface<br>';
        }
    
        if( !ctype_digit($_POST['surface'])){
            $error .= 'La surface doit être un nombre entier<br>';
        }
    
    }

    print '<pre>';
	 	print_r( $_FILES );
	print '</pre>';




    if( !empty($_FILES['photo']['name'])){

        // modification extention
        $information_photo = pathinfo( $_FILES['photo']['name']);

        $extension = $information_photo['extension'];

        $extension_autorisee = array('jpg', 'jpeg', 'png');

        if( !in_array($extension, $extension_autorisee)){
            $error .= 'L\'extention du fichier n\'est pas valide. Veuillez uploader un fichier .jpg, .jpeg ou .png.<br>';
        }

        

    }

    if( empty($error)){

        if( !empty($_FILES['photo']['name'])){
            // modification du nom de la photo
            $nom_photo = $_FILES['photo']['name'] . $_POST['titre'] . '_' . time();
            //var_dump($nom_photo);

            // chemin vers la photo dans bdd
            //define('URL', 'http://localhost/PhPCours/examen_php/');
            define('URL', 'http://epiz_25935030/htdocs/');

            $photo_bdd = URL . "photo/$nom_photo";
            //$chemin_photo_bdd = "http://localhost/PhPCours/examen_php/photo/$nom_photo";

            // enregistrement photo
            //$dossier_photo = $_SERVER['DOCUMENT_ROOT'] . "/PhPCours/examen_php/photo/$nom_photo";
            $dossier_photo = $_SERVER['DOCUMENT_ROOT'] . "/htdocs/photo/$nom_photo";

            //$dossier_photo = "C:/xampp/htdocs/PhPCours/examen_php/photo/$nom_photo";

            // enregistrement de la photo dans le dossier serveur
            copy($_FILES['photo']['tmp_name'], $dossier_photo);
            //debug($_SERVER);
            //debug($_FILES);
        }

        $bdd->query(" INSERT INTO logement(titre, adresse, ville, cp, surface, prix, photo, type, description) 
                    VALUES(
                        '$_POST[titre]',
                        '$_POST[adresse]',
                        '$_POST[ville]',
                        '$_POST[cp]',
                        '$_POST[surface]',
                        '$_POST[prix]',
                        '$photo_bdd',
                        '$_POST[type]',
                        '$_POST[description]'
                    ) ");

    }



}



// Affichage




$affichage = $bdd->query(" SELECT * FROM logement ");

$content .= '<table border="1" cellpadding="5">';

    $content .= '<tr>';
        for( $i = 0 ; $i < $affichage->columnCount(); $i++){
            $colonne = $affichage->getColumnMeta( $i );
            //print '<pre>';
			//     	print_r( $colonne );
			//print '</pre>';
            $content .= "<th>$colonne[name]</th>";
        }

    $content .= '</tr>';
    while( $ligne = $affichage->fetch(PDO::FETCH_ASSOC)){
        $content .= '<tr>';
            //print '<pre>';
			//     	print_r( $ligne );
            //print '</pre>';
            foreach($ligne as $key => $value){
                if($key == 'photo'){
                    $content .= "<td><img src='$value' width='80'></td>";
                } else{

                    if($key == 'titre' && $key == 'adresse' && $key == 'ville' && $key == 'cp' && $key == 'surface' && $key == 'description'){

                        if(strlen($value) > 50){

                            $content .= "<td>" . substr($value, 0, 50) . "...</td>";
                        } else{

                            $content .= "<td>$value</td>";

                        }

                    } else{
                        $content .= "<td>$value</td>";
                    }

                }

            }

        $content .= '</tr>';

    }


$content .= '</table>';



?>

<h1>Inscription des biens de l'agence</h1>

<div style="background-color:red; color:white; margin:auto;"><?= $error ?></div>
<div style="width:80;"><?= $content ?></div>

<form method="post" enctype="multipart/form-data">
	
	<label>Titre</label><br>
	<input type="text" name="titre"><br><br>
	
	<label>Adresse</label><br>
	<input type="text" name="adresse"><br><br>

	<label>Ville</label><br>
	<input type="text" name="ville"><br><br>
	
	<label>Code postal</label><br>
	<input type="text" name="cp"><br><br>

    <label>Surface</label><br>
	<input type="text" name="surface"><br><br>

    <label>Prix</label><br>
	<input type="text" name="prix"><br><br>

	<label>Photo</label><br>
	<input type="file" name="photo"><br><br>

    <label>Type</label><br>
	<input type="radio" name="type" value="location">Location<br>
	<input type="radio" name="type" value="vente">Vente<br><br>

	<label>Description</label><br>
	<textarea name="description"></textarea><br><br>

	<input type="submit" value="Rentrée le logement">

</form>


