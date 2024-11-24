<?php

include __DIR__ . "/../services/func.php";
include __DIR__ . "/../services/http.php";

setup_header();
validate_method("GET");

if (!isset($_GET['id']) || !$_GET['id']) {
   create_response(null,'id wajib diisi', 400, "id");
   return;
}

$id = $_GET['id'];
$service = get_home_service_item_by_id( $mysqli, $id );
if (!$service) {
   create_response(null,'not found',404, 'id');
   return;
}

create_response($service, 'success');