<?php
  include "../../koneksi.php";
  $query = mysqli_query($koneksi,"SELECT * FROM tb_pengeluaran");

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
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Pengeluaran</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Pengeluaran</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <a href="?halaman=tambahpengeluaran" class="btn btn-success">Tambah</a>
                                        <br><br>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Nama</th>
                                                <th>Total</th>
                                                <th style="width: 20%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <?php if(mysqli_num_rows($query)>0){ ?>
                                        <?php
                                            while($data = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                            <td><?php echo $data["no_pengeluaran"]; ?></td>
                                            <td><?php echo $data["tgl_pengeluaran"];?></td>
                                            <td><?php echo $data["nama_pengeluaran"];?></td>
                                            <td>Rp. <?php echo $data["total_pengeluaran"];?></td>
                                            <td>
                                                <a href="?halaman=hapuspengeluaran&no=<?php echo $data["no_pengeluaran"];?>" class="btn btn-success">Delete</a> |
                                                <a href="?halaman=editpengeluaran&no=<?php echo $data["no_pengeluaran"];?>" class="btn btn-success">Update</a>
                                            </td>
                                        </tr>
                                        <?php }} ?>
                                        <tr>
                                          <td colspan="4">Total Pengeluaran</td>
                                          <td></td>
                                        </tr>
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
