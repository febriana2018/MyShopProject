<?php
session_start();
include 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Nota Pembelian</title>
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
    <h2> Detail Pembelian </h2>
<?php 

$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
ON pembelian.id_pelanggan = pelanggan.id_pelanggan
WHERE pembelian.id_pembelian = '$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<strong> <?php echo $detail['nama_pelanggan']; ?> </strong> <hr>
<p>
    <?php echo $detail['telepon']; ?> <br>
    <?php echo $detail['email_pelanggan']; ?> <br>
    Tanggal Beli : <?php echo $detail['tanggal_pembelian']; ?> <br> <hr>
    <strong>Alamat Pengiriman </strong>: <?php echo $detail['alamat']; ?> <br>
    <strong>Biaya Ongkir </strong>:  Rp. <?php echo number_format($detail['tarif']); ?> <br>
</p>

<div class="row">
    <div class="col-md-7">
        <div class="alert alert-info">
            <p>
                Silahkan melakukan pembayaran sebesar Rp. <?php echo number_format($detail['total_pembelian']);?>
                <br><strong>Transfer melalui BANK BNI 0000000 AN. Febriana Pamungkasari</strong>
            </p>
        </div>
    </div>
</div>

<h5><strong> Detail Produk </strong></h5>

<table class="table table-bordered">
    <thead>
        <tr>
            <th> No </th>
            <th> Nama Produk </th>
            <th> Harga </th>
            <th> Berat </th>
            <th> Jumlah </th>    
            <th> Subtotal </th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
        <?php while($detail = $ambil->fetch_assoc()) {?>
        <tr>
            <td><?php echo $no; ?> </td>
            <td><?php echo $detail['nama']; ?></td>
            <td>Rp. <?php echo number_format($detail['harga']); ?></td>
            <td><?php echo $detail['berat']; ?> gr</td>
            <td><?php echo $detail['jumlah']; ?></td>  
            <td>Rp. <?php echo number_format($detail['subharga']); ?></td>  
        </tr>
        <?php $no++ ?>
        <?php } ?>
    </tbody>
</table>

    </div>
</section>
</body>
</html>
