<?php
$datakategori=array();

$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()){
	$datakategori[] = $tiap;
}

?>

<h2> Tambah Produk </h2>

<form method="POST" enctype="multipart/form-data">

	<div class="form-group">
		<label>Kategori</label>
		<select class=form-control name="id_kategori">
			<option value="">Pilih Kategori</option>
			<?php foreach ($datakategori as $key => $value):?>
				<option value="<?php echo $value["id_kategori"] ?>"><?php echo $value["nama_kategori"];?>
				</option>
			<?php endforeach?>
		</select>
	</div>

    <div class="form-group">
        <label> Nama </label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label> Harga (Rp) </label>
        <input type="number" class="form-control" name="harga">
    </div>
    <div class="form-group">
        <label> Berat (gr) </label>
        <input type="number" class="form-control" name="berat">
    </div>
    <div class="form-group">
        <label> Deskripsi </label>
        <textarea class="form-control" name="deskripsi" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label> Foto </label>
        <div class="letak-input" style="margin-bottom: 10px;">
        	<input type="file" class="form-control" name="foto[]">
        </div>
        <span class="btn btn-primary btn-tambah">
        	<i class="fa fa-plus"></i>
        </span>
    </div>
    <button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php 
if (isset($_POST['save'])) {
    $nama = $_FILES['foto']['name'];
    $lokasi =$_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi[0], "./foto_produk/".$nama[0]);
    $koneksi->query("INSERT INTO produk(nama_produk,harga_produk, berat_produk, foto_produk, deskripsi_produk, id_kategori)
    VALUES('$_POST[nama]','$_POST[harga]','$_POST[berat]','$nama[0]', '$_POST[deskripsi]', '$_POST[id_kategori]')");

    $new_id_produk = $koneksi->insert_id;

    foreach ($nama as $key => $tiap_nama) {
    	$tiap_lokasi = $lokasi[$key];

    	move_uploaded_file($tiap_lokasi, "./foto_produk/".$tiap_nama);

    	$koneksi->query("INSERT INTO produk_foto (id_produk, nama_produk_foto)
    		VALUES ('$new_id_produk', '$tiap_nama') ");
    }

    echo "<script> alert('Produk Berhasil Ditambahkan'); </script>";
    echo " <meta http-equiv='refresh' content='l;url=index.php?halaman=produk'> ";

}
?>

<script>
	$(document).ready(function(){
		$(".btn-tambah").on("click", function(){
			$(".letak-input").append("<input type='file' class='form-control' name='foto[]'>");
		})
	})
</script>