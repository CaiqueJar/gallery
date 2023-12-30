<?php

function dd($dump) {
    echo "<pre>";
    var_dump($dump);
    echo "</pre>";
    die();
}

function redirect($page) {
    return header("Location:/?page={$page}");
}