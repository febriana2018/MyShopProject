<?php include 'koneksi.php'; ?>
<?php
$keyword=$_GET["keyword"];

$semuadata=array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'
	OR deskripsi_produk LIKE '%$keyword%' ");
while($pecah = $ambil->fetch_assoc()){
	$semuadata[]=$pecah;
}

//echo "<pre>";
//print_r($semuadata);
//echo "</pre>";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pencarian</title>
	<link rel="stylesheet" href="Admin/css/sb-admin-2.css">
</head>
<body>
	<?php include 'menu.php';?>
	<div class="container">
		<h2>Hasil Pencarian <?php echo $keyword ?></h2>

		<?php if (empty($semuadata)):?>
			<div class="alert alert-danger">Produk <b><?php echo $keyword?></b> tidak ditemukan</div>
		<?php endif ?>

		<div class="row">

			<?php foreach ($semuadata as $key => $value): ?> 
			<div class="col-md-3">
				<div class="img-thumbnail">
					<img src="Admin/foto_produk/<?php echo $value["foto_produk"] ?>" width="245" height="245" alt="" class="img_responsive">
					<div class="caption">
						<h3><?php echo $value["nama_produk"]?></h3>
						<h5>Rp <?php echo number_format($value['harga_produk'])?></h5>
						<a href="beli.php?id=<?php echo $value['id_produk']; ?>"  class="btn btn-primary">Beli</a>
						<a href="detail.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-default">Detail</a>
					</div>
				</div>
			</div>
			<?php endforeach?>
		</div>
	</div>
</body>
</html>