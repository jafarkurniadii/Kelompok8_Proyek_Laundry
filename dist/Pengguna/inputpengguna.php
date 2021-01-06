<?php
  include "../../koneksi.php";

  $query_pengguna = mysqli_query($koneksi, "SELECT MAX(no) as noTerbesar FROM tb_login");
  $data_pengguna = mysqli_fetch_array($query_pengguna);
  $noPengguna = $data_pengguna['noTerbesar'];
  $urutan = (int) substr($noPengguna, 1, 3);
  $urutan++;
  $no = sprintf("%03s", $urutan);

if (isset($_POST['btnSubmit']))
  {
    $no = $_POST['no'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $level = $_POST['level'];

    //query insert data
    $sql  = mysqli_query($koneksi,"INSERT INTO tb_login (no, username, password, nama,level)
            VALUES ('$no' , '$username' , '$password', '$nama', '$level')");//code sql tambah data

    if ($sql) {
      echo "<script>
        alert('Berhasil');
        document.location='?halaman=tampilpengguna';
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
      <h1 class="text-center mt-4">Tambah Pengguna</h1>

      <!-- awal form -->

        <div class="card mt-3">
          <div class="card-header bg-primary text-white">
            Form Tambah Data Pengguna
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="form-group">
                <label>No</label>
                <input type="text" name="no" id="no" class="form-control" placeholder="ID Pengeluaran" value="<?php echo $no; ?>" readonly>
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" id="password" class="form-control" placeholder="Password" required>
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" required>
              </div>
              <div class="form-group">
                <label>Level</label>
                <input type="text" name="level" id="level" class="form-control" placeholder="Level" required>
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
