<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title_web; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="shortcut icon" href="<?= base_url('assets_style/image/logo/logo-ipdn.png') ?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets_style/assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets_style/assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets_style/assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets_style/assets/dist/css/AdminLTE.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets_style/assets/dist/css/responsivelogin.css'); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
    .navbar-inverse {
      background-color: #333;
    }

    .navbar-color {
      color: #fff;
    }

    blink,
    .blink {
      animation: blinker 3s linear infinite;
    }

    @keyframes blinker {
      50% {
        opacity: 0;
      }
    }
  </style>

  <!--penambahan-->
  <link rel="stylesheet" href="<?php echo base_url('assets_style/assets/kustomisasi/css/tambahan.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets_style/assets/kustomisasi/css/perloginan.css'); ?>">
</head>

<body>

  <div class="container kontener">
    <form action="<?= base_url('/login/auth'); ?>" method="POST">


      <div class="row">
        <div class="col-md-6">
          <center>
            <img src="<?= base_url('assets_style/image/logo/logokemen.png') ?>" width="70%" alt="">
          </center>
        </div>
        <div class="col-md-6">
          <center>
            <img src="<?= base_url('assets_style/image/logo/logo-ipdn.png') ?>" width="85%" alt="">
          </center>
        </div>
      </div>
      <center>
        <h1>SIMOSA</h1>
        <h4>Sistem Informasi Monitoring Beasiswa</h4>
      </center>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" id="user" name="user" required="required" autocomplete="off">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="pass" name="pass" required="required" autocomplete="off">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">

        </div>
        <div class="col-xs-4">
          <a href="<?= base_url('regis'); ?>" id="loding" class="btn btn-primary bg-biru tombol-login btn-block btn-flat">Daftar</a>
          <div id="loadingcuy"></div>
        </div>
        <div class="col-xs-4">
          <button type="submit" id="loding" class="btn btn-info bg-merah tombol-login btn-block btn-flat">Login</button>
          <div id="loadingcuy"></div>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>

  <!-- jQuery 3 -->
  <script src="<?php echo base_url('assets_style/assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url('assets_style/assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url('assets_style/assets/plugins/iCheck/icheck.min.js'); ?>"></script>
</body>

</html>