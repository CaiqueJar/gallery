<?php

$id = $_POST['id'];
$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

$imageCount = counting('images', 'id_category', $id);

for($i = 0; $i < $imageCount; $i++) {
    
}

$image = all('images');

unlink('uploads/'.$image->image);

$del = delete('images', 'id', $id);

if($del) {
    flash('message', 'Imagem deletada com sucesso!', 'success');
    return redirect('home');
}

?>