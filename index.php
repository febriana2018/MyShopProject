<?php
session_start();
include 'koneksi.php';
include 'menu.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Febri's Shop</title>
    <link rel="stylesheet" href="Admin/css/sb-admin-2.css">
</head>

<body>

<section class="konten">
    <div class="container">
        <h1> Produk Terbaru </h1>

        <div class="row">
            <?php 
            $data = $koneksi->query("SELECT * FROM produk");
            ?>
            <?php 
            while ($produk=$data->fetch_assoc()) {
            ?>
            
            <div class="col-md-3">
                <div class="img-thumbnail">
                    <img src="Admin/foto_produk/<?php echo $produk['foto_produk']; ?>" width="245" height="245">
                    <div class="caption">
                        <h3> <?php echo $produk['nama_produk']; ?> </h3>
                        <h5>Rp. <?php echo $produk['harga_produk']; ?></h5>
                        <a href="beli.php?id=<?php echo $produk['id_produk']; ?>" class="btn btn-primary">Beli</a>
                        <a href="detail.php?id=<?php echo $produk['id_produk']; ?>" class="btn btn-default">Detail</a>
                    </div>
                </div>
            </div>

            <?php } ?>

        </div>
    </div>
</section>


</body>
</html>