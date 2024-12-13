<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="index.php">Biruhijau<span>Production</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item <?php if(@$_GET['hal'] == 'beranda') {echo 'active';}?>"><a href="?hal=beranda" class="nav-link">Home</a></li>
        <li class="nav-item <?php if(@$_GET['hal'] == 'about') {echo 'active';}?>"><a href="?hal=about" class="nav-link">About</a></li>
        <li class="nav-item <?php if(@$_GET['hal'] == 'services') {echo 'active';}?>"><a href="?hal=services" class="nav-link">Services</a></li>
        <li class="nav-item <?php if(@$_GET['hal'] == 'pricing') {echo 'active';}?>"><a href="?hal=pricing" class="nav-link">Pricing</a></li>
        <li class="nav-item <?php if(@$_GET['hal'] == 'rental') {echo 'active';}?>"><a href="?hal=rental" class="nav-link">Rental</a></li>
        <li class="nav-item <?php if(@$_GET['hal'] == 'blog') {echo 'active';}?>"><a href="?hal=blog" class="nav-link">Blog</a></li>
        <li class="nav-item <?php if(@$_GET['hal'] == 'contact') {echo 'active';}?>"><a href="?hal=contact" class="nav-link">Contact</a></li>
        <li class="nav-item <?php if(@$_GET['hal'] == 'login') {echo 'active';}?>"><a href="?hal=login" class="nav-link">Login</a></li>
      </ul>
    </div>
  </div>
</nav>