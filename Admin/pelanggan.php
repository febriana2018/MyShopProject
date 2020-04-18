<h2> Data Pelanggan </h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th> No </th>
            <th> Nama Pelanggan </th>
            <th> Email </th>
            <th> Telepon </th>    
            <th> Aksi </th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        <?php $data = $koneksi->query("SELECT * FROM pelanggan"); ?>
        <?php while($detail = $data->fetch_assoc()) {?>
        <tr>
            <td><?php echo $no; ?> </td>
            <td><?php echo $detail['nama_pelanggan']; ?></td>
            <td><?php echo $detail['email_pelanggan']; ?></td>
            <td><?php echo $detail['telepon']; ?></td>    
            <td> 
                <a href=""  class="btn-danger btn"> Hapus </a>
            </td>
        </tr>
        <?php $no++ ?>
        <?php } ?>
    </tbody>
</table>