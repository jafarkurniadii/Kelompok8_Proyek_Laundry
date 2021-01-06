<?php
session_start();
include("../koneksi.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $username=$_POST['username'];
  $password=$_POST['password'];
  $query=mysqli_query($koneksi, "SELECT * FROM tb_login WHERE username='$username' and password='$password'" );
  $match = mysqli_num_rows($query);

  if($match > 0){
    $no = $_SESSION['no'];
    $data = mysqli_fetch_assoc($query);
    if ($data['level']=="admin") {
      $admin = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM tb_login where level = 'admin'"));
      session_start();
      $_SESSION['nama'] = $admin['nama'];
      $_SESSION['no'] = $admin['no'];
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['level'] = "admin";
      header("Location: konten/halaman_admin.php");
    }
    elseif ($data['level']=="karyawan") {
      $karyawan = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM tb_login where level = 'karyawan'"));
      session_start();
      $_SESSION['nama'] = $karyawan['nama'];
      $_SESSION['no'] = $karyawan['no'];
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['level'] = "karyawan";
      header("Location: konten/halaman_karyawan.php");
    }
    elseif ($data['level']=="pelangganA") {
      $pelanggan = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM tb_login where level = 'pelangganA'"));
      session_start();
      $_SESSION['no'] = $pelanggan['no'];
      $_SESSION['nama'] = $pelanggan['nama'];
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['level'] = "pelangganA";
      header("Location: konten/halaman_pelanggan.php");
    }
    elseif ($data['level']=="pelangganB") {
      $pelanggan = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM tb_login where level = 'pelangganB'"));
      session_start();
      $_SESSION['no'] = $pelanggan['no'];
      $_SESSION['nama'] = $pelanggan['nama'];
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['level'] = "pelangganB";
      header("Location: konten/halaman_pelanggan.php");
    }
  }
}
?>
