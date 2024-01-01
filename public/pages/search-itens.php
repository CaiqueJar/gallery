<?php

require "../../bootstrap.php";

$search = $_GET['search'];
$search = filter_var($search, FILTER_SANITIZE_STRING);

$images = like('images', 'name', $search);
$images = array_slice($images, 0, 5);

echo json_encode($images);