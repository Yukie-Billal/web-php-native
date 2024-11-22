<?php

include __DIR__ . "/../services/func.php";

header("Content-Type: application/json");

function create_response(mixed $data, string $message = "", int $status = 200, $error = null)
{
   $response = [
      "data" => $data,
      "message" => $message,
      "error" => $error
   ];
   http_response_code($status);
   echo json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
   http_response_code(405);
   return;
}

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