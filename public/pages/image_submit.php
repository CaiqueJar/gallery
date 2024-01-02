<?php

$image = $_FILES['images'];
$uploadFolder = dirname(__DIR__) . "\\uploads\\";

$name = $_POST['name'];
$name = filter_var($name, FILTER_SANITIZE_STRING);

$category = $_POST['id_category'];
$category = filter_var($category, FILTER_SANITIZE_NUMBER_INT);

if(empty($image['tmp_name'])) {
    flash('message', 'Nenhuma imagem foi anexada!', 'error');
    return redirect('upload_image');
}

$checkIfExists = find('images', 'name', $name);

if(isset($checkIfExists->id)) {
    flash('message', 'Já existe uma imagem com este nome!', 'error');
    return redirect('upload_image');
}


$uniqueName = uniqid('image_') . "_" . $image['name'];
$pathImage = $uploadFolder . $uniqueName;

if (move_uploaded_file($_FILES["images"]["tmp_name"], $pathImage)) {
    create('images', ['image' => $uniqueName, 'name' => $name, 'id_category' => $category]);
    flash('message', 'Imagens enviadas com sucesso!', 'success');
    return redirect('home');
}


?>