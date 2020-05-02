<?php 

$data = $koneksi->query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
$detail = $data->fetch_assoc();

$koneksi->query("DELETE FROM kategori WHERE id_kategori='$_GET[id]'");

echo "<script> alert('Kategori Terhapus'); </script>";
echo "<script> location='index.php?halaman=kategori; </script>";

?>