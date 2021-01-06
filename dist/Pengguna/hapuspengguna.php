<?php
  include "../../koneksi.php";

  $no = $_GET['no'];

  $sql = mysqli_query($koneksi, "DELETE FROM tb_login WHERE no = $no"); //code sql hapus

  if($sql){
  echo "<script>window.alert('Berhasil Dihapus')</script>"; //ada pemberitahuan javascript kalau berhasil
  echo "<script>document.location='?halaman=tampilpengguna' </script>";
  } else {
    echo "Data Gagal Dihapus";
  }
 ?>
