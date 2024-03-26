<?php

require '../../bootstrap.php';

$format = $_GET['format'];
$format = filter_var($format, FILTER_SANITIZE_STRING);

$images = all('images', 'DESC');

ob_start();
if($format == 'images') {
    include 'formats/images.php';
}
else if($format == 'list') {
    include 'formats/list.php';
}

$includedContent = ob_get_clean();

echo $includedContent;
?>