<?php
session_start();
include 'koneksi.php';
include 'menu.php';
$id_pembelian = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembayaran
    LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian 
    WHERE pembelian.id_pembelian='$id_pembelian'");
$detail_bayar = $ambil->fetch_assoc();

if(empty($detail_bayar))
{
    echo "<script>location='riwayat.php';</script>";
    exit();
}

if ($_SESSION["pelanggan"]['id_pelanggan']!==$detail_bayar["id_pelanggan"]) 
{
    echo "<script>location='riwayat.php';</script>";
    exit();   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Febri's Shop</title>
    <link rel="stylesheet" href="Admin/css/sb-admin-2.css">
</head>
<body>
    <div class="container">
        <h3>Lihat Pembayaran</h3>
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <td><?php echo $detail_bayar["nama"] ?></td>
                    </tr>
                    <tr>
                        <th>Bank</th>
                        <td><?php echo $detail_bayar["bank"] ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td><?php echo $detail_bayar["tanggal"] ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>Rp. <?php echo number_format($detail_bayar["jumlah"]) ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <img src="bukti_pembayaran/<?php echo $detail_bayar["bukti"]?>" alt="" class="img-responsive">
            </div>
        </div>
    </div>
</body>
</html>