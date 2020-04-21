<?php
session_start();
include 'koneksi.php';
include 'menu.php';

if(!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
    echo "<script> alert('Silahkan melakukan login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

$id_pembelian = $_GET["id"];
$ambil = $koneksi -> query("SELECT * FROM pembelian WHERE id_pembelian = '$id_pembelian'");
$detail_pembelian = $ambil->fetch_assoc();

$id_buy = $detail_pembelian["id_pelanggan"];
$id_login = $_SESSION["pelanggan"]["id_pelanggan"];

if($id_buy!==$id_login)
{
    echo "<script>location='riwayat.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pembayaran</title>
    <link rel="stylesheet" href="Admin/css/sb-admin-2.css">
</head>
<body>
    <div class="container">
        <h2>Konfirmasi Pembayaran</h2>
        <p>Kirim bukti pembayaran Anda di sini</p>
        <div class="alert alert-info">Total tagihan anda sebesar
            <strong>Rp. <?php echo number_format($detail_pembelian["total_pembelian"]) ?></strong>
        </div>

        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label> Nama Penyetor </label>
                <input type="text" class="form-control" name="nama">
            </div>

            <div class="form-group">
                <label> Bank </label>
                <input type="text" class="form-control" name="bank">
            </div>

            <div class="form-group">
                <label> Jumlah </label>
                <input type="number" class="form-control" name="jumlah" min="1">
            </div>

            <div class="form-group">
                <label> Foto Bukti </label>
                <input type="file" class="form-control" name="bukti">
                <p class="text-danger"> Foto bukti pembayaran harus berformat .jpg dengan ukuran file maksimal 2MB </p>
            </div>
            
            <button class="btn btn-primary" name="kirim">Kirim</button>
        </form>
    </div>

<?php
if(isset($_POST["kirim"]))
{
    $namabukti = $_FILES["bukti"]["name"];
    $lokasibukti = $_FILES["bukti"]["tmp_name"];
    $namafix = date("YmdHis").$namabukti;
    move_uploaded_file($lokasibukti,"bukti_pembayaran/$namafix");

    $nama = $_POST["nama"];
    $bank = $_POST["bank"];
    $jumlah = $_POST["jumlah"];
    $tanggal = date("Y-m-d");

    $koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)
        VALUES ('$id_pembelian','$nama','$bank','$jumlah','$tanggal','$namafix')");

    $koneksi->query("UPDATE pembelian SET status_pembelian='Sudah kirim bukti pembayaran'
        WHERE id_pembelian='$id_pembelian'");
    
    echo "<script>alert('Bukti pembayaran sudah dikirim');</script>";
    echo "<script>location='riwayat.php';</script>";
}
?>
</body>
</html>