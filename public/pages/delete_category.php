<?php

$id = $_POST['id'];
$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

$imageCount = counting('images', 'id_category', $id);
for($i = 0; $i < $imageCount; $i++) {
    $image = find('images', 'id_category', $id);
    unlink('uploads/'.$image->image);

    delete('images', 'id', $image->id);
}

$del = delete('categories', 'id', $id);

if($del) {
    flash('message', 'Categoria deletada com sucesso!', 'success');
    return redirect('categories');
}

?>