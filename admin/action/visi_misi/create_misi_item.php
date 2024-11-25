<?php

include __DIR__ . "/../../services/func.php";
include __DIR__ . "/../../services/http.php";

setup_header();
validate_method("POST");

$data = $_POST;

if (!isset($data["order_number"]) || !$data["order_number"]) {
   create_response(null, "nomor urut wajib diisi", 400, "order_number");
   return;
}

if (!isset($data["misi"]) || !$data["misi"]) {
   create_response(null, "nomor urut wajib diisi", 400, "misi");
   return;
}

$result_query = create_misi_item($mysqli, $data);
if (!$result_query) {
   create_response(null, "gagal menyimpan data", 500, "database");
   return;
}

create_response($data, "success");