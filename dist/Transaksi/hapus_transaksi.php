<?php
  include "../../koneksi.php";

  $id_transaksi = $_GET['id_transaksi'];

  $query = mysqli_query($koneksi, "DELETE FROM tb_transaksi WHERE id = '$id_transaksi'");

  if ($query) {
  	echo "<script> alert('Berhasil');
          document.location='?halaman=tampiltransaksi';</script>";
   } else {
     echo "<script> alert('Gagal Dihapus');
     document.location='?halaman=tampiltransaksi';</script>";
 }
 ?>
