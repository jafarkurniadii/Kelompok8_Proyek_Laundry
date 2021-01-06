<?php
	$koneksi=mysqli_connect("localhost", "root", "", "db_laundry_proyek");
	if(!$koneksi){
		echo "Koneksi gagal..";	
	}
?>