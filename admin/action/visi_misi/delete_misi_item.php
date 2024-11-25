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

$item = get_misi_item_by_id($mysqli, $data["id"]);
if (!$item) {
   create_response(null, "misi tidak ditemukan", 404, "not found");
   return;
}

$result_query = delete_misi_item($mysqli, $data);
if (!$result_query) {
   create_response(null, "gagal menghapus data", 500, "database");
   return;
}

create_response($data, "success");
