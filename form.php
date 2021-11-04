<?php

if($_SERVER['REQUEST_METHOD'] === "POST"){ 

    $uploadDir = '/';
    $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $authorizedExtensions = ['jpg','jpeg','png', 'gif', 'webp'];
    $maxFileSize = 1000000;
 
if( (!in_array($extension, $authorizedExtensions))){
        $errors[] = 'Veuillez sélectionner une image de type Jpg ou Jpeg ou Png ou Gif ou Webp !';
    }

if( file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize)
    {
    $errors[] = "Votre fichier doit faire moins de 1M !";
    }

$fileTmpName = $_FILES['avatar']['tmp_name'];
if( file_exists($fileTmpName) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize)
    {
    $errors[] = "Votre fichier doit faire moins de 1M !";
    }

if (!isset($errors)){
        $fileNewName = uniqid('avatar', true) . '.' . $extension;
        move_uploaded_file($_FILES['avatar']['tmp_name'], $fileNewName);
}}

?>

<form method="post" enctype="multipart/form-data">
    <div>
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name">
    </div>

    <div>
    <label for="firstname">Prénom:</label>
    <input type="text" id="firstname" name="firstname">
    </div>

    <div>
    <label for="age">Age:</label>
    <input type="number" id="age" name="age">
    </div>
    
    <div>
    <label for="imageUpload">Ajouter une image:</label>    
    <input type="file" name="avatar" id="imageUpload" />

    <button name="send">Send</button>
    </div>
</form>
