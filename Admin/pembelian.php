<h2> Data Pembelian </h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th> No </th>
            <th> Nama Pelanggan </th>
            <th> Tanggal </th>
            <th> Status Pembelian </th>
            <th> Total </th>    
            <th> Aksi </th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        <?php $data = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON 
        pembelian.id_pelanggan = pelanggan.id_pelanggan"); ?>
        <?php while($detail = $data->fetch_assoc()) {?>
        <tr>
            <td><?php echo $no; ?> </td>
            <td><?php echo $detail['nama_pelanggan']; ?></td>
            <td><?php echo $detail['tanggal_pembelian']; ?></td>
            <td><?php echo $detail['status_pembelian']; ?></td>
            <td><?php echo $detail['total_pembelian']; ?></td>    
            <td> 
                <a href="index.php?halaman=detail&id=<?php echo $detail['id_pembelian']; ?>"  class="btn btn-info"> Detail </a>

                <?php if($detail['status_pembelian']!=="pending"): ?>
                <a href="index.php?halaman=pembayaran&id=<?php echo $detail['id_pembelian'] ?>" class="btn btn-success">Lihat Pembayaran</a>
                <?php endif ?>
            </td>
        </tr>
        <?php $no++ ?>
        <?php } ?>
    </tbody>
</table>