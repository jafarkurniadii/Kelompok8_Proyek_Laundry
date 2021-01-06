<?php
	include "../../koneksi.php";

    $no = $_GET['no']; //untuk mengambil id berita yang akan di edit
    $query = "SELECT * FROM tb_login WHERE no = $no"; //code sql nya untuk mengambil data untuk diedit
    $hasil = mysqli_query($koneksi, $query); //menampilkan hasil dari query tersebut
    $data = mysqli_fetch_array($hasil);// menampilkan table dari sql


		//see the result
		if (isset($_POST['submit']))
		{
			$no = $_POST['no'];
			$username = $_POST['username'];
			$nama = $_POST['nama'];
			$password = $_POST['password'];

			$query = "UPDATE tb_login SET username='$username', nama='$nama', password='$password'
								where no ='$no' "; //code sql update

			if (mysqli_query($koneksi, $query))
			{
				echo "<script>window.alert('Berhasil Diubah')</script>";//jika berhasil diedit akan muncul alert
				echo "<script>document.location='?halaman=tampilpengguna'</script>";
			} else {
				echo "<script> alert('Data Gagal Diubah') </script>";
			}
		}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
		<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Data Pelanggan</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <title></title>
  </head>
  <body>
		<div class="container">
      <h1 class="text-center mt-4">Edit Daftar Pengguna</h1>

      <!-- awal form -->

        <div class="card mt-3">
          <div class="card-header bg-primary text-white">
            Form Edit Pengguna
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="form-group">
                <label>No</label>
                <input type="text" name="no" id="no" value="<?=$data['no']; ?>" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" id="username" value="<?=$data['username']; ?>" class="form-control" placeholder="Masukkan Username Anda" required>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" id="password" value="<?=$data['password']; ?>" class="form-control" placeholder="Masukkan Password Anda" required>
              </div>
							<div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" id="nama" value="<?=$data['nama']; ?>" class="form-control" placeholder="Masukkan Nama Anda" required>
              </div>
              <button type="submit" name="submit" class="btn btn-success">Tambah</button>
            </form>
          </div>
        </div>

      <!-- akhir form -->
</div>

</div>
  </body>
</html>
