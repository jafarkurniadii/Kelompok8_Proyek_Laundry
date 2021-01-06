<?php
	include "../../koneksi.php";
	$no=$_GET['no'];

	$query = mysqli_query($koneksi,"DELETE FROM tb_pelanggan WHERE no = '$no'");
	if($query){
	echo "<script>document.location='?halaman=tampilpelanggan'</script>";
	} else {
		echo "Data Gagal Dihapus";
	}
?>
