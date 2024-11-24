<?php

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

function create_response_param(array $data): string
{
   $result = "?";
   foreach ($data as $key => $value) {
      $result .= $key ."=". urlencode($value) ."&";
   }
   return $result;
}

function setup_header() {
   header("Content-Type: application/json");
}

function validate_method(string $allowed): bool {
   if (strtolower($allowed) === strtolower($_SERVER["REQUEST_METHOD"])) {
      return true;
   }
   return false;
}