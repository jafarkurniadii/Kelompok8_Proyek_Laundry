<?php

  include "../../koneksi.php";
  session_start();
  $query = mysqli_query($koneksi,"SELECT * FROM tb_pelanggan where nama_hotel = '$_SESSION[nama]'");

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible"  content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pelanggan Ratu Clean</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-light bg-secondary">
            <a class="navbar-brand" href="index.html">Ratu Clean</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                        <a class="btn btn-dark" href="../index.html">Logout</a>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Utama</div>
                                  <a class="nav-link" href="?halaman=homepage">Homepage</a>

                    </div>

                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <?php include "conten_admin.php";?>
                        <br><br>
                        <div class="card-body">
                            <div class="table-responsive">
                                <h3> Data Anda </h3>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Hotel</th>
                                            <th>Alamat Hotel</th>
                                            <th>No Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php if(mysqli_num_rows($query)>0){ ?>
                                    <?php
                                        while($data = mysqli_fetch_array($query)){
                                    ?>
                                    <tr>
                                        <td><?php echo $data["no"]; ?></td>
                                        <td><?php echo $data["nama_hotel"];?></td>
                                        <td><?php echo $data["alamat_hotel"];?></td>
                                        <td><?php echo $data["no_tel"];?></td>
                                        <td>
                                          <a href="?halaman=editpelanggan&no=<?=$data['no'];?>" class="btn btn-warning">Update</a>
                                        </td>
                                    </tr>
                                    <?php }} ?>
                                </table>
                                <br><br><br>
                                <h3> History Transaksi </h3>

                                <?php
                                $query1 = mysqli_query($koneksi,"SELECT * FROM tb_transaksi where nama_hotel = '$_SESSION[nama]'");
                                ?>

                                <table class="table table-hover table-bordered">
                                <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>Nama Hotel</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                  </tr>
                                  <?php if(mysqli_num_rows($query1)>0){ ?>
                                    <?php
                                        while($data = mysqli_fetch_array($query1)){
                                    ?>
                                </thead>
                                  <tr>
                                    <td><?php echo $data["id"];?></td>
                                    <td><?php echo $data["nama_hotel"];?></td>
                                    <td><?php echo $data["tanggal_masuk"];?></td>
                                    <td><?php echo $data["total"];?></td>
                                    <td><?php echo $data["status"];?></td>
                                    </tr>
                                  <?php }} ?>
                              </table>
                        </div>
                    </div>
                </div>
                    </div>

                </main>
            </div>
        </div>
    </body>
</html>
