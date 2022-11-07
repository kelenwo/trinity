<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - <?=$title?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url();?>public/admin/assets/css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url();?>public/admin/assets/css/sb-admin-2.css" rel="stylesheet">
  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url();?>public/admin/assets/js/jquery.min.js"></script>
  <script src="<?= base_url();?>public/admin/assets/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url();?>public/admin/assets/js/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url();?>public/admin/assets/js/sb-admin-2.min.js"></script>
  <script src="<?= base_url();?>public/js/jquery.dataTables.min.js"></script>

  <!-- Page level plugins -->
  <link href="<?= base_url();?>public/css/jquery.dataTables.min.css" rel="stylesheet">
<style>
  .cursor-hand {
    cursor: pointer !important;
  }
   td {
    color: #444 !important;
  }
</style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url();?>">
        <div class="sidebar-brand-text mx-3 mt-2"><h4 style="text-transform:capitalize;">Admin Panel</h4></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url();?>admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url();?>admin/prayer-requests" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-hands"></i>
          <span>Prayer Requests</span>
        </a>
      </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url();?>admin/contacts" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-mail-bulk"></i>
          <span>Contacts</span>
        </a>
      </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url();?>admin/events" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-calendar-check"></i>
          <span>Events</span>
        </a>
      </li>
                  <hr class="sidebar-divider">
            <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url();?>admin/media" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-play-circle"></i>
          <span>Media</span>
        </a>
      </li>

      <!-- Divider-->
      <hr class="sidebar-divider"> 
      <!-- Nav Item - Pages Collapse Menu-->
      <li class="nav-item">
        <a class="nav-link collapsed <?php if($this->uri->segment(1)=="bidding"){echo "active";}?>" href="#" data-toggle="collapse" data-target="#contractbidding-tab" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-donate"></i>
          <span>Donors</span>
        </a>
        <div id="contractbidding-tab" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-transparent py-2 collapse-inner rounded">
            <h6 class="collapse-header">Donors:</h6>
            <a class="collapse-item" href="<?= base_url();?>admin/one-off-donors">One-off donors </a>
            <a class="collapse-item" href="<?= base_url();?>admin/recurring-donors">Recurring</a>
          </div>
        </div>
      </li> 

    <hr class="sidebar-divider">
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url();?>admin/users">
          <i class="fas fa-fw fa-users"></i>
          <span>Users</span></a>
      </li>
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url();?>partners/list">
          <i class="fas fa-fw fa-blog"></i>
          <span>Blogs</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline mt-3">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

          <!-- Main Content -->
          <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-transparent topbar mb-4 static-top shadow">

              <!-- Sidebar Toggle (Topbar) -->
              <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
              </button>

              <!-- Topbar Search -->


              <!-- Topbar Navbar -->
              <ul class="navbar-nav ml-auto">
                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="text-transform:capitalize; font-weight:bold;"><?= $this->session->first_name.' '.$this->session->last_name ?></span>
                    <img class="img-profile rounded-circle" src="<?= base_url();?>public/admin/assets/img/xlabs.png">
                  </a>
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <!-- <a class="dropdown-item" href="<?= base_url();?>dashboard/profile">
                      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                      Profile
                    </a> -->
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url();?>logout">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      Logout
                    </a>
                  </div>
                </li>

              </ul>

            </nav>
            <!-- End of Topbar -->
            <script>
              $(function() {
              $('nav li a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
            });
            </script>
