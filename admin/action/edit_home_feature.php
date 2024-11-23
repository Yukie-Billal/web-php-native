<?php

include __DIR__ . "/../services/func.php";
include __DIR__ . "/../services/http.php";

$view_file = "../home_feature.php";

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
   header("location:$view_file?status=405");
}

// validation
$file = $_FILES['file'];
$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];

if (!isset($id) || !$id) {
   header("location:$view_file?status=400&error=id");
   return;
}

if (!isset($title) || !$title) {
   header("location:$view_file?status=400&error=title");
   return;
}
if (!isset($description) || !$description) {
   header("location:$view_file?status=400&error=description");
   return;
}

if (isset($_FILES['file']) && $file['name']) {
   $upload_path = "assets/upload/home_feature/";
   $target_dir = __DIR__ . "/../../" . $upload_path;
   $file_name = basename($file['name']);
   $target_file = $target_dir . $file_name;
   $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

   if (!in_array($image_file_type, ["jpg", "jpeg", "png", "gif", "svg"])) {
      header("location:$view_file?status=400&error=file&message=Hanya file JPG, JPEG, PNG, GIF, dan SVG yang diizinkan.");
      return;
   }
   
   if (!move_uploaded_file($file['tmp_name'], $target_file)) {
      header("location:$view_file?status=400&error=file&message=Gagal menyimpan file.");
      return;
   }
}

$feature = get_home_feature_by_id($mysqli, $id);
if (!$feature) {
   header("location:$view_file?status=404");
   return;
}

$data['icon_path'] = $file['name'] ? $upload_path . $file_name : $feature['icon_path'];
$data['title'] = $title;
$data['description'] = $description;
$result = update_home_feature($mysqli, $id, $data);
if ($result === false) {
   header("location:$view_file" . create_response_param(["status" => 400, "message" => "Data tidak ditemukan"]));
}

header("location:$view_file?status=200");
