<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Travel Terdepan dan Terpercaya">
    <meta name="author" content="Puding Lab">
    <title><?= $title ?> - Travel Titan</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800|Roboto:400,500,700" rel="stylesheet">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,700,300'>

    <!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
    <link rel="icon" type="image/png" href="../assets/favicon/icon3.png" sizes="16x16">

    <!-- Theme CSS -->
    <link type="text/css" href="<?= base_url('assets/css/theme.css')?>" rel="stylesheet">
    <link type="text/css" href="<?= base_url('assets/css/styles.css')?>" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/popper/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap/bootstrap.min.js') ?>"></script>

    <!-- FontAwesome 5 -->
    <script src="<?= base_url('assets/vendor/fontawesome/js/fontawesome-all.min.js') ?>" defer></script>

    <!-- Page plugins -->
    <script src="<?= base_url('assets/vendor/bootstrap-select/js/bootstrap-select.min.js') ?>"></script>
    <!-- <script src="<?= base_url('assets/vendor/animate/animate.min.js') ?>"></script> -->
    <script src="<?= base_url('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/input-mask/input-mask.min.js') ?>"></script>

    <script src="<?= base_url('assets/vendor/nouislider/js/nouislider.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/textarea-autosize/textarea-autosize.min.js') ?>"></script>
    
    <!-- Core plugin JavaScript-->
    <!-- <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script> -->
    <!-- Custom scripts for all pages-->
    <!-- <script src="<?= base_url('assets/js/sb-admin.min.js') ?>"></script> -->
    
    <!-- Theme JS -->
    <script src="<?= base_url('assets/js/theme.js') ?>"></script>
    
    <!-- Google Captcha -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>

  <body class="fixed-nav sticky-footer" id="page-top">
    <nav class="navbar navbar-expand-lg" style= "background-color: hsl(0, 0%, 87%)">
      <img src="<?= base_url('assets/images/logo/km.jpg')?>" width="35" height="30" alt="">
      <a class="navbar-brand" href="<?php echo base_url();?>"><strong>Travel Titan</strong></a>
      <button class="navbar-toggler" type="button" data-action="offcanvas-open" data-target="#navbar_main" aria-controls="navbar_main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
       <div class="navbar-collapse offcanvas-collapse" id="navbar_main">
        <ul class="navbar-nav mr-auto align-items-lg-center">
          <?php if($this->session->userdata('isAdmin')){ ?>
          <li class="nav-item">
            <a class="nav-link  btn-label" href="<?php echo base_url();?>post/add"><i class="fas fa-plus"></i> Tambah Informasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  btn-label" href="<?php echo base_url();?>user/manage"><i class="fas fa-edit"></i> Kelola User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  btn-label" href="<?php echo base_url();?>post/manage"><i class="fas fa-edit"></i> Kelola Informasi</a>
          </li>
          <?php } ?>
        </ul>
      </div>
      <form class="navbar-collapse mx-auto" method="GET" action="<?=base_url() . 'search'?>">
        <input class="form-control mr-sm-2" type="search" name="title" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary my-2 my-sm-0 btn-animated btn-animated-y" type="submit">
        <span class="btn-inner--visible">Cari</span></button>
      </form>
      <div class="navbar-collapse offcanvas-collapse" id="navbar_main">
        <ul class="navbar-nav ml-auto align-items-lg-center">
        <?php if(!$this->session->has_userdata('userId')){ ?>
          <li class="nav-item">
            <a class="nav-link  btn-label" href="<?php echo base_url();?>login">Masuk <i class="fas fa-sign-in-alt"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>register">Daftar Akun <i class="fas fa-user"></i></a>
          </li>
        <?php } else { ?>
          <li class="nav-item"><a class="nav-link"><?=$this->session->userdata('email')?></a></li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>logout">Logout <i class="fas fa-sign-out-alt"></i></a>
          </li>
        <?php } ?>
        </ul>
      </div>
    </nav>