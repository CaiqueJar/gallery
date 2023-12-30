<?php
    $images = all('images');
?>
<link rel="stylesheet" href="../assets/css/home.css">
<main>
    <div class="content">
        <div class="wrapper-main">
            <div class="title">
                <h1>Galeria de imagens</h1>
                <hr>
                <p>Seja bem vindo a sua galeria de imagens. Comece adicionando suas imagens para vê-las abaixo.</p>
                <a href="?page=upload_image" class="btn btn-success">Enviar imagem</a>
            </div>
            <div class="images">
                <div class="options"></div>
                <div class="cards">
                    <?php foreach($images as $image): ?>
                        <div class="card">
                            <div class="card-img">
                                <img src="../uploads/<?= $image->image ?>" alt="">
                            </div>
                            <!-- <p class="card-title">img #1</p> -->
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>