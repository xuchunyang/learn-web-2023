<?php

$file = $_FILES['file'];

if ($file['error'] === UPLOAD_ERR_OK) {
    move_uploaded_file($file['tmp_name'], "uploads/" . basename($file['name']));
}

/*
{
    "file": {
    "name": "docs@2x.ico",
    "full_path": "docs@2x.ico",
    "type": "image/vnd.microsoft.icon",
    "tmp_name": "/private/var/folders/gp/x3_055sj0vl7rdbtn2xd0fq80000gn/T/phpc9X3uI",
    "error": 0,
    "size": 3542
  }
}
*/

header('Content-Type: application/json; charset=utf-8');
exit(json_encode($_FILES));
