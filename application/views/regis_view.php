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

    hr {
      border-bottom: 1px solid gainsboro;
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

  <div class="container kontener registrasi">
    <div class="row" style='margin:10px auto; width:90%;'>
      <div class="col-md-3">
        <center>
          <br>
          <img src="<?= base_url('assets_style/image/logo/logo-ipdn.png') ?>" width="100%" alt="">
        </center>
      </div>
      <div class="col-md-9">
        <h1>
          <font style='font-size:57px; font-weight:bold; letter-spacing:3px;'>SIMOSA</font>
        </h1>
        <h4>Sistem Informasi Monitoring Beasiswa</h4>
        <h3 class="text-danger">Registrasi</h3>
      </div>
    </div>

    <hr>


    <div class="row">
      <div class="col-md-12">
        <div class="box-primary">
          <div class="box-header with-border">
          </div>
          <!-- /.box-header -->
          <div>
            <?php if (!empty($this->session->flashdata('pesan'))) {
              echo '<div class="alert alert-danger" role="alert">
            ' . $this->session->flashdata('pesan') . '
          </div>';
            } ?>

            <form action="<?php echo base_url('regis/regis'); ?>" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Nama Pengguna</label>
                    <input type="text" class="form-control" name="nama" required="required" placeholder="Nama Pengguna">
                  </div>
                  <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" class="form-control" name="lahir" required="required" placeholder="Contoh : Bekasi">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" required="required" placeholder="Contoh : 1999-05-18">
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="user" required="required" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="pass" required="required" placeholder="Password">
                  </div>
                  <input type="hidden" class="form-control" name="level" value="Praja" readonly>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <br />
                    <input type="radio" name="jenkel" value="Laki-Laki" required="required"> Laki-Laki
                    <br />
                    <input type="radio" name="jenkel" value="Perempuan" required="required"> Perempuan
                  </div>
                  <div class="form-group">
                    <label>Telepon</label>
                    <input id="uintTextBox" class="form-control" name="telepon" required="required" placeholder="Contoh : 089618173609">
                  </div>
                  <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" class="form-control" name="email" required="required" placeholder="Contoh : fauzan1892@codekop.com">
                  </div>
                  <div class="form-group">
                    <label>Pas Foto</label>
                    <input type="file" accept="image/*" name="gambar" required="required">
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat" required="required"></textarea>
                  </div>
                </div>
              </div>
              <div class="pull-right">
                <button type="submit" class="btn btn-primary bg-merah btn-md">Simpan</button>
            </form>
            <a href="<?= base_url('user'); ?>" class="btn btn-danger bg-biru btn-md">Kembali</a>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- jQuery 3 -->
  <script src="<?php echo base_url('assets_style/assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url('assets_style/assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url('assets_style/assets/plugins/iCheck/icheck.min.js'); ?>"></script>
</body>

</html>