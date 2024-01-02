<?php

$id = $_POST['id'];
$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

$name = $_POST['name'];
$name = filter_var($name, FILTER_SANITIZE_STRING);

$uploadFolder = dirname(__DIR__) . "\\uploads\\";


$find = find('images', 'id', $id);

$exists = find('images', 'name', $name);

if($exists != false && $find->id != $exists->id) {
    flash('message', 'Nome de imagem já existe!', 'danger');
    return redirect('home');
}

$image = $_FILES['images'];


if(file_exists($image['tmp_name'])) {
    unlink('uploads/'.$find->image);

    $uniqueName = uniqid('image_') . "_" . $image['name'];
    $pathImage = $uploadFolder . $uniqueName;

    if (move_uploaded_file($_FILES["images"]["tmp_name"], $pathImage)) {
        update('images', ['image' => $uniqueName, 'name' => $name], ['id', $id]);
    }
}
else {
    update('images', ['name' => $name], ['id', $id]);
}

flash('message', 'Alteração realizada com sucesso!', 'success');
return redirect('home');