<?php

function upload_image($file, $upload_path="assets/upload/", $file_name=null): string {
   $upload_path = "assets/upload/home_slides/";
   $target_dir = __DIR__ . "/../../" . $upload_path;
   $file_name = $file_name ?? basename($file['name']);
   $target_file = $target_dir . $file_name;
   // $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
   
   if (move_uploaded_file($file['tmp_name'], $target_file)) {
      return $upload_path. $file_name;
   }
   return "";
}
