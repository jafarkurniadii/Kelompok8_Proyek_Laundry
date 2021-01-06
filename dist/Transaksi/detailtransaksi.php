<?php
  include "../../koneksi.php";

    $id_transaksi = $_GET['id_transaksi'];
    $sql=mysqli_query($koneksi,"SELECT * FROM tb_transaksi where id_transaksi = '$id_transaksi'");
         while ($data_input=mysqli_fetch_array($sql))
         {
           $query = mysqli_query($koneksi,"SELECT nama_brg, jumlah_brg FROM tb_sub_transaksi WHERE id = $data_input[id]");
         }  
 ?>
<body>
	<table class="table table-bordered">
         <thead>
            <tr>
               <th>Nama Barang</th>
               <th>Jumlah</th>
            </tr>
         </thead>
             <?php 
                if(mysqli_num_rows($query)>0){ ?>
                    <?php
                        $num=0;
                        while($data = mysqli_fetch_array($query)){
                ?>
                     <tr>
                        <td><?php echo $data["nama_brg"];?></td>
                        <td><?php echo $data["jumlah_brg"];?></td>
                 	</tr>
                 <?php }} ?>
             </table>
</body>