<?php

include __DIR__ . "/../services/func.php";
include __DIR__ . "/../services/http.php";

setup_header();
validate_method("POST");

$data = $_POST;
$file = null;

if (isset($_FILES["file"])) {
   $file = $_FILES["file"];
}

$file_path = upload_image($file, "assets/upload/home_service/");
if (!$file_path) {;
   create_response(null, "Gagal menyimpan file", 500, "file");;
   return;
}

$data['icon_path'] = $file_path;
$result_insert = create_home_service_item($mysqli, $data);

if (!$result_insert) {
   create_response(null, 'Gagal mwnyimpan data', 500, 'database error');
   return;
}

create_response($data, "success");