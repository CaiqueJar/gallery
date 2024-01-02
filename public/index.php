<?php 
    require "../bootstrap.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <div class="content">
            <div class="wrapper-header">
                <span class="logo"><a href="/">Sistema de galeria</a></span>
                <ul>
                    <li><a href="?page=categories">Categorias</a></li>
                    <li><a href="?page=categories">Aleatório</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container">
        <?php
        try {
            require load();
        } catch(Exception $e) {
            echo $e->getMessage();
        }
        ?>
    </div>
    <footer style="background: #262626;">
        <div class="content">
            <div class="wrapper-footer">
                <div class="icons">
                    <a href="https://github.com/CaiqueJar" target="_blank"><i class="fa-brands fa-github"></i></a>
                    <a href="https://www.instagram.com/eu.dias__/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/caique-dias-de-melo-1b28221a6/" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                </div>
                <p>Feito por Dias </p>
                <div class="copy">
                    <i>Dias &#169; 2023</i>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
