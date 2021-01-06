<?php
  //koneksi database
  include "../../koneksi.php";

  $query_harga = mysqli_query($koneksi, "SELECT MAX(id_brg) as idTerbesar FROM tb_harga");
  $data_harga = mysqli_fetch_array($query_harga);
  $idBarang = $data_harga['idTerbesar'];
  $urutan = substr($idBarang, 1, 3);
  $urutan++;
  $huruf = "B";
  $idbrg = $huruf . sprintf("%03s", $urutan);


  //ambil data dari tiap element dalam form
  if (isset($_POST['btnSubmit']))
    {
      $id = $_POST['id_brg'];
      $nama = $_POST['nama_brg'];
      $harga = $_POST['harga_brg'];

      //query insert data
      $query  = "INSERT INTO tb_harga (id_brg, nama_brg, harga_brg) VALUES ('$id', '$nama', '$harga')";

      if (mysqli_query($koneksi, $query)) {
        echo "<script>
          alert('Berhasil');
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
    <title>Tambah Daftar Harga</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  </head>
  <body>
    <div class="container">
      <h1 class="text-center mt-4">Tambah Daftar Harga</h1>

      <!-- awal form -->

        <div class="card mt-3">
          <div class="card-header bg-primary text-white">
            Form Tambah Daftar Harga
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="form-group">
                <label>ID Barang</label>
                <input type="text" name="id_brg" id="id_brg" class="form-control" value="<?php echo $idbrg ?>" readonly>
              </div>
              <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_brg" id="nama_brg" class="form-control" placeholder="Nama Barang" required>
              </div>
              <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga_brg" id="harga_brg" class="form-control" placeholder="Harga Barang" required>
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
