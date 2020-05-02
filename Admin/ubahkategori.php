<h2> Ubah Kategori </h2>

<?php
$data = $koneksi->query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
$detail=$data->fetch_assoc();
?>


<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label> Nama Kategori </label>
        <input type="text" class="form-control" name="nama" value="<?php echo $detail['nama_kategori']; ?>">
    </div>
    
    <button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php 
if (isset($_POST['ubah'])) {

        $koneksi->query("UPDATE kategori SET nama_kategori='$_POST[nama]'
        WHERE id_kategori='$_GET[id]' ");

    echo "<script>alert('Data Kategori Berhasil Diubah');</script>";
    echo "<script>location='index.php?halaman=kategori';</script>";
}
?>
