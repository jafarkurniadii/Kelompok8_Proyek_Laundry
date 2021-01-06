<?php
  include "../../koneksi.php";

  $query_pengeluaran = mysqli_query($koneksi, "SELECT MAX(no_pengeluaran) as noTerbesar FROM tb_pengeluaran");
  $data_pengeluaran = mysqli_fetch_array($query_pengeluaran);
  $noT = $data_pengeluaran['noTerbesar'];
  $urutan = substr($noT, 3, 3);
  $urutan++;
  $huruf = "J";
  $id_jenis = $huruf . sprintf("%03s", $urutan);

if (isset($_POST['btnSubmit']))
  {
    $no_pengeluaran = $_POST['no_pengeluaran'];
    $tgl_pengeluaran = $_POST['tgl_pengeluaran'];
    $nama_pengeluaran = $_POST['nama_pengeluaran'];
    $total_pengeluaran = $_POST['total_pengeluaran'];

    //query insert data
    $query  = "INSERT INTO tb_pengeluaran VALUES ('$no_pengeluaran', '$tgl_pengeluaran', '$nama_pengeluaran', '$total_pengeluaran')";

    if (mysqli_query($koneksi, $query)) {
      echo "<script>
        alert('Berhasil');
        document.location='?halaman=listpengeluaran';
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
    <title>Tambah Daftar Harga</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
      <h1 class="text-center mt-4">Tambah Daftar Harga</h1>

      <!-- awal form -->

        <div class="card mt-3">
          <div class="card-header bg-primary text-white">
            Form Tambah Jenis Pengeluaran
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="form-group">
                <label>ID Pengeluaran</label>
                <input type="text" name="no_pengeluaran" id="no_pengeluaran" class="form-control" placeholder="ID Pengeluaran" value="<?php echo $id_jenis; ?>" readonly>
              </div>
              <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tgl_pengeluaran" id="tgl_pengeluaran" class="form-control datepicker" required>
              </div>
              <div class="form-group">
                <label>Nama Jenis Pengeluaran</label>
                <select class="form-control" name="nama_pengeluaran">
                  <?php do { ?>
              <option value="<?=$data_jenis['nama_pengeluaran'];?>" > <?=$data_jenis['nama_pengeluaran'];?> </option>";
            <?php } while ($data_jenis = mysqli_fetch_assoc($query_jenis));  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Total</label>
                <input type="text" name="total_pengeluaran" id="total_pengeluaran" class="form-control" placeholder="Total Pengeluaran" required>
              </div>
              <button type="submit" name="btnSubmit" class="btn btn-success">Tambah</button>
              <button type="reset" name="btnDelete" class="btn btn-danger">Kosongkan</button>
            </form>
          </div>
        </div>

      <!-- akhir form -->
</div>
  </body>
</html>
