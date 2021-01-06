<?php
		//koneksi database
		include "../../koneksi.php";

		//ambil data dari url
			$no = $_GET['no'];

			//query daftar harga
			$query = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan WHERE no = '$no'");
			$data = mysqli_fetch_array($query);

			if (isset($_POST['btnSubmit']))
        {
					$no = $_POST['no'];
			    $nama = $_POST['nama_hotel'];
			    $alamat = $_POST['alamat_hotel'];
			    $telepon = $_POST['no_tel'];

          //query insert data
          $query  = "UPDATE tb_pelanggan SET nama_hotel='$nama', alamat_hotel='$alamat', no_tel='$telepon' WHERE no = '$no'";


          //mencek apakah berhasil diedit
          if (mysqli_query($koneksi, $query)) {
            echo "<script>
              alert('Data berhasil diperbaharui');
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
    <title>Tambah Daftar Pelanggan</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  </head>
  <body>
    <div class="container">
      <h1 class="text-center mt-4">Edit Data Pelanggan</h1>

      <!-- awal form -->

        <div class="card mt-3">
          <div class="card-header bg-primary text-white">
            Form Edit Pelanggan
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="form-group">
                <label>No Hotel</label>
                <input type="text" name="no" id="no" value="<?=$data['no']; ?>" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label>Nama Hotel</label>
                <input type="text" name="nama_hotel" id="nama_hotel" value="<?=$data['nama_hotel']; ?>" class="form-control" placeholder="Nama Hotel" required>
              </div>
              <div class="form-group">
                <label>Alamat Hotel</label>
								<input type="text" class="form-control" name="alamat_hotel" id="alamat_hotel"  value="<?=$data['alamat_hotel']; ?>">
              </div>
              <div class="form-group">
                <label>No. Telepon</label>
                <input type="text" name="no_tel" id="no_tel" value="<?=$data['no_tel']; ?>" class="form-control" required>
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
