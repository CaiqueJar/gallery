<?php
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

    $image = find('images', 'id', $id);
?>
<link rel="stylesheet" href="../assets/css/upload.css">
<?= get('message') ?>
<main>
    <div class="content">
        <div class="wrapper-upload">
            <form action="?page=image_update" method="POST" class="upload" enctype="multipart/form-data">
                <input type="text" class="img-name" name="name" id="name" placeholder="Digite o nome da imagem" value="<?= $image->name ?>">
                <input type="hidden" name="id" value="<?= $image->id ?>">
                <img src="../uploads/<?= $image->image ?>" alt="">
                <hr>
                <div class="file">
                    <input type="file" name="images" id="image">
                </div>
                <button class="btn btn-success" type="submit">Enviar</button>
            </form>
        </div>
    </div>
</main>