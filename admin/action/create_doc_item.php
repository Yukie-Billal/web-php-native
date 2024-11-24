<?php

include __DIR__ . "/../services/func.php";
include __DIR__ . "/../services/http.php";
include __DIR__ . "/../services/upload_file.php";

setup_header();
validate_method("POST");

$data = $_POST;

if (!isset($_FILES["file"]) || !$_FILES['file']['name']) {
   create_response(null, "Wajib menyertakan gambar", 400, "file");
   return;
}

if (!$data['title']) {
   create_response(null, "Wajib menyertakan judul", 400, "title");
   return;
}
if (!$data['description']) {
   create_response(null, "Wajib menyertakan deskripsi", 400, "description");
   return;
}

$file = $_FILES["file"];

$file_path = upload_image($file, "assets/upload/documentations/");
if (!$file_path) {;
   create_response(null, "Gagal menyimpan file", 500, "file");;
   return;
}

$data['img_path'] = $file_path;
$result_query = create_doc_item($mysqli, $data);

if (!$result_query) {
   create_response(null, 'Gagal menyimpan data', 500, 'database error');
   return;
}

create_response($data, "success");