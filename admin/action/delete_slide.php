<?php

include __DIR__ . "/../services/func.php";
include __DIR__ . "/../services/http.php";

setup_header();
validate_method("POST");

if (!isset($_POST["id"]) || !$_POST['id']) {
   create_response(null,  "Id wajib diisi", 400, null);
   return;
}

$id = $_POST['id'];
$result = delete_home_slide($mysqli, $id);
if (!$result) {
   create_response(null, 'Gagal menghapus slide', 400, $result);
   return;
}

create_response(["id" => $id], 'Bmessage: erhasil menghapus slide', 200, null);