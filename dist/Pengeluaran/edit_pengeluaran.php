<?php
include "../../koneksi.php";

//ambil data dari url
  $no = $_GET['no'];

  //query daftar harga
  $query = mysqli_query($koneksi, "SELECT * FROM tb_pengeluaran WHERE no_pengeluaran = '$no'");
  $data = mysqli_fetch_array($query);

  if (isset($_POST['btnSubmit']))
    {
      $no = $_POST['no_pengeluaran'];
      $tgl = $_POST['tgl_pengeluaran'];
      $nama = $_POST['nama_pengeluaran'];
      $total = $_POST['total_pengeluaran'];

      //query insert data
      $query  = "UPDATE tb_pengeluaran SET no_pengeluaran='$no', tgl_pengeluaran='$tgl', nama_pengeluaran='$nama', total_pengeluaran='$total' WHERE no_pengeluaran = '$no'";


      //mencek apakah berhasil diedit
      if (mysqli_query($koneksi, $query)) {
        echo "<script>
          alert('Data berhasil diperbaharui');
          document.location='?halaman=list_pengeluaran';
         </script>";
        }
        else {
          echo "<script>
            alert('Gagal');
           </script>";
        }
    }

  $query_jenis = mysqli_query($koneksi, "SELECT * FROM jenis_pengeluaran");
  $data_jenis = mysqli_fetch_assoc($query_jenis);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Pengeluaran</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="datepicker/css/datepicker.css">
  </head>
  <body>
    <div class="container">
      <h1 class="text-center mt-4">Edit Daftar Harga</h1>

      <!-- awal form -->

        <div class="card mt-3">
          <div class="card-header bg-primary text-white">
            Form Edit Pengeluaran
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="form-group">
                <label>ID Pengeluaran</label>
                <input type="text" name="no_pengeluaran" id="id" value="<?=$data['no_pengeluaran']; ?>" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tgl_pengeluaran" id="tgl_pengeluaran" value="<?=$data['tgl_pengeluaran']; ?>" class="form-control" placeholder="Tanggal" required>
              </div>
              <div class="form-group">
                <label>Nama Jenis Pengeluaran</label>
                <select class="form-control" name="nama_pengeluaran">
                  <?php
                    do { ?>
                      <option value="<?=$data_jenis['nama_pengeluaran'];?>" > <?=$data_jenis['nama_pengeluaran'];?> </option>";
                    <?php } while ($data_jenis = mysqli_fetch_assoc($query_jenis));  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Total Pengeluaran</label>
                <input type="text" name="total_pengeluaran" id="total_pengeluaran" value="<?=$data['total_pengeluaran']; ?>" class="form-control" required>
              </div>
              <button type="submit" name="btnSubmit" class="btn btn-success">Tambah</button>
            </form>
          </div>
        </div>

      <!-- akhir form -->
</div>
  </body>
</html>
