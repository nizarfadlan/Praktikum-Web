<?php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!$_POST['nama'] || !$_POST['nim'] || !$_POST['angkatan']) {
    $_SESSION["message"] = "Data wajib diisi";
  } else {
    $update = "UPDATE mahasiswa SET nama=:nama, angkatan=:angkatan, alamat=:alamat, fakultas=:fakultas, prodi=:prodi, jurusan=:jurusan, jenjang=:jenjang, tanggal_lahir=:tanggal_lahir, jenis_kelamin=:jenis_kelamin, email=:email, status_mahasiswa=:statusMahasiswa WHERE nim=:nim";
    $stmt = $conn->prepare($update);
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
    $stmt->bindValue(":statusMahasiswa", $_POST["statusMahasiswa"] == "aktif", PDO::PARAM_BOOL);
    try {
      $stmt->execute();
      $_SESSION["message"] = "Data berhasil diedit";
    } catch (PDOException $e) {
      $_SESSION["message"] = "Data gagal diedit: " . $e->getMessage();
    }
    // if ($stmt->execute()) {
    //   $_SESSION["message"] = "Data berhasil diedit";
    // } else {
    //   $_SESSION["message"] = "Data gagal diedit";
    // }
  }
  header("Location: edit.php?nim=" . $_POST['nim']);
}
