<?php
  include "../../koneksi.php";
  $query = mysqli_query($koneksi,"SELECT * FROM tb_harga");

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
    </head>
    <body class="sb-nav-fixed">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Daftar Harga</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Daftar Harga</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                  <a href="?halaman=tambahharga" class="btn btn-success">Tambah</a>
                                  <br><br>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        if(mysqli_num_rows($query)>0){ ?>
                                        <?php
                                            $num=0;
                                            while($data = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                          <td><?=$num=$num+1;?></td>
                                          <td><?php echo $data["id_brg"];?></td>
                                          <td><?php echo $data["nama_brg"];?></td>
                                          <td>Rp. <?php echo $data["harga_brg"];?></td>
                                          <td>
                                            <a href="?halaman=hapusharga&id=<?=$data['id_brg'];?>" class="btn btn-success">Delete</a> |
                                            <a href="?halaman=editharga&id=<?=$data['id_brg'];?>" class="btn btn-success">Update</a>
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
                    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js" ></script>
    </body>
</html>
