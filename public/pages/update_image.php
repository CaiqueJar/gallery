<?php
    $categories = all('categories');
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

    $image = find('images', 'id', $id);
?>
<link rel="stylesheet" href="../assets/css/upload.css">
<?= get('message') ?>
<main>
    <div class="content">
        <div class="wrapper-upload">
            <form action="?page=image_update" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $image->id ?>">
                <div class="inputs">
                    <div class="input">
                        <label for="name">Nome da imagem:</label>
                        <input type="text" class="img-name" name="name" id="name" value="<?= $image->name ?>" placeholder="Digite o nome da imagem">
                    </div>
                    <div class="input">
                        <label for="id_category">Selecione uma categoria: </label>
                        <select name="id_category" id="id_category">
                            <?php foreach($categories as $category): ?>
                                <option value="<?= $category->id ?>"><?= $category->category ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="drag-container">
                    <div class="drag">
                        <img src="../uploads/<?= $image->image ?>" alt="">
                    </div>
                    <hr>
                    <div class="file">
                        <p>Ou encontre sua imagem no computador</p>
                        <input type="file" name="images" id="image">
                    </div>
                    <button class="btn btn-success" type="submit">Enviar</button>
                </div>
            </form>
            <ul class="uploaded-images" id="uploaded-images">

            </ul>
        </div>
    </div>
</main>