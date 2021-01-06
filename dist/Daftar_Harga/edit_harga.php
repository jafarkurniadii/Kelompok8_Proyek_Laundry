<?php
    //koneksi database
    include "../../koneksi.php";

//ambil data dari url
      $id = $_GET['id'];

      //query daftar harga
      $query = mysqli_query($koneksi, "SELECT * FROM tb_harga WHERE id_brg = '$id'");
      $data = mysqli_fetch_array($query);

      if (isset($_POST['btnSubmit']))
        {
          $id = $_POST['id'];
          $nama = $_POST['nama'];
          $harga = $_POST['harga'];

          //query insert data
          $query  = "UPDATE tb_harga SET id_brg='$id', nama_brg='$nama', harga_brg='$harga' WHERE id_brg = '$id'";


          //mencek apakah berhasil diedit
          if (mysqli_query($koneksi, $query)) {
            echo "<script>
              alert('Data berhasil diperbaharui');
              document.location='?halaman=tampilproduk';
             </script>";
            }
            else {
              echo "<script>
                alert('Gagal');
               </script>";
            }
        }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Daftar Harga</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
      <h1 class="text-center mt-4">Edit Daftar Harga</h1>

      <!-- awal form -->

        <div class="card mt-3">
          <div class="card-header bg-primary text-white">
            Form Edit Daftar Harga
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="form-group">
                <label>ID Barang</label>
                <input type="text" name="id" id="id" value="<?=$data['id_brg']; ?>" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama" id="nama" value="<?=$data['nama_brg']; ?>" class="form-control" placeholder="Nama Barang" required>
              </div>
              <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" id="harga" value="<?=$data['harga_brg']; ?>" class="form-control" placeholder="Harga Barang" required>
              </div>
              <button type="submit" name="btnSubmit" class="btn btn-success">Tambah</button>
            </form>
          </div>
        </div>

      <!-- akhir form -->
</div>
  </body>
</html>
