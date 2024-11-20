<?php

session_start();

if (!isset($_SESSION["auth"])) {
   header("location:" . __DIR__ . "/../../login.php");
}