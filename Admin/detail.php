<h2> Detail Pembelian </h2>
<?php 

$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
ON pembelian.id_pelanggan = pelanggan.id_pelanggan
WHERE pembelian.id_pembelian = '$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<strong> <?php echo $detail['nama_pelanggan']; ?> </strong> <hr>
<p>
    <?php echo $detail['telepon']; ?> <br>
    <?php echo $detail['email_pelanggan']; ?>
</p>

<p>
    Tanggal Beli : <?php echo $detail['tanggal_pembelian']; ?> <br>
    Total : <?php echo $detail['total_pembelian']; ?>
</p>

<table class="table table-bordered">
    <thead>
        <tr>
            <th> No </th>
            <th> Nama Produk </th>
            <th> Harga </th>
            <th> Jumlah </th>    
            <th> Subtotal </th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON 
        pembelian_produk.id_produk=produk.id_produk 
        WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
        <?php while($detail = $ambil->fetch_assoc()) {?>
        <tr>
            <td><?php echo $no; ?> </td>
            <td><?php echo $detail['nama_produk']; ?></td>
            <td><?php echo $detail['harga_produk']; ?></td>
            <td><?php echo $detail['jumlah']; ?></td>    
            <td> 
                <?php echo $detail['harga_produk']*$detail['jumlah']; ?>
            </td>
        </tr>
        <?php $no++ ?>
        <?php } ?>
    </tbody>
</table>

