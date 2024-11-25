<?php

include __DIR__ . "/../../services/func.php";
include __DIR__ . "/../../services/http.php";

setup_header();
validate_method("POST");

$data = $_POST;

if (!isset($data["id"]) || !$data["id"]) {
   create_response(null, "id wajib diisi", 400, "id");
   return;
}

if (!$data['mortalitas']) {
   create_response(null, 'mortalitas wajib diisi', 400, 'mortalitas');
   return;
}

if (!$data['body_weight']) {
   create_response(null, 'body_weight wajib diisi', 400, 'body_weight');
   return;
}

if (!$data['fcr']) {
   create_response(null, 'fcr wajib diisi', 400, 'fcr');
   return;
}

if (!$data['umur_panen']) {
   create_response(null, 'umur_panen wajib diisi', 400, 'umur_panen');
   return;
}

if (!$data['index_performance']) {
   create_response(null, 'index_performance wajib diisi', 400, 'index_performance');
   return;
}

$result_query = update_product_performance($mysqli, $data);
if (!$result_query) {
   create_response(null, "gagal menyimpan data", 500, "database");
   return;
}

create_response(null, "success");
