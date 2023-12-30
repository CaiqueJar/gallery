<link rel="stylesheet" href="../assets/css/upload.css">
<main>
    <div class="content">
        <div class="wrapper-upload">
            <form action="?page=image_submit" method="POST" class="upload" enctype="multipart/form-data">
                <div class="drag" id="drop-zone" ondrop="handleDrop(event)" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)">
                    <i class="fa-solid fa-file-arrow-up"></i>
                    <p id="drag-text">Arraste e solte uma imagem</p>
                </div>
                <hr>
                <div class="file">
                    <p>Ou encontre sua imagem no computador</p>
                    <input type="file" name="images[]" id="image">
                </div>
                <button class="btn btn-success" type="submit">Enviar</button>
            </form>
            <ul class="uploaded-images" id="uploaded-images">

            </ul>
        </div>
    </div>
</main>
<script>
    function handleDragOver(event) {
        event.preventDefault();
        event.dataTransfer.dropEffect = 'copy';
        let dragText = document.getElementById('drag-text');
        dragText.textContent = "Soltar a imagem";
    }
    function handleDragLeave(event) {
        let dragText = document.getElementById('drag-text');
        dragText.textContent = "Arraste e solte uma imagem";
    }

    function handleDrop(event) {
        event.preventDefault();

        let dragText = document.getElementById('drag-text');
        dragText.textContent = "Envie a imagem";

        const files = event.dataTransfer.files;

        if (files.length > 0) {
            handleFiles(files);
        }
    }

    function handleFiles(files) {
        for (const file of files) {

            const newImage = document.createElement('li');
            newImage.id = "list-"+file.name;

            let textImage = document.createElement('span');
            textImage.textContent = file.name;

            let delImage = document.createElement('button');
            delImage.setAttribute('data-image-name', file.name);
            delImage.setAttribute('onclick', 'delImage(this);');
            delImage.textContent = "✖";

            newImage.appendChild(textImage);
            newImage.appendChild(delImage);

            const uploadedImages = document.getElementById('uploaded-images');
            uploadedImages.appendChild(newImage);

            const newInput = document.createElement('input');
            newInput.type = 'file';
            newInput.accept = 'image/*';
            newInput.name = 'images[]';
            newInput.id = "img-"+file.name;

            const newFileList = new DataTransfer();
            newFileList.items.add(file);
            newInput.files = newFileList.files;
            newInput.style.display = 'none';


            const dropZone = document.getElementById('drop-zone');
            dropZone.appendChild(newInput);

        }
    }
    function delImage(button) {
        let imgName = button.getAttribute('data-image-name');
        let input = document.getElementById('img-'+imgName);
        let list = document.getElementById('list-'+imgName);

        input.remove();
        list.remove();
    }
</script>