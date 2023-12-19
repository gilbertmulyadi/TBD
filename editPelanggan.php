<?php
session_start();
require 'config.php';

if (isset($_GET['id'])) {
   $sw = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
}

if (isset($_POST['submit'])) {
   $collection->updateOne(
      ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
      [
         '$set' => [
            'Nama' => $_POST['Nama'],
            'Umur' => $_POST['Umur'],
            'Alamat' => $_POST['Alamat'],
            'No_Telp' => $_POST['No_Telp'],
            'Email' => $_POST['Email']
         ]
      ]
   );
   $_SESSION['success'] = "Data Pelanggan berhasil diubah";
   header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
   <title>RentCarnation</title>
   <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
   <div class="container">
      <br>
      <CENTER><h2>Edit Data Pelanggan</h2></CENTER>
      <a href="index.php" class="btn btn-primary">Kembali</a>
      <form method="POST">
         <div class="form-group">
            <strong>Nama:</strong>
            <input type="text" class="form-control" name="Nama" placeholder="Nama" value="<?php echo $sw['Nama']; ?>">
            <strong>Umur:</strong>
            <input type="text" class="form-control" name="Umur" placeholder="Umur" value="<?php echo $sw['Umur']; ?>">
            <strong>Alamat:</strong>
            <input type="text" class="form-control" name="Alamat" placeholder="Alamat" value="<?php echo $sw['Alamat']; ?>">
            <strong>No Telp:</strong>
            <input type="text" class="form-control" name="No_Telp" placeholder="No_Telp" value="<?php echo $sw['No_Telp']; ?>">
            <strong>Email:</strong>
            <input type="text" class="form-control" name="Email" placeholder="Email" value="<?php echo $sw['Email']; ?>">
            <br>
            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
         </div>
      </form>
   </div>
</body>
</html>
