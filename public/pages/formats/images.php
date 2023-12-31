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