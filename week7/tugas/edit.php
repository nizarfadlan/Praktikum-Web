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
  <title>Tugas 4</title>
</head>
<body>
  <a href="index.php">Back</a>
<?php
  if ($_GET["nim"]) {
    $nim = $_GET["nim"];
    $query = "SELECT nim, nama, jenis_kelamin FROM mahasiswa WHERE nim='$nim'";
    $result = $conn->query($query)->fetch();

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
      <input type="text" name="nama" maxlength="50" value="<?= $result->nama ?>">
    </div>
    <div style="margin-top: 10px;">
      <label>Jenis Kelamin</label>
      <label for="Laki">
        <?= $result->jenis_kelamin ?>
        <input type="radio" name="jenis_kelamin" value="L" <?= $result->jenis_kelamin == "L" ? "checked" : "" ?>> Laki-Laki
      </label>
      <label for="Perempuan">
        <input type="radio" name="jenis_kelamin" value="P" <?= $result->jenis_kelamin == "P" ? "checked" : "" ?>> Perempuan
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
