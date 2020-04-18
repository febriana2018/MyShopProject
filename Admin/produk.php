<h2> Data Produk 
<a href="index.php?halaman=tambahproduk" class="btn btn-primary"> Tambah Data </a> <br>
</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th> No </th>
            <th> Nama </th>
            <th> Harga </th>
            <th> Berat </th>    
            <th> Foto </th>
            <th> Aksi </th>
        </tr>
    </thead>
    <tbody>
        <?php $no =1 ?>
        <?php $data = $koneksi->query("SELECT * FROM produk"); ?>
        <?php while($detail = $data->fetch_assoc()) {?>
        <tr>
            <td><?php echo $no; ?> </td>
            <td><?php echo $detail['nama_produk'];?></td>
            <td><?php echo $detail['harga_produk'];?></td>
            <td><?php echo $detail['berat_produk'];?> </td>    
            <td>
                <img src="./foto_produk/<?php echo $detail['foto_produk']; ?>" width ="100">
            </td>
            <td>
                <a href="index.php?halaman=hapusproduk&id=<?php echo $detail['id_produk']; ?>" class="btn-danger btn"> Hapus </a>
                <a href="index.php?halaman=ubahproduk&id=<?php echo $detail['id_produk']; ?>" class="btn btn-warning"> Ubah </a>
            </td>
        </tr>
        <?php $no++; ?>
        <?php } ?>
    </tbody>
</table>