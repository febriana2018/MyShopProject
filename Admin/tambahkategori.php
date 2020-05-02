<?php
$datakategori=array();

$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()){
	$datakategori[] = $tiap;
}

?>

<h2> Tambah Kategori</h2>

<form method="POST" enctype="multipart/form-data">


    <div class="form-group">
        <label> Nama </label>
        <input type="text" class="form-control" name="nama">
    </div>
    
    <button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php 
if (isset($_POST['save'])) {
    $koneksi->query("INSERT INTO kategori(nama_kategori)
    VALUES('$_POST[nama]')");


    echo "<script> alert('Kategori Berhasil Ditambahkan'); </script>";
    echo " <meta http-equiv='refresh' content='l;url=index.php?halaman=kategori'> ";

}
?>
