<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Febri's Shop</title>
    <link rel="stylesheet" href="Admin/css/sb-admin-2.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="keranjang.php">Keranjang</a>
      </li>
      <?php if (isset($_SESSION['pelanggan'])): ?>
          <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
        <?php else : ?>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <?php endif ?>
      <li class="nav-item">
        <a class="nav-link" href="checkout.php">Checkout</a>
      </li>      
    </ul>
  </div>
</nav>
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