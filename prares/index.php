<?php
require "koneksi.php";

$result = $conn->query("SELECT * FROM mahasiswa")->fetchAll();

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
  <table border=1>
    <thead>
      <tr>
        <th>
          No
        </th>
        <th>
          NIM
        </th>
        <th>
          Nama
        </th>
        <th>
          Angkatan
        </th>
        <th>
          Jurusan
        </th>
        <th>
          Created At
        </th>
        <th>
          Detail
        </th>
        <th>
          Edit
        </th>
        <th>
          Delete
        </th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($result as $key => $value) { ?>
        <tr>
          <td><?= $key+1 ?></td>
          <td><?= $value->nim ?></td>
          <td><?= $value->nama ?></td>
          <td><?= $value->angkatan ?></td>
          <td><?= $value->jurusan ?></td>
          <td><?= $value->created_at ?></td>
          <td>
            <a href="detail.php?nim=<?= $value->nim ?>">Detail</a>
          </td>
          <td>
            <a href="edit.php?nim=<?= $value->nim ?>">Edit</a>
          </td>
          <td>
            <button onclick="ConfirmDelete('<?= $value->nama ?>', '<?= $value->nim ?>');">Hapus</button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <h1>Input data</h1>
  <form method="post" action="proses_create.php">
    <div style="margin-top: 10px;">
      <label>NIM</label>
      <input type="text" name="nim" maxlength="9">
    </div>
    <div style="margin-top: 10px;">
      <label>Nama</label>
      <input type="text" name="nama" maxlength="50">
    </div>
    <div style="margin-top: 10px;">
      <label>Angkatan</label>
      <input type="number" name="angkatan" maxlength="4">
    </div>
    <div style="margin-top: 10px;">
      <label>Alamat</label>
      <textarea name="alamat" cols="30" rows="10"></textarea>
    </div>
    <div style="margin-top: 10px;">
      <label>Fakultas</label>
      <select name="fakultas">
        <option value="Fakultas Teknologi Industri">Fakultas Teknologi Industri</option>
        <option value="Fakultas Sains Terapan">Fakultas Sains Terapan</option>
        <option value="Fakultas Teknologi Mineral">Fakultas Teknologi Mineral</option>
        <option value="Fakultas Teknologi Informasi dan Bisnis">Fakultas Teknologi Informasi dan Bisnis</option>
        <option value="Program Pendidikan Vokasi (D-3)">Program Pendidikan Vokasi (D-3)</option>
      </select>
    </div>
    <div style="margin-top: 10px;">
      <label>Prod</label>
      <select name="prodi">
        <option value="Magister Rekayasa Mesin">Magister Rekayasa Mesin</option>
        <option value="Teknik Mesin">Teknik Mesin</option>
        <option value="Teknik Kimia">Teknik Kimia</option>
        <option value="Teknik Industri">Teknik Industri</option>
        <option value="Teknik Elektro">Teknik Elektro</option>
        <option value="Informatika">Informatika</option>
      </select>
    </div>
    <div style="margin-top: 10px;">
      <label>Jurusan</label>
      <select name="jurusan">
        <option value="Magister Rekayasa Mesin">Magister Rekayasa Mesin</option>
        <option value="Teknik Mesin">Teknik Mesin</option>
        <option value="Teknik Kimia">Teknik Kimia</option>
        <option value="Teknik Industri">Teknik Industri</option>
        <option value="Teknik Elektro">Teknik Elektro</option>
        <option value="Informatika">Informatika</option>
      </select>
    </div>
    <div style="margin-top: 10px;">
      <label>Jenjang</label>
      <select name="jenjangFirst">
        <option value="D">D</option>
        <option value="S">S</option>
      </select>
      <input type="number" name="jenjang" maxlength="1">
    </div>
    <div style="margin-top: 10px;">
      <label>Tanggal Lahir</label>
      <input type="date" name="tanggal_lahir">
    </div>
    <div style="margin-top: 10px;">
      <label>Jenis Kelamin</label>
      <label for="Laki">
        <input type="radio" name="jenis_kelamin" value="L"> Laki-Laki
      </label>
      <label for="Perempuan">
        <input type="radio" name="jenis_kelamin" value="P"> Perempuan
      </label>
    </div>
    <div style="margin-top: 10px;">
      <label>Email</label>
      <input type="text" name="email" maxlength="50">
    </div>
    <div style="margin-top: 10px;">
      <label>Status Mahasiswa</label>
      <label for="Aktif">
        <input type="radio" name="statusMahasiswa" value="aktif"> Aktif
      </label>
      <label for="Tidak Aktif">
        <input type="radio" name="statusMahasiswa" value="tidakAktif"> Tidak Aktif
      </label>
    </div>
    <div style="margin-top: 10px;">
      <input type="submit" name="submit" value="Submit">
    </div>
  </form>
</body>
<script type="text/javascript">
  function ConfirmDelete(nama, nim) {
    if (confirm(`Apakah benar ingin menghapus data ${nama}`)) location.href=`proses_hapus.php?nim=${nim}`;
  }
</script>
</html>
