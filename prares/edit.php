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

    $jenjangFirst = str_split($result->jenjang, 1)[0];
    $jenjang = str_split($result->jenjang, 1)[1];


    if (!$result) {
      $_SESSION["message"] = "Data tidak ada";
      header("Location: index.php");
    }
?>
  <h1>Edit data</h1>
  <form method="post" action="proses_edit.php">
    <input name="nim" hidden value="<?= $_GET['nim']?>">
    <div style="margin-top: 10px;">
      <label>Nama</label>
      <input type="text" name="nama" value="<?= $result->nama ?>" maxlength="50">
    </div>
    <div style="margin-top: 10px;">
      <label>Angkatan</label>
      <input type="number" name="angkatan" value="<?= $result->angkatan ?>" maxlength="4">
    </div>
    <div style="margin-top: 10px;">
      <label>Alamat</label>
      <textarea name="alamat" cols="30" rows="10"><?= $result->alamat ?></textarea>
    </div>
    <div style="margin-top: 10px;">
      <label>Fakultas</label>
      <select name="fakultas">
        <option
          value="Fakultas Teknologi Industri"
          <?= $result->fakultas == 'Fakultas Teknologi Industri' ? 'selected="selected"' : '' ?>
        >
          Fakultas Teknologi Industri
        </option>
        <option
          value="Fakultas Sains Terapan"
          <?= $result->fakultas == 'Fakultas Sains Terapan' ? 'selected="selected"' : '' ?>
        >
          Fakultas Sains Terapan
        </option>
        <option
          value="Fakultas Teknologi Mineral"
          <?= $result->fakultas == 'Fakultas Teknologi Mineral' ? 'selected="selected"' : '' ?>
        >
          Fakultas Teknologi Mineral
        </option>
        <option
          value="Fakultas Teknologi Informasi dan Bisnis"
          <?= $result->fakultas == 'Fakultas Teknologi Informasi dan Bisnis' ? 'selected="selected"' : '' ?>
        >
          Fakultas Teknologi Informasi dan Bisnis
        </option>
        <option
          value="Program Pendidikan Vokasi (D-3)"
          <?= $result->fakultas == 'Program Pendidikan Vokasi (D-3)' ? 'selected="selected"' : '' ?>
        >
          Program Pendidikan Vokasi (D-3)
        </option>
      </select>
    </div>
    <div style="margin-top: 10px;">
      <label>Prod</label>
      <select name="prodi">
        <option
          value="Magister Rekayasa Mesin"
          <?= $result->prodi == 'Magister Rekayasa Mesin' ? 'selected="selected"' : '' ?>
        >
          Magister Rekayasa Mesin
        </option>
        <option
          value="Teknik Mesin"
          <?= $result->prodi == 'Teknik Mesin' ? 'selected="selected"' : '' ?>
        >
          Teknik Mesin
        </option>
        <option
          value="Teknik Kimia"
          <?= $result->prodi == 'Teknik Kimia' ? 'selected="selected"' : '' ?>
        >
          Teknik Kimia
        </option>
        <option
          value="Teknik Industri"
          <?= $result->prodi == 'Teknik Industri' ? 'selected="selected"' : '' ?>
        >
          Teknik Industri
        </option>
        <option
          value="Teknik Elektro"
          <?= $result->prodi == 'Teknik Elektro' ? 'selected="selected"' : '' ?>
        >
          Teknik Elektro
        </option>
        <option
          value="Informatika"
          <?= $result->prodi == 'Informatika' ? 'selected="selected"' : '' ?>
        >
          Informatika
        </option>
      </select>
    </div>
    <div style="margin-top: 10px;">
      <label>Jurusan</label>
      <select name="jurusan">
      <option
          value="Magister Rekayasa Mesin"
          <?= $result->prodi == 'Magister Rekayasa Mesin' ? 'selected="selected"' : '' ?>
        >
          Magister Rekayasa Mesin
        </option>
        <option
          value="Teknik Mesin"
          <?= $result->prodi == 'Teknik Mesin' ? 'selected="selected"' : '' ?>
        >
          Teknik Mesin
        </option>
        <option
          value="Teknik Kimia"
          <?= $result->prodi == 'Teknik Kimia' ? 'selected="selected"' : '' ?>
        >
          Teknik Kimia
        </option>
        <option
          value="Teknik Industri"
          <?= $result->prodi == 'Teknik Industri' ? 'selected="selected"' : '' ?>
        >
          Teknik Industri
        </option>
        <option
          value="Teknik Elektro"
          <?= $result->prodi == 'Teknik Elektro' ? 'selected="selected"' : '' ?>
        >
          Teknik Elektro
        </option>
        <option
          value="Informatika"
          <?= $result->prodi == 'Informatika' ? 'selected="selected"' : '' ?>
        >
          Informatika
        </option>
      </select>
    </div>
    <div style="margin-top: 10px;">
      <label>Jenjang</label>
      <select name="jenjangFirst">
        <option
          value="D"
          <?= $jenjangFirst == 'D' ? 'selected="selected"' : '' ?>
        >
          D
        </option>
        <option
          value="S"
          <?= $jenjangFirst == 'S' ? 'selected="selected"' : '' ?>
        >
          S
        </option>
      </select>
      <input type="number" name="jenjang" maxlength="1" value="<?= $jenjang ?>">
    </div>
    <div style="margin-top: 10px;">
      <label>Tanggal Lahir</label>
      <input type="date" name="tanggal_lahir" value="<?= $result->tanggal_lahir ?>">
    </div>
    <div style="margin-top: 10px;">
      <label>Jenis Kelamin</label>
      <label for="Laki">
        <input type="radio" name="jenis_kelamin" value="L" <?= $result->jenis_kelamin == 'L' ? 'checked' : '' ?>> Laki-Laki
      </label>
      <label for="Perempuan">
        <input type="radio" name="jenis_kelamin" value="P" <?= $result->jenis_kelamin == 'P' ? 'checked' : '' ?>> Perempuan
      </label>
    </div>
    <div style="margin-top: 10px;">
      <label>Email</label>
      <input type="text" name="email" maxlength="50" value="<?= $result->email ?>">
    </div>
    <div style="margin-top: 10px;">
      <label>Status Mahasiswa</label>
      <label for="Aktif">
        <input type="radio" name="statusMahasiswa" value="aktif" <?= $result->status_mahasiswa ? 'checked' : '' ?>> Aktif
      </label>
      <label for="Tidak Aktif">
        <input type="radio" name="statusMahasiswa" value="tidakAktif" <?= !$result->status_mahasiswa ? 'checked' : '' ?>> Tidak Aktif
      </label>
    </div>
    <div style="margin-top: 10px;">
      <input type="submit" name="submit" value="Submit">
    </div>
  </form>
<?php } else { ?>
  <h1>Data tidak ada</h1>
<?php }?>
</body>
</html>
