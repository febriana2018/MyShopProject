<?php
session_start();
include 'koneksi.php';
include 'menu.php';
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
<section class="konten">
    <div class="container">
        <h1> Detail Produk</h1>

        <div class="row">
            <div class="col-md-6">
                <img src="Admin/foto_produk/<?php echo $detail["foto_produk"]; ?>" class="img-responsive" width="500">
            </div>
            <div class="col-md-6">
                <h2><?php echo $detail["nama_produk"] ?></h2> 
                <h4>Rp. <?php echo number_format($detail["harga_produk"]); ?></h4>

                <h5>Stok : <?php echo $detail['stok_produk']?></h5>

                <form method="POST">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="number" min="1" max="<?php echo $detail['stok_produk']?>" class="form-control" name="jumlah">
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