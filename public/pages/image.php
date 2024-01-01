<?php
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

    $image = find('images', 'id', $id);
?>
<link rel="stylesheet" href="../assets/css/image.css">
<main>
    <div class="content">
        <div class="top">
            <a href="?page=home" class="back"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
        </div>
        <div class="wrapper-img">
            <div class="img-container">
                <img src="../uploads/<?= $image->image ?>" alt="">
            </div>
            <div class="text">
                <h1><?= $image->name ?></h1>
            </div>
        </div>
    </div>
</main>