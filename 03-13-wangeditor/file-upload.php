<?php

function json($data)
{
    header('Content-Type: application/json; charset=utf-8');
    exit(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
}

$file = $_FILES['wangeditor-uploaded-image'];

if ($file['error'] === UPLOAD_ERR_OK) {
    $basename = basename($file['name']);
    $path = "uploads/" . $basename;
    move_uploaded_file($file['tmp_name'], $path);
    json([
        "errno" => 0,
        "data" => [
            "url" => $path,
        ],
    ]);
}

json([
    "errno" => 1,
    "message" => '上传失败! error = ' . $file['error'],
]);