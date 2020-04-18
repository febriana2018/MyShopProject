<?php
session_start();
include 'koneksi.php';

if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
    echo "<script>alert ('Keranjang kosong. Silahkan belanja dulu!')</script>";
    echo "<script>location='index.php'</script>";
}


if (!isset($_SESSION['pelanggan'])) {
    echo "<script>alert('Silahkan Login Terlebih Dahulu')</script>";
    echo "<script>location='login.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Checkout</title>
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
        <h1> Checkout Produk </h1>
        <table class="table table-bordered">
            <thead>
                <tr> 
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>SubHarga</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
            <?php $total=0; ?>
            <?php foreach($_SESSION["keranjang"] as $id_produk => $jumlah):?>
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
                </tr>
                <?php $no++; ?>
                <?php $total+=$subharga; ?>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total Belanja</th>
                    <th>Rp <?php echo number_format($total) ?></th>
                </tr>
            </tfoot>
        </table>
        
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['telepon'] ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <select class="form-control" name="id_ongkir">
                        <option value="">Pilih Alamat</option>
                        <?php 
                        $data=$koneksi->query("SELECT * FROM ongkir");
                        while($detail=$data->fetch_assoc()){
                            ?>
                        <option value="<?php echo $detail["id_ongkir"] ?>">
                            <?php echo $detail['kota']; ?>
                            Rp. <?php echo number_format($detail['tarif']); ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label><strong>Alamat Lengkap</strong></label>
                <textarea class="form-control" name="alamat"></textarea>
            </div>
            <button class="btn btn-primary" name="checkout">Checkout</button>
        </form>

        <?php
            if (isset($_POST["checkout"])) {
                $id_pelanggan=$_SESSION["pelanggan"]["id_pelanggan"];
                $id_ongkir=$_POST["id_ongkir"];
                $tanggal_pembelian=date("Y-m-d");
                $alamat=$_POST["alamat"];

                $data=$koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
                $detail=$data->fetch_assoc();
                $kota=$detail['kota'];
                $tarif=$detail['tarif'];

                $total_beli = $total + $tarif;

                $koneksi->query("INSERT INTO pembelian (id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian, kota, tarif, alamat) 
                VALUES ('$id_pelanggan', '$id_ongkir', '$tanggal_pembelian', '$total_beli', '$kota', '$tarif', '$alamat')");

                $id_beli = $koneksi->insert_id;

                foreach($_SESSION["keranjang"] as $id_produk=>$jumlah){
                    $data=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk' ");
                    $detail=$data->fetch_assoc();
                    $nama=$detail['nama_produk'];
                    $harga=$detail['harga_produk'];
                    $berat=$detail['berat_produk'];
                    $subberat=$detail['berat_produk']*$jumlah;
                    $subharga=$detail['harga_produk']*$jumlah;


                    $koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,jumlah, nama, harga, berat, subberat, subharga)
                    VALUES ('$id_beli', '$id_produk','$jumlah', '$nama', '$harga', '$berat', '$subberat', '$subharga')");

                unset($_SESSION["keranjang"]);

                echo "<script>alert ('Pembelian sukses')</script>";
                echo "<script>location='nota.php?id=$id_beli'</script>";
                }
            }
        ?>

    </div>
</section>

</body>

</html>