<?php
require "koneksi.php";

if ($_GET["nim"]) {
  $delete = "DELETE FROM mahasiswa WHERE nim=:nim";
  $stmt = $conn->prepare($delete);
  $stmt->bindValue(":nim", $_GET["nim"]);
  if ($stmt->execute()) {
    $_SESSION["message"] = "Data berhasil dihapus";
  } else {
    $_SESSION["message"] = "Data gagal dihapus";
  }
} else {
  $_SESSION["message"] = "NIM harus diisi";
}

header("Location: index.php");
