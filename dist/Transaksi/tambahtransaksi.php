<?php
  //koneksi database
  include "../../koneksi.php";
      @$id_transaksi= $_GET['id'];
      $query_hotel = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan");
      $data_hotel = mysqli_fetch_assoc($query_hotel);
      $query_harga = mysqli_query($koneksi, "SELECT * FROM tb_harga");
      $data_harga = mysqli_fetch_assoc($query_harga);

      $query_transaksi = mysqli_query($koneksi, "SELECT MAX(id) as noTerbesar FROM tb_transaksi_sementara");
      $data_transaksi = mysqli_fetch_array($query_transaksi);
      $noTransaksi = $data_transaksi['noTerbesar'];
      $urutan = (int) substr($noTransaksi, 1, 3);
      $urutan++;
      $noq = sprintf("%03s",$urutan);
  //ambil data dari tiap element dalam form
  if (isset($_POST['simpan']))
    {
      $id_transaksi = $_POST['id'];
      $nama_brg = $_POST['nama_brg'];
      $data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT harga_brg FROM tb_harga where nama_brg = '$nama_brg'"));
      $jumlah_brg = $_POST['jumlah_brg'];
      $total_harga = $jumlah_brg * floatval($data['harga_brg']);
        //query insert data
        $query = mysqli_query($koneksi,"INSERT INTO tb_transaksi_sementara (id, nama_brg, jumlah_brg, 
        total_harga) VALUES ( '$id_transaksi', '$nama_brg','$jumlah_brg','$total_harga')");
        if ($query) {

        }
        else {
          echo "Data gagal disimpan"
          or (mysqli_error());
        }
      }

      if (isset($_POST['submit']))
      {

         $id_transaksi = $_POST['id'];
         $nama_hotel = $_POST['nama_hotel'];
         $tanggal_masuk = $_POST['tanggal_masuk'];
         $total = $_POST['total'];
         $status = $_POST['status'];
         $bayar = $_POST['bayar'];

         $sql=mysqli_query($koneksi,"SELECT * FROM tb_transaksi_sementara where id = '$id_transaksi'"); 
         $sql_transaksi = mysqli_query($koneksi,"INSERT INTO tb_transaksi (id, nama_hotel, tanggal_masuk, total, bayar, status) 
           VALUES ('$id_transaksi','$nama_hotel', '$tanggal_masuk', '$total', '$bayar', '$status')");

         if ($sql_transaksi) {
            echo " <script> alert('Berhasil'); 
            document.location = '?halaman=tampiltransaksi'</script>";
           }
           else {
             echo "gagal";
           }
       }
   
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Tambah Tansaksi</title>
  </head>
  <body>
    <div class="container">
        <div class="card mt-3">
          <div class="card-header bg-primary">
            <h4>Form Tambah Transaksi</h4>
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="form-group">
                    <label> ID Transaksi </label>
                    <input type="text" id="id" name="id" value="<?php echo $noq; ?>" readonly>
              </div>
              <div class = "form-group">
               <label>Pilih Barang</label>
                    <select name="nama_brg" class="browser-default">
                      <?php do { ?>
                        <option value="<?=$data_harga['nama_brg'];?>"><?=$data_harga['nama_brg'];?> @ <?=$data_harga['harga_brg'];?></option>
                        <?php } while ($data_harga = mysqli_fetch_array($query_harga)); ?></select>
              </div> 
              <br>
              <div class="form-group">
                    <label> Jumlah </label>
                    <input type="number" id="jumlah_brg" name="jumlah_brg">
              </div> 
              <br>
                  <center><button class="btn-secondary" type="submit" name="simpan"> SIMPAN </button></center>
              <br>
            <div class="form-group">
            <table class="table-bordered container">
              <thead>
                <tr>
                  <td><b>Nama Barang</b></td>
                  <td><b>Jumlah</b></td>
                  <td><b>Total</b></td>
                  <td><b>Aksi</b></td>
                </tr>
              </thead>
               <?php
                $qq=mysqli_query($koneksi, "SELECT * FROM tb_transaksi_sementara where id = '$id_transaksi'");
                $data_sem = mysqli_fetch_array($qq);
                do {
              ?>
              <tr>  
                <td><?=$data_sem['nama_brg'];?></td>
                <td><?=$data_sem['jumlah_brg'];?></td>
                <td><?=$data_sem['total_harga'];?></td>
                <td><a href="?halaman=hapustransaksisem&id_transaksi_sem=<?=$data_sem['id_transaksi_sem'];?>&
                  id=<?=$id_transaksi;?>" 
                  data-position="bottom" data-tooltip="Hapus">Delete</i></a></td>
                  <?php } while($data_sem = mysqli_fetch_array($qq)); ?>
              </tr>
               <?php
                $qqq=mysqli_query($koneksi, "SELECT SUM(total_harga) as grand_total_harga FROM tb_transaksi_sementara where id='$id_transaksi'");
                $data_sem2 = mysqli_fetch_array($qqq);
              ?>
              <tr>
                <td colspan = "2"><b> Total</b> </td>
                <td colspan = "2"> <?=$data_sem2['grand_total_harga'];?></td>
              </tr>
            </table>
          </div>
            <br>
            <br>
              <div class= "form-group">
               <form action="" method="post">
               <label>Nama Hotel : </label>
                  <select name="nama_hotel" class="browser-default">
                    <?php do { ?>
                      <option value="<?=$data_hotel['nama_hotel'];?>"><?=$data_hotel['nama_hotel'];?></option>
                    <?php } while ($data_hotel = mysqli_fetch_array($query_hotel)); ?></select>
              </div> 
              <div class="form-group">
                <label> Tanggal Masuk </label>
                <input type="date" id="tgl_masuk" name="tanggal_masuk">
             </div>
             <div class="form-group">
                <label> Total </label>
                <input type="number" name="total" value="<?=$data_sem2['grand_total_harga'];?>">
              </div>
              <div class="form-group">
                     <label>Bayar</label>
                     <input type="number" name="bayar">
               </div>
              <div class="form-group">
                <label> Status </label>
                <select name="status" class="browser-default">
                  <option value="Belum dibayar">Belum dibayar</option>
                  <option value="Sudah dibayar">Sudah dibayar</option>
                </select>
              </div>
              <form action="" method="post">
                <center><button class="btn-secondary" type="submit" name="submit"> Submit </button></center>
                </form>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js" ></script>

</html>