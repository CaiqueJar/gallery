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
                <div class="options">
                    <div class="search">
                        <input type="text" placeholder="Digite o nome da imagem">
                    </div>
                    <div class="display-options">
                        <button class="format" id="images"><i class="fa-solid fa-image"></i></button>
                        <button class="format" id="list"><i class="fa-solid fa-list"></i></button>
                    </div>
                </div>
                <div class="display-format" id="format">
                    <div class="cards">
                        <?php foreach($images as $image): ?>
                            <div class="card">
                                <div class="card-img">
                                    <img src="../uploads/<?= $image->image ?>" alt="">
                                </div>
                                <div class="img-options">
                                    <p class="card-title"><?= $image->name ?></p>
                                    <div class="actions">
                                        <!-- <a href="#"><i class="fa-solid fa-share-nodes"></i></a> -->
                                        <a href=""><i class="fa-solid fa-pen"></i></a>
                                        <a href=""><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $('.format').on('click', function() {
        let format = $(this).attr('id');
        $.ajax({
            type: "GET",
            url: "./pages/format.php",
            data: {format: format},
            success: function(res) {
                $('#format').html(res);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
</script>
