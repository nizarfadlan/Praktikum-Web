<?php
require "config.php";

$host = "localhost";
$db = "praktikum";
$username = "chatbot";
$password = "nizar";

try {
  $conn = new PDO("pgsql:host=$host;dbname=$db", $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]);
} catch(PDOException $e) {
  die("Koneksi gagal: " . $e->getMessage());
}
