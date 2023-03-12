<?php

$file = $_FILES['filepond'];

if ($file['error'] === UPLOAD_ERR_OK) {
    $basename = basename($file['name']);
    $path = "uploads/" . $basename;
    move_uploaded_file($file['tmp_name'], $path);
    exit($basename);
}