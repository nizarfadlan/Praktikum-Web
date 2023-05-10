<?php
require "koneksi.php";

$result = $conn->query("SELECT * FROM mahasiswa")->fetchAll();

if ($_POST["submit"]) {
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
}

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
            <a href="hapus.php?nim=<?= $value->nim ?>">Hapus</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <h1>Input data</h1>
  <form method="post">
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
      <input type="text" name="jenis_kelamin" maxlength="1">
    </div>
    <div style="margin-top: 10px;">
      <input type="submit" name="submit" value="Submit">
    </div>
  </form>
</body>
</html>
