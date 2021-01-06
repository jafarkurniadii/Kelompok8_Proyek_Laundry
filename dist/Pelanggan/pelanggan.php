<?php
  include "../../koneksi.php";
  $query = mysqli_query($koneksi,"SELECT * FROM tb_pelanggan");

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
        <link href="../css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    </head>
    <body class="sb-nav-fixed">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data Pelanggan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Pelanggan</li>
                        </ol>
                        <div class="card mb-4">

                            <div class="card-body">
                                <div class="table-responsive">
                                  <a href="?halaman=tambahpelanggan" class="btn btn-success">Tambah</a>
                                  <br><br>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Hotel</th>
                                                <th>Alamat Hotel</th>
                                                <th>Nomor Telepon</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <?php if(mysqli_num_rows($query)>0){ ?>
                                        <?php
                                            while($data = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                            <td><?php echo $data["no"];?></td>
                                            <td><?php echo $data["nama_hotel"];?></td>
                                            <td><?php echo $data["alamat_hotel"];?></td>
                                            <td><?php echo $data["no_tel"];?></td>
                                            <td>
                                              <a href="?halaman=hapuspelanggan&no=<?=$data['no'];?>" class="btn btn-success">Delete</a> |
                                              <a href="?halaman=editpelanggan&no=<?=$data['no'];?>" class="btn btn-success">Update</a>
                                            </td>
                                        </tr>
                                        <?php }} ?>
                                    </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
