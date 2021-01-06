<?php
    //koneksi database
    include "../../koneksi.php";

//ambil data dari url
      $id_transaksi = $_GET['id_transaksi'];

      //query daftar harga
      $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE id = '$id_transaksi'");
      $data = mysqli_fetch_array($query);

      if (isset($_POST['btnSubmit']))
        {
         $id_transaksi = $_POST['id'];
         $nama_hotel = $_POST['nama_hotel'];
         $tanggal_masuk = $_POST['tanggal_masuk'];
         $total = $_POST['total'];
         $status = $_POST['status'];
         $bayar = $_POST['bayar'];
          //query insert data
          $query  = "UPDATE tb_transaksi SET nama_hotel='$nama_hotel', tanggal_masuk='$tanggal_masuk',
          total ='$total',bayar ='$bayar', status ='$status' WHERE id = '$id_transaksi'";


          //mencek apakah berhasil diedit
          if (mysqli_query($koneksi, $query)) {
            echo "<script>
              alert('Data berhasil diperbaharui');
              document.location='?halaman=tampiltransaksi';
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
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <title>Edit Tansaksi</title>
  </head>
  <body>
    <div class="container">

      <!-- awal form -->

        <div class="card mt-3">
          <div class="card-header bg-primary text-white">
            Form Edit Transaksi
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="form-group">
                <label>ID Transaksi</label>
                <input type="text" name="id" id="id" value="<?=$data['id']; ?>" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label>Nama Hotel</label>
                <input type="text" name="nama_hotel" value="<?=$data['nama_hotel']; ?>" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label>Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" value="<?=$data['tanggal_masuk']; ?>" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label>Total</label>
                <input type="number" name="total" value="<?=$data['total']; ?>" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label>Bayar</label>
                <input type="number" name="bayar" value="<?=$data['bayar']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label> Status </label>
                <select name="status" value =" <?=$data['status']; ?> " class="browser-default">
                  <option value="Belum dibayar">Belum dibayar</option>
                  <option value="Sudah dibayar">Sudah dibayar</option>
                </select>
              </div>
              <button type="submit" name="btnSubmit" class="btn btn-success">Tambah</button>
            </form>
          </div>
        </div>

      <!-- akhir form -->
</div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js" ></script>

  </body>
</html>
