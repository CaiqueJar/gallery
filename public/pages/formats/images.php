<div class="cards">
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