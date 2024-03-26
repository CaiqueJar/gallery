<?php
    $categories = all('categories');
?>
<link rel="stylesheet" href="../assets/css/category.css">
<?= get('message') ?>
<main>
    <div class="content">
        <div class="wrapper-categories">
            <div class="top">
                <h1>Categorias</h1>
                <hr>
                <button id="create" class="btn btn-success">Cadastrar categoria</button>
            </div>
            <div class="cards">
                <?php foreach($categories as $category): ?>
                    <?php
                        $image = find('images', 'id_category', $category->id);
                        $image = $image->image ?? '../assets/imgs/notfound.png';

                        $count = counting('images', 'id_category', $category->id);
                    ?>
                    <div class="card">
                        <a href="?page=category_images&id=<?= $category->id ?>">
                            <p class="img-count"><i class="fa-solid fa-image"></i> <?= $count ?></p>
                            <div class="img-container">
                                <img src="../uploads/<?= $image ?>" alt="">
                            </div>
                            <div class="footer">
                                <span style="font-weight: 500;"><?= $category->category ?></span>
                                <div class="actions">
                                    <a href="" class="updt" data-id="<?= $category->id ?>" data-category="<?= $category->category ?>"><i class="fa-solid fa-pen"></i></a>
                                    <a href="" class="del" data-id="<?= $category->id ?>"><i class="fa-solid fa-trash"></i></a>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<!-- Create modal -->
<div class="modal modal-create">
    <div class="modal-content">
        <form action="?page=create_category" method="POST">
            <div class="header">
                <span>Criar nova categoria?</span>
                <span class="modal-close">X</span>
            </div>
            <div class="body">
                <div class="inputs">
                    <div class="input">
                        <label for="category">Nome da categoria: </label>
                        <input type="text" name="category" id="category">
                    </div>
                </div>
            </div>
            <div class="footer">
                <button class="btn btn-success" type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
</div>

<!-- Delete modal -->
<div class="modal modal-del">
    <div class="modal-content">
        <div class="header">
            <span>Deseja apagar esta categoria?</span>
            <span class="modal-close" id="close">X</span>
        </div>
        <div class="body">
            <p style="color: red;">Todas as imagens desta categoria serão <b>excluidas</b>!</p>
            <p>Esta ação tem efeito permanente!</p>
        </div>
        <div class="footer">
            <form action="?page=delete_category" method="POST">
                <input type="hidden" name="id" id="delId">
                <button class="btn btn-delete" type="submit">Excluir</button>
            </form>
        </div>
    </div>
</div>

<!-- Update modal -->
<div class="modal modal-updt">
    <div class="modal-content">
        <form action="?page=update_category" method="POST">
            <div class="header">
                <span>Editar categoria?</span>
                <span class="modal-close" id="close">X</span>
            </div>
            <div class="body">
                <div class="inputs">
                    <div class="input">
                        <label for="category">Nome da categoria: </label>
                        <input type="text" name="category" id="category-updt">
                    </div>
                </div>
            </div>
            <div class="footer">
                <input type="hidden" name="id" id="updtId">
                <button class="btn btn-success" type="submit">Editar</button>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    function modalCreate() {
        $('#create').on('click', function(e) {
            e.preventDefault();
            $('.modal-create').css('display', 'block');
        });
        
        $('.modal-close').on('click', function(e) {
            $('.modal').css('display', 'none');
        });
    }
    function modalDelete() {
        $('.del').on('click', function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id');
            $('.modal-del').css('display', 'block');
            $('#delId').val(id);
        });
        
        $('.modal-close').on('click', function(e) {
            $('.modal-del').css('display', 'none');
            $('#delId').val('');
        });
    }
    function modalUpdate() {
        $('.updt').on('click', function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id');
            let category = $(this).attr('data-category')
            
            $('.modal-updt').css('display', 'block');
            $('#updtId').val(id);
            $('#category-updt').val(category);
        })
    }
    $(document).ready(function() {

        modalCreate();
        modalDelete();
        modalUpdate();
    });
</script>
