<?php
session_start();
include 'koneksi.php';

if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
    echo "<script>alert ('Keranjang kosong. Silahkan belanja dulu!')</script>";
    echo "<script>location='index.php'</script>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Keranjang Belanja</title>
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
        <h1> Keranjang Belanja </h1> <hr>
        <table class="table table-bordered">
            <thead>
                <tr> 
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>SubHarga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
            <?php
                foreach ($_SESSION["keranjang"] as $id_produk => $jumlah):
            ?>
            <?php
                $data=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                $detail= $data->fetch_assoc();
                $subharga=$detail["harga_produk"]*$jumlah;
            ?>

                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $detail["nama_produk"] ?></td>
                    <td><?php echo number_format($detail["harga_produk"]) ?></td>
                    <td><?php echo $jumlah ?></td>
                    <td><?php echo number_format($subharga) ?></td>
                    <td>
                        <a href="hapuskeranjang.php?id=<?php echo $id_produk ?>"" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php $no++; ?>
            <?php endforeach ?>
            </tbody>
        </table>
        
        <a href="index.php" class="btn btn-default">Lanjutkan Belanja </a>
        <a href="checkout.php" class="btn btn-primary">Checkout</a>

    </div>
</section>
</body>

</html>