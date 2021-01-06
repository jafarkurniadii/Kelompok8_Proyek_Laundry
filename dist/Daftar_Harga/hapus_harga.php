<?php
  include "../../koneksi.php";

  $id = $_GET['id'];

  $query = mysqli_query($koneksi, "DELETE FROM tb_harga WHERE id_brg = '$id'");

  if ($query) {
   echo "<script>document.location='?halaman=tampilproduk'</script>";
   } else {
     echo "Data Gagal Dihapus";
 }
 ?>
