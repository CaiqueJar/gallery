<?php

$id = $_GET['id'];
$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

$image = find('images', 'id', $id);

$file = basename($image->image);
$file = __DIR__.'/../uploads/'.$file;

if(!file_exists($file)){ // file does not exist
    die('file not found');
} else {
    header('Content-Type: application/octet-stream');
    header('Content-Transfer-Encoding: Binary');
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));

    ob_clean();
    flush();
    
    // Read and output the file
    readfile($file);

    exit;
}
?>