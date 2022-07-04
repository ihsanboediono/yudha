<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= isset($title) && !empty($title) ? $title : " Apotik Diva " ?></title>
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> -->
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/chartist/chartist.min.css">
  <!-- End plugin css for this page -->

  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/select2/select2.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="<?= base_url('assets/') ?>images/favicon.png" />
  <script src="<?= base_url('assets/') ?>js/jquery-3.6.0.js"></script>
  <script src="<?= base_url('assets/') ?>vendors/js/vendor.bundle.base.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script> -->
</head>

<body>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex align-items-center">
        <a class="navbar-brand brand-logo" href="<?= base_url('admin'); ?>">
          <!-- <img src="<?= base_url('assets/') ?>images/logo.svg" alt="logo" class="logo-dark" /> -->
          <span class="text-white"> <b> Apotik Diva </b></span>
        </a>
        <a class="navbar-brand brand-logo-mini" href="<?= base_url('admin'); ?>">
          <img src="<?= base_url('assets/') ?>images/logo-mini.svg" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
        <ul class="navbar-nav navbar-nav-right ml-auto">

          <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <!-- <img class="img-xs rounded-circle ml-2" src="<?= base_url('assets/') ?>images/faces/face8.jpg" alt="Profile image">  -->
              <span class="font-weight-normal"> Apotik Diva </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">

              <a class="dropdown-item" href="<?= base_url('profile'); ?>"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile</span></a>
              <a class="dropdown-item" href="<?= base_url('login/logout/'); ?>"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="" class="nav-link">
              <div class="profile-image">
                <img class="img-xs rounded-circle" src="<?= base_url('assets/') ?>images/faces/face8.jpg" alt="profile image">
                <div class="dot-indicator bg-success"></div>
              </div>
              <div class="text-wrapper">
                <p class="profile-name">admin</p>
                <p class="designation">Apotik Diva</p>
              </div>
              <!-- <div class="icon-container">
                  <i class="icon-bubbles"></i>
                  <div class="dot-indicator bg-danger"></div>
                </div> -->
            </a>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Dashboard</span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin') ?>">
              <span class="menu-title">Dashboard</span>
              <i class="icon-screen-desktop menu-icon"></i>
            </a>
          </li>

          <!-- <li class="nav-item">
                <a class="nav-link" href="<?= base_url('transaksi') ?>">
                    <span class="menu-title">Transaksi</span>
                    <i class="icon-basket-loaded menu-icon"></i>
                </a>
            </li> -->

          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('laporan'); ?>">
              <span class="menu-title">Transaksi</span>
              <i class="icon-basket-loaded menu-icon"></i>
            </a>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Analisa</span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('heuristic'); ?>">
              <span class="menu-title">Heuristic Approach</span>
              <i class="icon-book-open  menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('naive'); ?>">
              <span class="menu-title">Naive Approach</span>
              <i class="icon-book-open  menu-icon"></i>
            </a>
          </li>
        
          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#laporan" aria-expanded="false" aria-controls="laporan">
              <span class="menu-title">Laporan</span>
              <i class="icon-docs menu-icon"></i>
            </a>
            <div class="collapse" id="laporan">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= base_url('laporan') ?>">Laporan Transaksi</a></li>
              </ul>
            </div>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link" href="<?= site_url('laporan'); ?>">
              <span class="menu-title">Analisa</span>
              <i class="icon-book-open  menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= base_url('laporan') ?>">-</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= base_url('barang') ?>">-</a></li>
              </ul>
            </div>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('backup'); ?>">
              <span class="menu-title">Backup</span>
              <i class="icon-cloud-download  menu-icon"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <?= $this->session->flashdata('pesan'); ?>
          <div class="row">