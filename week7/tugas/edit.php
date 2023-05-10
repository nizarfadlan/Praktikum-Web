<?php
require "koneksi.php";

if ($_POST['submit']) {
  if (!$_POST['nama'] || !$_GET['nim'] || !$_POST['jenis_kelamin']) {
    $_SESSION["message"] = "Data wajib diisi";
  } else {
    $update = "UPDATE mahasiswa SET nama=:nama, jenis_kelamin=:jenis_kelamin WHERE nim=:nim";
    $stmt = $conn->prepare($update);
    $stmt->bindValue(":nama", $_POST["nama"]);
    $stmt->bindValue(":jenis_kelamin", $_POST["jenis_kelamin"]);
    $stmt->bindValue(":nim", $_GET["nim"]);
    if ($stmt->execute()) {
      $_SESSION["message"] = "Data berhasil diedit";
    } else {
      $_SESSION["message"] = "Data gagal diedit";
    }
    header("Location: index.php");
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
  <form method="post">
    <div style="margin-top: 10px;">
      <label>Nama</label>
      <input type="text" name="nama" maxlength="50" value="<?= $result->nama ?>">
    </div>
    <div style="margin-top: 10px;">
      <label>Jenis Kelamin</label>
      <input type="text" name="jenis_kelamin" maxlength="1" value="<?= $result->jenis_kelamin ?>">
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
