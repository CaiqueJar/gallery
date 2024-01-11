<?php

$images = all('images');
$random = random_int(0, count($images)-1);

$image = $images[$random];

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