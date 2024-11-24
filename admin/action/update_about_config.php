<?php

include __DIR__ . "/../services/func.php";
include __DIR__ . "/../services/http.php";

setup_header();

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
   create_response(null, "Method not allowed", 405);
   return;
}

if (!isset($_POST["id"])) {
   create_response(null, "id required", 400);
   return;
}

$id = $_POST["id"];

if (isset($_FILES["about_image_path"])) {
   $file = $_FILES['about_image_path'];
} else {
   $file = ["name" => "", "tmp_name" => ""];
}

$about_config = get_home_about_by_id($mysqli, $id);

if (!$about_config) {
   create_response(null, 'Not found', 404);
   return;
}

$db_save_file_path = $about_config['about_image_path'];
if ($file['name']) {
   $upload_path = "assets/upload/home_slides/";
   $target_dir = __DIR__ . "/../../" . $upload_path;
   $file_name = basename($file['name']);
   $target_file = $target_dir . $file_name;
   $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

   $result = move_uploaded_file($file['tmp_name'], $target_file);
   if ($result) {
      $db_save_file_path = $upload_path . $file_name;
   } else {
      create_response(null, "Gagal menyimpan file gambar", 400);
      return;
   }
}

$data = $_POST;
$data['about_image_path'] = $db_save_file_path;
$result = update_home_about($mysqli, $id, $data);
if (!$result) {
   create_response(null, "Gagal menyimpan perubahan", 400);
   return;
}

create_response(["id" => $id], "Berhasil mengubah", 200);