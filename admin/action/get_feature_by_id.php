<?php

include __DIR__ ."/../services/func.php";
include __DIR__ ."/../services/http.php";

setup_header();

if ($_SERVER["REQUEST_METHOD"] !== "GET") {
   create_response(null, "Method not allowed", 405);
   return;
}

$id = $_GET['id'];

if (!$id) {
   create_response(null, 'Id required', 400);
   return;
}

$data = get_home_feature_by_id($mysqli, $id);
create_response($data);