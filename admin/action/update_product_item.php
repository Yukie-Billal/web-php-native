<?php

include __DIR__ . "/../services/func.php";
include __DIR__ . "/../services/http.php";
include __DIR__ . "/../services/upload_file.php";

setup_header();
validate_method("POST");

$data = $_POST;
$file = null;

if (isset($_FILES["file"]) && !$_FILES['file']['name']) {
   $file = $_FILES["file"];
}

if (!$data['id']) {
   create_response(null, "Id wajib diisi", 400, "id");
   return;
}
if (!$data['title']) {
   create_response(null, "judul wajib diisi", 400, "title");
   return;
}
if (!$data['description']) {
   create_response(null, "deskripsi wajib diisi", 400, "description");
   return;
}

$product = get_product_item_by_id($mysqli, $data["id"]);

$file_path = $product['img_path'];
if ($file) {
   if ($uploaded_path !== $file_path) {
      $uploaded_path = upload_image($file, "assets/upload/home_service/");
      if (!$uploaded_path) {;
         create_response(null, "Gagal menyimpan file", 500, "file");;
         return;
      }
      delete_file($file_path);
      $file_path = $upload_path;
   }
}

$data['img_path'] = $file_path;
$result_query = update_product_item($mysqli, $data);
if (!$result_query) {
   create_response(null, 'Gagal mwnyimpan data', 500, 'database error');
   return;
}

create_response($product, "success");