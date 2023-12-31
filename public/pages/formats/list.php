<ul class="list-format">
    <?php foreach($images as $image): ?>
        <li>
            <div class="list-img">
                <div class="img-container">
                    <a href="">
                        <div class="overlay"></div>
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <img src="../uploads/<?= $image->image ?>" alt="">
                    </a>
                </div>
                <div class="list-text">
                    <p><?= $image->name ?></p>
                    <div class="actions">
                        <!-- <a href="#"><i class="fa-solid fa-share-nodes"></i></a> -->
                        <a href=""><i class="fa-solid fa-pen"></i></a>
                        <a href=""><i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
</ul>