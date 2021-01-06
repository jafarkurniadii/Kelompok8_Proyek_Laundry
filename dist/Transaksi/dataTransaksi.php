<?php
  include "../../koneksi.php";
  $query = mysqli_query($koneksi,"SELECT * FROM tb_transaksi where nama_hotel = '$_SESSION[nama]'");

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard Ratu Clean</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data Transaksi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Transaksi</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">

                            <div class="container">
                              <table class="table table-hover table-bordered">
                                <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>Nama Hotel</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                  </tr>
                                  <?php 
                                    if(mysqli_num_rows($query)>0){ 
                                  ?>
                                  <?php
                                    while($data = mysqli_fetch_array($query)){
                                  ?>
                                </thead>
                                  <tr>
                                    <td><?php echo $data["id"];?></td>
                                    <td><?php echo $data["nama_hotel"];?></td>
                                    <td><?php echo $data["tanggal_masuk"];?></td>
                                    <td><?php echo $data["total"];?></td>
                                    <td><?php echo $data["status"];?></td>
                                    <td>
                                  <?php }} ?>
                              </table>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
            <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js" ></script>

    </body>
</html>

