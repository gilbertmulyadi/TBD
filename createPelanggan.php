<?php session_start();
   if(isset($_POST['submit'])){
      require 'config.php';
      $insertOneResult = $collection->insertOne([
          'Nama' => $_POST['Nama'],
          'Umur' => $_POST['Umur'],
          'Alamat' => $_POST['Alamat'],
          'No_Telp' => $_POST['No_Telp'],
          'Email' => $_POST['Email'],
      ]);
      $_SESSION['success'] = "Data Pelanggan Berhasil di tambahkan";
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
         <CENTER><h2>Tambah Data Pelanggan</h2></CENTER>
         <a href="index.php" class="btn btn-primary">Kembali</a>
         <form method="POST">
            <div class="form-group">
            <strong>Nama:</strong>
               <input type="text" class="form-control" name="Nama" placeholder="Nama">
               <strong>Umur:</strong>
               <input type="text" class="form-control" name="Umur" placeholder="Umur">
               <strong>Alamat:</strong>
               <input type="text" class="form-control" name="Alamat" placeholder="Alamat">
               <strong>No Telp:</strong>
               <input type="text" class="form-control" name="No_Telp" placeholder="No_Telp">
               <strong>Email:</strong>
               <input type="text" class="form-control" name="Email" placeholder="Email">
               <br>
               <button type="submit" name="submit" class="btn btn-success">Tambah</button>
            </div>
         </form>
      </div>
   </body>
</html>