<?php

  if (@$_GET['halaman']== 'tampilpengguna') {
    include '../Pengguna/pengguna.php';
  }
  elseif (@$_GET['halaman']== 'inputpengguna') {
    include '../Pengguna/inputpengguna.php';
  }
  elseif (@$_GET['halaman']== 'editpengguna') {
    include '../Pengguna/editpengguna.php';
  }
  elseif (@$_GET['halaman']== 'hapuspengguna') {
    include '../Pengguna/hapuspengguna.php';
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
  elseif (@$_GET['halaman']== 'tampilproduk') {
    include '../Daftar_Harga/daftar_harga.php';
  }
  elseif (@$_GET['halaman']== 'editharga') {
    include '../Daftar_Harga/edit_harga.php';
  }
  elseif (@$_GET['halaman']== 'hapusharga') {
    include '../Daftar_Harga/hapus_harga.php';
  }
  elseif (@$_GET['halaman']== 'tambahharga') {
    include '../Daftar_Harga/tambah_harga.php';
  }
  elseif (@$_GET['halaman']== 'tampiljenispengeluaran') {
    include '../Jenis_Pengeluaran/jenis_pengeluaran.php';
  }
  elseif (@$_GET['halaman']== 'tambahjenis') {
    include '../Jenis_Pengeluaran/tambah_jenis.php';
  }
  elseif (@$_GET['halaman']== 'hapusjenis') {
    include '../Jenis_Pengeluaran/hapus_jenis.php';
  }
  elseif (@$_GET['halaman']== 'editjenis') {
    include '../Jenis_Pengeluaran/edit_jenis.php';
  }
  elseif (@$_GET['halaman']== 'tampilpengeluaran') {
    include '../Pengeluaran/list_pengeluaran.php';
  }
  elseif (@$_GET['halaman']== 'tambahpengeluaran') {
    include '../Pengeluaran/tambah_pengeluaran.php';
  }
  elseif (@$_GET['halaman']== 'editpengeluaran') {
    include '../Pengeluaran/edit_pengeluaran.php';
  }
  elseif (@$_GET['halaman']== 'hapuspengeluaran') {
    include '../Pengeluaran/hapus_pengeluaran.php';
  }
  elseif(@$_GET['halaman']== 'homepage') {
    include '../../selamatdatang.php';
  } 
  elseif(@$_GET['halaman']== 'tampiltransaksi') {
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

  else {
    include '../../selamatdatang.php';
  }

 ?>
