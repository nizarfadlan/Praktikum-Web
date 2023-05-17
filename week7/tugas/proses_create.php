<?php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!$_POST["nama"] || !$_POST["nim"] || !$_POST["jenis_kelamin"]) {
    $_SESSION["message"] = "Data wajib diisi";
  } else {
    $create = "INSERT INTO mahasiswa (nim, nama, jenis_kelamin) VALUES (:nim, :nama, :jenis_kelamin)";
    $stmt = $conn->prepare($create);
    $stmt->bindValue(":nim", $_POST["nim"]);
    $stmt->bindValue(":nama", $_POST["nama"]);
    $stmt->bindValue(":jenis_kelamin", $_POST["jenis_kelamin"]);
    $save = $stmt->execute();

    $_SESSION["message"] = "Data berhasil disimpan";
  }
  header("Location: index.php");
}
