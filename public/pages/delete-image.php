<?php

$id = $_POST['id'];
$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

$image = find('images', 'id', $id);

unlink('uploads/'.$image->image);

$del = delete('images', 'id', $id);

if($del) {
    flash('message', 'Imagem deletada com sucesso!', 'success');
    return redirect('home');
}

?>