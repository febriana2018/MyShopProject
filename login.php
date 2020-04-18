<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Pelanggan</title>
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
            echo "<script>location='checkout.php'</script>";
        }else {
            echo "<div class='alert alert-danger'>Login Gagal</div>";
            echo "<script>location='login.php'</script>";
        }
}

?>


</body>
</html>
