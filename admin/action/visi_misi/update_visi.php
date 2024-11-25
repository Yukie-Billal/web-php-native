<?php

include __DIR__ . "/../../services/func.php";
include __DIR__ . "/../../services/http.php";

setup_header();
validate_method("POST");

$data = $_POST;

if (!isset($data["id"]) && !$data["id"]) {
   create_response(null, "id wajib diisi", 400, "id");
   return;
}

if (!$data['visi_title']) {
   create_response(null, 'judul visi wajib diisi', 400, 'visi_title');
   return;
}
if (!$data['visi']) {
   create_response(null, 'visi wajib diisi', 400, 'visi');
   return;
}

$result_query = update_visi($mysqli, $data);
if (!$result_query) {
   create_response(null, "gagal menyimpan data", 500, "database");
   return;
}

create_response(null, "success");