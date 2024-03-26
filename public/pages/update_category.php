<?php


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    
    $category = $_POST['category'];
    $category = filter_var($category, FILTER_SANITIZE_STRING);
    
    update('categories', ['category' => $category], ['id', $id]);

    flash('message', 'Categoria editada com sucesso!', 'success');
    return redirect('categories');
}
