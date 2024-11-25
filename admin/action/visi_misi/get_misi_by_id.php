<?php

include __DIR__ . "/../../services/func.php";
include __DIR__ . "/../../services/http.php";

setup_header();
validate_method("GET");

$data = $_GET;

if (!isset($data["id"]) || !$data["id"]) {
   create_response(null, "id wajib diisi", 400, "id");
   return;
}

$item = get_misi_item_by_id($mysqli, $data["id"]);
if (!$item) {
   create_response(null, "misi tidak ditemukan", 404, "not found");
   return;
}

create_response($item, "success");
