<?php

include __DIR__ . "/../services/func.php";

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
   header("location:../slides.php?status=405");
}


$file = $_FILES['file'];
if (!isset($_FILES['file']) || !$file['name']) {
   header("location:../slides.php?status=400&error=file");
   return;
}

$upload_path = "assets/upload/home_slides/";
$target_dir = __DIR__ . "/../../" . $upload_path;
$file_name = basename($file['name']);
$target_file = $target_dir . $file_name;
$image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


$check = getimagesize($file['tmp_name']);
if ($check === false) {
   header("location:../slides.php?status=400");
   return;
}

if (!in_array($image_file_type, ["jpg", "jpeg", "png", "gif"])) {
   header("location:../slides.php?status=400&error=file&message=Hanya file JPG, JPEG, PNG, dan GIF yang diizinkan.");
   return;
}

if (move_uploaded_file($file['tmp_name'], $target_file)) {
   $data['img_path'] = $upload_path . $file_name;
   insert_home_slide($mysqli, $data);
} else {
   header("location:../slides.php?status=400&message=Gagal menyimpan file");
   return;
}

header("location:../slides.php?status=200");