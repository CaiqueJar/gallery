<?php

$images = $_FILES['images'];
$uploadFolder = dirname(__DIR__) . "\\uploads\\";

$name = $_POST['name'];
$name = filter_var($name, FILTER_SANITIZE_STRING);

if(empty($images['tmp_name'])) {
    flash('message', 'Nenhuma imagem foi anexada!', 'error');
    return redirect('upload_image');
}

$checkIfExists = find('images', 'name', $name);

if(isset($checkIfExists->id)) {
    flash('message', 'Já existe uma imagem com este nome!', 'error');
    return redirect('upload_image');
}


$uniqueName = uniqid('image_') . "_" . basename($image);
$pathImage = $uploadFolder . $uniqueName;

if (move_uploaded_file($_FILES["images"]["tmp_name"], $pathImage)) {
    create('images', ['image' => $uniqueName, 'name' => $name]);
    flash('message', 'Imagens enviadas com sucesso!', 'success');
    return redirect('home');
}


?>