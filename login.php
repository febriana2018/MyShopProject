<?php
session_start();
include 'koneksi.php';
include 'menu.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Pelanggan</title>
    <link rel="stylesheet" href="Admin/css/sb-admin-2.css">
</head>

<body>
<div class="container">
        <h1> Produk Terbaru </h1>

        <div class="row">
            <div class="col-md-3">
                <div class="img-thumbnail">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Login Pelanggan</h3>
                        </div>
                        <div class="panel-body">
                            <form method="post">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <button class="btn btn-primary" name="simpan">Login</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<?php 
if(isset($_POST['simpan'])){
    $email=$_POST["email"];
    $password =$_POST['password'];
    $data =$koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$_POST[email]' AND password_pelanggan='$_POST[password]'");
    $cek= $data->num_rows;
        if ($cek==1) {
            $_SESSION['pelanggan']=$data->fetch_assoc();
            echo "<div class='alert alert-info'>Login Sukses</div>";
            
            if(isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]))
            {
              echo "<script>location='checkout.php'</script>";
            }
            else
            {
              echo "<script>location='riwayat.php';</script>";
            }
        }else {
            echo "<div class='alert alert-danger'>Login Gagal</div>";
            echo "<script>location='login.php'</script>";
        }
}

?>


</body>
</html>
