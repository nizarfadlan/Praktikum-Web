<?php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!$_POST['nama'] || !$_POST['nim'] || !$_POST['jenis_kelamin']) {
    $_SESSION["message"] = "Data wajib diisi";
  } else {
    $update = "UPDATE mahasiswa SET nama=:nama, jenis_kelamin=:jenis_kelamin WHERE nim=:nim";
    $stmt = $conn->prepare($update);
    $stmt->bindValue(":nama", $_POST["nama"]);
    $stmt->bindValue(":jenis_kelamin", $_POST["jenis_kelamin"]);
    $stmt->bindValue(":nim", $_POST["nim"]);
    if ($stmt->execute()) {
      $_SESSION["message"] = "Data berhasil diedit";
    } else {
      $_SESSION["message"] = "Data gagal diedit";
    }
  }
  header("Location: edit.php?nim=" . $_POST['nim']);
}
