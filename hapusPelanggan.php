<?php session_start();
   require 'config.php';
   if (isset($_GET['id'])) {
      $sw = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   }
   if(isset($_POST['submit'])){
         require 'config.php';
   $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   $_SESSION['success'] = "Data Pelanggan Berhasil dihapus";
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
         <CENTER><h2>Hapus Data Pelanggan</h2></CENTER>
         <h4> Hapus Pelanggan Yang Bernama <?php echo "$sw->Nama"; ?> </h4>
         <form method="POST">
            <div class="form-group">
               <input type="hidden" value="<?php echo "$sw->Nama"; ?>" class="form-control" name="Nama">
               <a href="index.php" class="btn btn-primary">Kembali</a>
               <button type="submit" name="submit" class="btn btn-danger">Hapus</button>
            </div>
         </form>
      </div>
   </body>
</html>