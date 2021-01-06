<?php
include '../../koneksi.php';

$id_transaksi_sem = $_GET['id_transaksi_sem'];
$id_transaksi=$_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM tb_transaksi_sementara where id_transaksi_sem = '$id_transaksi_sem'");
if ($query) {
  echo "Data berhasil dihapus";
  echo "<script> window.location.href = '?halaman=tambahtransaksi&id=$id_transaksi'</script>";
}
else {
  echo "Data gagal dihapus";
}
 ?>
