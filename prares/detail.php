<?php
require "koneksi.php";

if(isset($_SESSION["message"])) {
  $message = $_SESSION["message"];
  unset($_SESSION["message"]);
  echo $message;
  echo "<br>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prares</title>
</head>
<body>
  <a href="index.php">Back</a>
<?php
  if ($_GET["nim"]) {
    $nim = $_GET["nim"];
    $query = "SELECT * FROM mahasiswa WHERE nim='$nim'";
    $result = $conn->query($query)->fetch();

    if (!$result) {
      $_SESSION["message"] = "Data tidak ada";
      header("Location: index.php");
    }
?>
  <h1>Detail data</h1>
  <div>
    <span style="font-size: 1.2em; font-weight:bold;">NIM</span>
    <span><?= $result->nim ?></span>
  </div>
  <div>
    <span style="font-size: 1.2em; font-weight:bold;">Nama</span>
    <span><?= $result->nama ?></span>
  </div>
  <div>
    <span style="font-size: 1.2em; font-weight:bold;">Angkatan</span>
    <span><?= $result->angkatan ?></span>
  </div>
  <div>
    <span style="font-size: 1.2em; font-weight:bold;">Alamat</span>
    <span><?= $result->alamat ?></span>
  </div>
  <div>
    <span style="font-size: 1.2em; font-weight:bold;">Fakultas</span>
    <span><?= $result->fakultas ?></span>
  </div>
  <div>
    <span style="font-size: 1.2em; font-weight:bold;">Prodi</span>
    <span><?= $result->prodi ?></span>
  </div>
  <div>
    <span style="font-size: 1.2em; font-weight:bold;">Jurusan</span>
    <span><?= $result->jurusan ?></span>
  </div>
  <div>
    <span style="font-size: 1.2em; font-weight:bold;">Jenjang</span>
    <span><?= $result->jenjang ?></span>
  </div>
  <div>
    <span style="font-size: 1.2em; font-weight:bold;">Tanggal Lahir</span>
    <span><?= $result->tanggal_lahir ?></span>
  </div>
  <div>
    <span style="font-size: 1.2em; font-weight:bold;">Jenis Kelamin</span>
    <span><?= $result->jenis_kelamin == "L" ? "Laki-Laki" : "Perempuan" ?></span>
  </div>
  <div>
    <span style="font-size: 1.2em; font-weight:bold;">Email</span>
    <span><?= $result->email ?></span>
  </div>
  <div>
    <span style="font-size: 1.2em; font-weight:bold;">Status Mahasiswa</span>
    <span><?= $result->status_mahasiswa == "aktif" ? "Aktif" : "Tidak Aktif" ?></span>
  </div>
<?php } else { ?>
  <h1>Data tidak ada</h1>
<?php }?>
</body>
</html>
