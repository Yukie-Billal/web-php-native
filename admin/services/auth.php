<?php

include __DIR__ . "/../../variabel.php";
$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
   die("Connection failed: " . $mysqli->connect_error);
}

session_start();

function check_auth()
{
   if (!isset($_SESSION["auth"]) && !$_SESSION["auth"]) {
      return false;
   } else {
      return true;
   }
}

function signin($mysqli, $data)
{
   $username = $data["username"];
   $password = $data["password"];

   $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
   $stmt->bind_param("s", $username);

   $stmt->execute();
   $result = $stmt->get_result();

   if ($result->num_rows > 0) {
      $user = $result->fetch_assoc();
      if (password_verify($password, $user['password'])) {
         // Login berhasil
         echo "Login successful! Welcome, " . htmlspecialchars($username) . ".";
         // Simpan session atau logika lainnya di sini
         $_SESSION['auth'] = true;
         $_SESSION['id'] = $user['id'];
         return true;
      } else {
         // Password salah
         echo "Invalid password.";
         return false;
      }
   } else {
      // Username tidak ditemukan
      echo "User not found.";
      return false;
   }
}
