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
</head>
<body>
    <header>
        <div class="content">
            <div class="wrapper-header">
                <span>Sistema de galeria</span>
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
                <p>Feito com muito <span style="color: #d94343;">❤</span> por Dias </p>
                <div class="copy">
                    <i>Dias &#169; 2023</i>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
