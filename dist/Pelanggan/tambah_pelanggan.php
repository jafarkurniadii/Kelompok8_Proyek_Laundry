<?php
  include "../../koneksi.php";

  $query_pelanggan = mysqli_query($koneksi, "SELECT MAX(no) as noTerbesar FROM tb_pelanggan");
      $data_pelanggan = mysqli_fetch_array($query_pelanggan);
      $noHotel = $data_pelanggan['noTerbesar'];
      $urutan = substr($noHotel, 1, 3);
      $urutan++;
      $no = sprintf("%03s", $urutan);

  if (isset($_POST['btnSubmit']))
    {
      $no = $_POST['no'];
      $nama = $_POST['nama_hotel'];
      $alamat = $_POST['alamat_hotel'];
      $telepon = $_POST['no_tel'];

      //query insert data
      $query  = "INSERT INTO tb_pelanggan (no, nama_hotel, alamat_hotel, no_tel) VALUES ('$no', '$nama', '$alamat', '$telepon')";

      if (mysqli_query($koneksi, $query)) {
        echo "<script>
          alert('Berhasil');
          document.location='?halaman=tampilpelanggan';
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
      <title>Tambah Daftar Harga</title>
      <link href="../css/styles.css" rel="stylesheet" />
      <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <title></title>
  </head>
  <body>
    <div class="container">
      <h1 class="text-center mt-4">Tambah Data Pelanggan</h1>
        <div class="card mt-3">
          <div class="card-header bg-primary text-white">
            Form Tambah Pelanggan
          </div>
          <div class="card-body">
            <form class="" action="" method="post">
              <div class="form-group">
                <label>No Hotel</label>
                <input type="text" name="no"  class="form-control" value="<?php echo $no; ?>" readonly>
              </div>
              <div class="form-group">
                <label>Nama Hotel</label>
                <input type="text" name="nama_hotel" placeholder="No Hotel" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Alamat Hotel</label>
                <input type="text" name="alamat_hotel" placeholder="No Hotel" class="form-control" required>
              </div>
              <div class="form-group">
                <label>No. Telepon</label>
                <input type="text" name="no_tel" placeholder="No. Telepon" class="form-control" required>
              </div>
                <button type="submit" name="btnSubmit" class="btn btn-success">Tambah</button>
                <button type="reset" name="btnDelete" class="btn btn-danger">Kosongkan</button>
            </form>
          </div>
        </div>
    </div>
  </body>
</html>
