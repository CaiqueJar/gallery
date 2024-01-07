<?php

    if(!isset($_GET['id'])) {
        return redirect('categories');
    }

    $category = $_GET['id'];
    $category = filter_var($category, FILTER_SANITIZE_NUMBER_INT);

    $category = find('categories', 'id', $category);
    if(!isset($category->id)) {
        return redirect('categories');
    }

    $images = find('images', 'id_category', $category->id, 'all');
?>
<link rel="stylesheet" href="../assets/css/home.css">
<?= get('message') ?>
<main>
    <div class="content">
        <div class="wrapper-main">
            <div class="title">
                <h1>Imagens da categoria: <?= $category->category ?></h1>
                <hr>
            </div>
            <div class="images">
                <div class="display-format" id="format">
                    <div class="cards">
                        <?php if(empty($images)): ?>
                            <p>Ops! Parece que você não tem imagens :( Adicione algumas</p>
                        <?php endif; ?>
                        <?php foreach($images as $image): ?>
                            <div class="card">
                                <div class="img-container">
                                    <a href="?page=image&id=<?= $image->id ?>">
                                        <div class="overlay"></div>
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                        <img src="../uploads/<?= $image->image ?>" alt="">
                                    </a>
                                </div>
                                <div class="img-options">
                                    <p class="card-title"><?= $image->name ?></p>
                                    <div class="actions">
                                        <!-- <a href="#"><i class="fa-solid fa-share-nodes"></i></a> -->
                                        <a href="?page=update_image&id=<?= $image->id ?>"><i class="fa-solid fa-pen"></i></a>
                                        <a href="" class="del" data-id="<?= $image->id ?>"><i class="fa-solid fa-trash"></i></a>
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
<!-- Delete modal -->
<div class="modal modal-del">
    <div class="modal-content">
        <div class="header">
            <span>Deseja apagar esta image?</span>
            <span class="modal-close" id="close">X</span>
        </div>
        <div class="body">
            <p>Esta ação tem efeito permanente!</p>
        </div>
        <div class="footer">
            <form action="?page=delete-image" method="POST">
                <input type="hidden" name="id" id="delId">
                <button class="btn btn-delete" type="submit">Excluir</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    function modalDelete() {
        $('.del').on('click', function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id');
            $('.modal-del').css('display', 'block');
            $('#delId').val(id);
        });
        
        $('#close').on('click', function(e) {
            $('.modal-del').css('display', 'none');
            $('#delId').val('');
        });
    }
    $(document).ready(function() {

        modalDelete();

        $('.format').on('click', function() {
            let format = $(this).attr('id');
            $.ajax({
                type: "GET",
                url: "./pages/format.php",
                data: {format: format},
                success: function(res) {
                    $('#format').html(res);
                    modalDelete();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        $('#search').on('search', function() {
            if ($(this).val() === '') {
                $('#result').empty();
            }
        });
        $(document).on('click', function(event) {
            if (!$(event.target).is('.search') && !$(event.target).is('#result')) {
                $('#result').empty();
            }
        });
        $('#search').on('keyup click', function() {
            let search = $('#search').val();
            if ($(this).val() === '') {
                $('#result').empty();
            }
            $.ajax({
                type: "GET",
                url: "pages/search-itens.php",
                data: {search: search},
                success: function(res) {
                    if(res) {
                        result = JSON.parse(res);

                        $('#result').empty();
                        result.forEach(function(element) {
                            let tag = '<li><a href="?page=image&id='+ element['id'] +'"><p>'+ element['name'] +'</p></a></li>';
                            $('#result').append(tag);
                        });
                        if(result.length == 5) {
                            let all = '<li><a href="?page=image&name='+ search +'"><p style="font-weight:600">Ver todos</p></a></li>';
                            $('#result').append(all);
                        }
                        else if(result.length == 0) {
                            let all = '<li><p style="font-weight:600; padding: 6px">Nenhum resultado encontrado!</p></li>';
                            $('#result').append(all);
                        }
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
