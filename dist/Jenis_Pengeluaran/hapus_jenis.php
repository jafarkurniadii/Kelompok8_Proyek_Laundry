<?php
  include "../../koneksi.php";

  $id = $_GET['id'];

  $query = mysqli_query($koneksi, "DELETE FROM jenis_pengeluaran WHERE id_jenis = '$id'");

  if ($query) {
   echo "<script>document.location='?halaman=tampiljenispengeluaran'</script>";
   } else {
     echo "Data Gagal Dihapus";
 }
 ?>
