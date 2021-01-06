<?php
  include "../../koneksi.php";

  $query_jenis = mysqli_query($koneksi, "SELECT MAX(id_jenis) as idTerbesar FROM jenis_pengeluaran");
  $data_jenis = mysqli_fetch_array($query_jenis);
  $idJenis = $data_jenis['idTerbesar'];
  $urutan = substr($idJenis, 3, 3);
  $urutan++;
  $huruf = "J";
  $id_jenis = $huruf . sprintf("%03s", $urutan);

if (isset($_POST['btnSubmit']))
  {
    $id_jenis = $_POST['id_jenis'];
    $nama_pengeluaran = $_POST['nama_pengeluaran'];

    //query insert data
    $query  = "INSERT INTO jenis_pengeluaran (id_jenis, nama_pengeluaran) VALUES ('$id_jenis', '$nama_pengeluaran')";

    if (mysqli_query($koneksi, $query)) {
      echo "<script>
        alert('Berhasil');
        document.location='?halaman=tampiljenispengeluaran';
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
                <input type="text" name="id_jenis" id="id_jenis" class="form-control" value="<?php echo $id_jenis; ?>" readonly>
              </div>
              <div class="form-group">
                <label>Nama Jenis Pengeluaran</label>
                <input type="text" name="nama_pengeluaran" id="nama_pengeluaran" class="form-control" placeholder="Nama Jenis Pengeluaran" required>
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
