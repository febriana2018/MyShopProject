<?php
session_start();
include 'koneksi.php';
?>

<?php
$id_produk = $_GET['id'];

$data=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail=$data->fetch_assoc();
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
        <h1> Detail Produk</h1>

        <div class="row">
            <div class="col-md-6">
                <img src="Admin/foto_produk/<?php echo $detail["foto_produk"]; ?>" class="img-responsive" width="500">
            </div>
            <div class="col-md-6">
                <h2><?php echo $detail["nama_produk"]; ?></h2> 
                <h4>Rp. <?php echo number_format($detail["harga_produk"]); ?></h4>

                <form>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="number" min="1" class="form-control" name="jumlah">
                            <div class="input-group-btn">
                                <button class="btn btn-primary" name="beli"> Beli </button>
                            </div>
                        </div>
                    </div>
                </form>

                <?php
                if (isset($_POST["beli"])) {
                    $jumlah = $_POST["jumlah"];
                    $_SESSION["keranjang"][$id_produk] = $jumlah;
                    echo "<script>alert ('Produk telah masuk keranjang')</script>";
                    echo "<script>location='keranjang.php'</script>";
                }
                ?>

                <p><?php echo $detail["deskripsi_produk"]; ?></p>
            </div>
        </div>
    </div>
</section>

</body>
</html>