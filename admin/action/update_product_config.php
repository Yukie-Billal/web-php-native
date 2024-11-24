<?php

include __DIR__ . "/../services/func.php";
include __DIR__ . "/../services/http.php";

setup_header();
validate_method("POST");

$data = $_POST;

if (!isset($data['id']) && !$data['id']) {
   create_response(null, "", 400, "id required");
   return;
}

$result = update_product_config($mysqli, $data);
if (!$result) {
   create_response(null, 'Gagal menyimpan data', 500,'');
   return;
}

create_response($data, "success");