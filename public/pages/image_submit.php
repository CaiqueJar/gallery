<?php

$images = $_FILES['images'];
$uploadFolder = dirname(__DIR__) . "\\uploads\\";

if(!empty($images['tmp_name'] && array_filter($images['tmp_name']))) {
    foreach($images['name'] as $key => $image) {
        $uniqueName = uniqid('image_') . "_" . basename($image); // Example: image_5f82d1a3c4cd1_filename.jpg
        $pathImage = $uploadFolder . $uniqueName;

        if (move_uploaded_file($_FILES["images"]["tmp_name"][$key], $pathImage)) {
            create('images', ['image' => $uniqueName]);
            flash('message', 'Imagens enviadas com sucesso!', 'success');
            return redirect('home');
        }
        
    }
}
else {
    echo "Nenhuma imagem foi anexada!";
}

?>