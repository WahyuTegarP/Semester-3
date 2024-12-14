<!DOCTYPE html>
<html lang="en">

<head>
  <title>BiruhijauStudio - Rental Equipment & Studio</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
    rel="stylesheet">

    <link rel="icon" href="assets/user/images/biruhijauicon.png">
  <link rel="stylesheet" href="assets/user/css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="assets/user/css/animate.css">

  <link rel="stylesheet" href="assets/user/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/user/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="assets/user/css/magnific-popup.css">

  <link rel="stylesheet" href="assets/user/css/aos.css">

  <link rel="stylesheet" href="assets/user/css/ionicons.min.css">

  <link rel="stylesheet" href="assets/user/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="assets/user/css/jquery.timepicker.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">


  <link rel="stylesheet" href="assets/user/css/flaticon.css">
  <link rel="stylesheet" href="assets/user/css/icomoon.css">
  <link rel="stylesheet" href="assets/user/css/style.css">
</head>

<body>

  <!-- START nav -->
   <?php include "pages/layouts/user/navbar.php"; ?>
  <!-- END nav -->

  <!-- START content -->
    <?php
      $hal = @$_GET['hal'];
      $beranda = "pages/user/beranda.php";
      $p = "pages/user/$hal.php";
      if(!empty($hal) && file_exists($p)){
          include "$p";
      }else{
          include "$beranda";
      }
    ?>
  <!-- END content -->

  <!-- START footer -->
   <?php include "pages/layouts/user/footer.php"?>
  <!-- END footer -->


  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#F96D00" />
    </svg>
  </div>


  <script src="assets/user/js/jquery.min.js"></script>
  <script src="assets/user/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="assets/user/js/popper.min.js"></script>
  <script src="assets/user/js/bootstrap.min.js"></script>
  <script src="assets/user/js/jquery.easing.1.3.js"></script>
  <script src="assets/user/js/jquery.waypoints.min.js"></script>
  <script src="assets/user/js/jquery.stellar.min.js"></script>
  <script src="assets/user/js/owl.carousel.min.js"></script>
  <script src="assets/user/js/jquery.magnific-popup.min.js"></script>
  <script src="assets/user/js/aos.js"></script>
  <script src="assets/user/js/jquery.animateNumber.min.js"></script>
  <script src="assets/user/js/bootstrap-datepicker.js"></script>
  <script src="assets/user/js/jquery.timepicker.min.js"></script>
  <script src="assets/user/js/scrollax.min.js"></script>
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="assets/user/js/google-map.js"></script>
  <script src="assets/user/js/main.js"></script>

</body>
</html>