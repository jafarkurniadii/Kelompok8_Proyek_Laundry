<?php
  include "../../koneksi.php";
  session_start();
  $query = mysqli_query($koneksi,"SELECT * FROM tb_login");

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible"  content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Ratu Clean</title>
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
                            <a class="nav-link" href="?halaman=homepage">
                                Homepage
                            </a>
                                <div class="sb-sidenav-menu-heading">Interface</div>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                  <a class="nav-link" href="?halaman=tampiltransaksi">Transaksi</a>
                                  <a class="nav-link" href="?halaman=tampilpengguna">Pengguna</a>
                                  <a class="nav-link" href="?halaman=tampilpelanggan">Pelanggan</a>
                                  <a class="nav-link" href="?halaman=tampilproduk">Produk</a>
                                  <a class="nav-link" href="?halaman=tampiljenispengeluaran">Jenis Pengeluaran</a>
                                  <a class="nav-link" href="?halaman=tampilpengeluaran">Pengeluaran</a>
                                </div>
                            </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <?php include "conten_admin.php";?>
                    </div>

                </main>
            </div>
        </div>
    </body>
</html>
