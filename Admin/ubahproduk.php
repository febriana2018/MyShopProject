<h2> Ubah Produk </h2>

<?php
$data = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$detail=$data->fetch_assoc();
?>

<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label> Nama Produk </label>
        <input type="text" class="form-control" name="nama" value="<?php echo $detail['nama_produk']; ?>">
    </div>
    <div class="form-group">
        <label> Harga (Rp) </label>
        <input type="number" class="form-control" name="harga" value="<?php echo $detail['harga_produk']; ?>">
    </div>
    <div class="form-group">
        <label> Berat (gr) </label>
        <input type="number" class="form-control" name="berat" value="<?php echo $detail['berat_produk']; ?>">
    </div>
    <div class="form-group">
        <label> Deskripsi </label>
        <textarea class="form-control" name="deskripsi" rows="10"><?php echo $detail['deskripsi_produk']; ?> </textarea>
    </div>
    <div class="form-group">
        <label> Ubah Foto </label>
    </div>
    <div class="form-group">
        
        <img src="./foto_produk/<?php echo $detail['foto_produk'] ?>"  width="200">
        <input type="file" class="form-control" name="foto">
    </div>
    <button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php 
if (isset($_POST['ubah'])) {
    $namafoto=$_FILES['foto']['name'];
    $lokasifoto=$_FILES['foto']['tmp_name'];

    if(!empty($lokasifoto)){
        move_uploaded_file($lokasifoto, "./foto_produk/$namafoto");

        $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]', harga_produk='$_POST[harga]',
        berat_produk='$_POST[berat]', foto_produk='$namafoto', deskripsi_produk='$_POST[deskripsi]'
        WHERE id_produk='$_GET[id]' ");

    }else {
        $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]', harga_produk='$_POST[harga]',
        berat_produk='$_POST[berat]', deskripsi_produk='$_POST[deskripsi]'
        WHERE id_produk='$_GET[id]' ");
    }
    echo "<script>alert('Data Produk Berhasil Diubah');</script>";
    echo "<script>location='index.php?halaman=produk';</script>";
}
?>
