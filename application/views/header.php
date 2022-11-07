  <!DOCTYPE html>
<html>

   <head>
      <title>Trinity Fellowship - <?=$title?></title>
      <meta charset="utf-8">
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
      <link rel="icon" href="<?= base_url() ?>public/pictures/logo/logo.png">
      <link rel="stylesheet" href="<?= base_url() ?>public/css/bootstrap.css">
      <link rel="stylesheet" href="<?= base_url() ?>public/css/all.min.css">
      <link rel="stylesheet" href="<?= base_url() ?>public/css/flexslider.css">
      <link rel="stylesheet" href="<?= base_url();?>public/css/main.css">


      <script src="<?= base_url() ?>public/js/jquery-3.6.0.min.js" type="text/javascript"></script>
      <script src="<?= base_url() ?>public/js/bootstrap.bundle.js" type="text/javascript"></script>
      <script src="<?= base_url() ?>public/js/jquery.flexslider.js"></script>
      <script src="<?= base_url() ?>public/js/scrollReveal.js"></script>
      <script src="<?= base_url() ?>public/js/custom.js"></script>
    <script src="<?= base_url() ?>public/js/jquery.easing.min.js"></script>

   </head>

<body>
  <!--Navigation bar-->

     <nav class = "navbar navbar-expand-md navbar-light nav-main fixed-top">
        <div class = "container-fluid">
        <a class ="navbar-brand" href="index.php" style="font-family: Montserrat Black;color:#115"><img src="<?=base_url('public/pictures')?>/logo/logo.png" height="50" width="50">
        <strong>TRINITY FELLOWSHIP</strong></a>

        <button class = "navbar-toggler" type="button" data-toggle = "collapse" data-target= "#navbarResponsive">
        <span class = "navbar-toggler-icon"></span>
        </button>

        <div class = "collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto f-montserrat">
            <li class = "nav-item active">
              <a href="<?= base_url() ?>" class="nav-link">Home</a>
            </li>
            <li class = "nav-item">
              <a href="<?= base_url() ?>events" class="nav-link">Events</a>
            </li>
            <li class = "nav-item">
              <a href="<?= base_url() ?>media" class="nav-link">Media</a>
            </li>
            <li class = "nav-item">
              <a href="<?= base_url() ?>donate" class="nav-link">Donate</a>
            </li>
            <li class = "nav-item">
              <a href="<?= base_url() ?>about" class="nav-link">About Us</a>
            </li>
            <li class = "nav-item">
              <a href="<?= base_url() ?>contact_us" class="nav-link">Contact</a>
            </li>
            <li class = "nav-item">
              <a href="<?= base_url() ?>prayer_line" class="nav-link">Prayer line</a>
            </li>
          </ul>
        </div>
      </div>
     </nav>
