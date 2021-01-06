<?php
  include "../../koneksi.php";

  $no = $_GET['no'];

  $query = mysqli_query($koneksi, "DELETE FROM tb_pengeluaran WHERE no_pengeluaran = '$no'");

  if ($query) {
   echo "<script>document.location='?halaman=list_pengeluaran'</script>";
   } else {
     echo "Data Gagal Dihapus";
 }
 ?>
