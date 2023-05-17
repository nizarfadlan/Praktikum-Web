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
  <title>Tugas 3</title>
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
          Jenis Kelamin
        </th>
        <th>
          Created At
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
          <td><?= $value->jenis_kelamin ?></td>
          <td><?= $value->created_at ?></td>
          <td>
            <a href="edit.php?nim=<?= $value->nim ?>">Edit</a>
          </td>
          <td>
            <a href="proses_hapus.php?nim=<?= $value->nim ?>">Hapus</a>
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
      <label>Jenis Kelamin</label>
      <label for="Laki">
        <input type="radio" name="jenis_kelamin" value="L"> Laki-Laki
      </label>
      <label for="Perempuan">
        <input type="radio" name="jenis_kelamin" value="P"> Perempuah
      </label>
    </div>
    <div style="margin-top: 10px;">
      <input type="submit" name="submit" value="Submit">
    </div>
  </form>
</body>
</html>
