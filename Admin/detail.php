<h2> Detail Pembelian </h2>
<?php 

$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
ON pembelian.id_pelanggan = pelanggan.id_pelanggan
WHERE pembelian.id_pembelian = '$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<div class="row">
    <div class="col-md-4">
        <h3>Pembelian</h3>
        <p>
            Tanggal Beli : <?php echo $detail['tanggal_pembelian']; ?> <br>
            Total : Rp. <?php echo number_format($detail['total_pembelian']); ?> <br>
            Status : <?php echo $detail['status_pembelian']; ?>
        </p>
    </div>
    <div class="col-md-4">
        <h3>Pelanggan</h3>
        <strong> <?php echo $detail['nama_pelanggan']; ?> </strong> <hr>
        <p>
            <?php echo $detail['telepon']; ?> <br>
            <?php echo $detail['email_pelanggan']; ?>
        </p>
    </div>
    <div class="col-md-4">
        <h3>Pengiriman</h3>
        <strong><?php echo $detail["kota"];?></strong><br>
        <p>
           Tarif : Rp. <?php echo number_format($detail["tarif"]);?><br>
           Alamat : <?php echo $detail["alamat_pelanggan"]; ?> 
        </p>
    </div>
</div>

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
            <td>Rp. <?php echo number_format ($detail['harga_produk']); ?></td>
            <td><?php echo $detail['jumlah']; ?></td>    
            <td> 
               Rp. <?php echo number_format($detail['harga_produk']*$detail['jumlah']); ?>
            </td>
        </tr>
        <?php $no++ ?>
        <?php } ?>
    </tbody>
</table>

