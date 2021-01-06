<?php

  if(@$_GET['halaman']== 'homepage') {
    include '../../selamatdatang.php';
  } 
  elseif (@$_GET['halaman'] == 'editpelanggan'){
  	include '../Pelanggan/editpelanggan_pelanggan.php';
  }
  elseif (@$_GET['halaman'] == 'halamanpelanggan'){
  	include '../Pelanggan/halaman_pelangganphp';
  }
  else {
    include '../../selamatdatang.php';
  }

 ?>
