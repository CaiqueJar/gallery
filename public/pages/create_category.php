<?php

$category = $_POST['category'];
$category = filter_var($category, FILTER_SANITIZE_STRING);

$create = create('categories', ['category' => $category]);
if($create) {
    flash('message', 'Categoria cadastrada com sucesso', 'success');
    return redirect('categories');
}