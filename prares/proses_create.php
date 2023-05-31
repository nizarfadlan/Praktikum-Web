<?php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!$_POST["nama"] || !$_POST["nim"] || !$_POST["angkatan"] || !$_POST["statusMahasiswa"]) {
    $_SESSION["message"] = "Data wajib diisi";
  } else {
    $create = "INSERT INTO mahasiswa VALUES (:nim, :nama, :angkatan, :alamat, :fakultas, :prodi, :jurusan, :jenjang, :tanggal_lahir, :jenis_kelamin, :email, :statusMahasiswa, now())";
    $stmt = $conn->prepare($create);
    $stmt->bindValue(":nim", $_POST["nim"]);
    $stmt->bindValue(":nama", $_POST["nama"]);
    $stmt->bindValue(":angkatan", $_POST["angkatan"]);
    $stmt->bindValue(":alamat", $_POST["alamat"]);
    $stmt->bindValue(":fakultas", $_POST["fakultas"]);
    $stmt->bindValue(":prodi", $_POST["prodi"]);
    $stmt->bindValue(":jurusan", $_POST["jurusan"]);
    $jenjang = $_POST["jenjangFirst"] . $_POST["jenjang"];
    $stmt->bindValue(":jenjang", $jenjang);
    $stmt->bindValue(":tanggal_lahir", $_POST["tanggal_lahir"]);
    $stmt->bindValue(":jenis_kelamin", $_POST["jenis_kelamin"]);
    $stmt->bindValue(":email", $_POST["email"]);
    $stmt->bindValue(":statusMahasiswa", $_POST["statusMahasiswa"] == "aktif");
    $save = $stmt->execute();

    $_SESSION["message"] = "Data berhasil disimpan";
  }
  header("Location: index.php");
}
