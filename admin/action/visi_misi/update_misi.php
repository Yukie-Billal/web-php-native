<?php

include __DIR__ . "/../../services/func.php";
include __DIR__ . "/../../services/http.php";

setup_header();
validate_method("POST");

$data = $_POST;

$data['misi'] = isset($data['misi']) ? $data['misi'] : null;

if (!isset($data["id"]) && !$data["id"]) {
   create_response(null, "id wajib diisi", 400, "id");
   return;
}

if (!$data['misi_title']) {
   create_response(null, 'judul misi wajib diisi', 400, 'misi_title');
   return;
}

$result_query = update_misi($mysqli, $data);
if (!$result_query) {
   create_response(null, "gagal menyimpan data", 500, "database");
   return;
}

create_response(null, "success");