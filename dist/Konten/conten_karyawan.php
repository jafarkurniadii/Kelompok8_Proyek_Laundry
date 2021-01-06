<?php
if (@$_GET['halaman']== 'tampiltransaksi') {
  include '../Transaksi/transaksi.php';
} 
  elseif(@$_GET['halaman']== 'edittransaksi') {
    include '../Transaksi/edittransaksi.php';
  }
  elseif(@$_GET['halaman']== 'hapustransaksi') {
    include '../Transaksi/hapus_transaksi.php';
  } 
  elseif(@$_GET['halaman']== 'hapustransaksisem') {
    include '../Transaksi/hapus_transaksi_sem.php';
  }
  elseif(@$_GET['halaman']== 'tambahtransaksi') {
    include '../Transaksi/tambahtransaksi.php';
  }

elseif (@$_GET['halaman']== 'tampilpelanggan') {
  include '../Pelanggan/pelanggan.php';
}
elseif (@$_GET['halaman']== 'tambahpelanggan') {
  include '../Pelanggan/tambah_pelanggan.php';
}
elseif (@$_GET['halaman']== 'hapuspelanggan') {
  include '../Pelanggan/hapus_pelanggan.php';
}
elseif (@$_GET['halaman']== 'editpelanggan') {
  include '../Pelanggan/editpelanggan.php';
}
elseif(@$_GET['halaman']== 'homepage') {
  include '../../selamatdatang.php';
}
else {
  include '../../selamatdatang.php'
}
?>
