<?php 

$data = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$detail = $data->fetch_assoc();
$fotoproduk = $detail['foto_produk'];
if (file_exists("./foto_produk/$fotoproduk")) {
    unlink("./foto_produk/$fotoproduk");
}

$koneksi->query("DELETE FROM produk WHERE id_produk='$_GET[id]'");

echo "<script> alert('Produk Terhapus'); </script>";
echo "<script> location='index.php?halaman=produk; </script>";

?>