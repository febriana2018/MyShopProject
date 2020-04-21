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
          <a class="nav-link" href="riwayat.php">Riwayat Belanja</a>
          <a class="nav-link" href="logout.php">Logout</a>
        <?php else : ?>
        <a class="nav-link" href="login.php">Login</a>
        <a class="nav-link" href="daftar.php">Daftar</a>
      <?php endif ?>
      <li class="nav-item">
        <a class="nav-link" href="checkout.php">Checkout</a>
      </li>      
    </ul>
  </div>
</nav>