<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper" style='padding:20px;'>
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:crimson;"> </i> Update User - <?= $user->nama; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-edit"></i>&nbsp; Update User - <?= $user->nama; ?></li>
        </ol>
    </section>
    <br>
    <section class="content panel">
        <div class="row panel-body">
            <div class="col-md-12">
                <?php if (!empty($this->session->flashdata())) {
                    echo $this->session->flashdata('pesan');
                } ?>

                <div class="box box-danger">
                    <div class="box-header with-border">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="<?php echo base_url('user/upd'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama Pengguna</label>
                                        <input type="text" class="form-control" value="<?= $user->nama; ?>" name="nama" required="required" placeholder="Nama Pengguna">
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" class="form-control" name="lahir" value="<?= $user->tempat_lahir; ?>" required="required" placeholder="Contoh : Bekasi">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tgl_lahir" value="<?= $user->tgl_lahir; ?>" required="required" placeholder="Contoh : 1999-05-18">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" readonly value="<?= $user->user; ?>" name="user" required="required" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <label>Password (opsional)</label>
                                        <input type="password" class="form-control" name="pass" placeholder="Isi Password Jika di Perlukan Ganti">
                                    </div>
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select name="level" class="form-control" required="required">
                                            <?php if ($this->session->userdata('level') == 'Petugas') { ?>
                                                <option <?php if ($user->level == 'Petugas') {
                                                            echo 'selected';
                                                        } ?>>Petugas</option>
                                                <option <?php if ($user->level == 'Praja') {
                                                            echo 'selected';
                                                        } ?>>Praja</option>
                                            <?php } elseif ($this->session->userdata('level') == 'Praja') { ?>
                                                <option <?php if ($user->level == 'Praka') {
                                                            echo 'selected';
                                                        } ?>>Praja</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <br />
                                        <input type="radio" name="jenkel" <?php if ($user->jenkel == 'Laki-Laki') {
                                                                                echo 'checked';
                                                                            } ?> value="Laki-Laki" required="required"> Laki-Laki
                                        <br />
                                        <input type="radio" name="jenkel" <?php if ($user->jenkel == 'Perempuan') {
                                                                                echo 'checked';
                                                                            } ?> value="Perempuan" required="required"> Perempuan
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input id="uintTextBox" class="form-control" value="<?= $user->telepon; ?>" name="telepon" required="required" placeholder="Contoh : 089618173609">
                                    </div>
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="email" value="<?= $user->email; ?>" readonly class="form-control" name="email" required="required" placeholder="Contoh : fauzan1892@codekop.com">
                                    </div>
                                    <div class="form-group">
                                        <label>Pas Foto</label>
                                        <input type="file" accept="image/*" name="gambar">

                                        <br />
                                        <img src="<?= base_url('assets_style/image/' . $user->foto); ?>" class="img-responsive" alt="#" width="30%">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" required="required"><?= $user->alamat; ?></textarea>
                                        <input type="hidden" class="form-control" value="<?= $user->id_login; ?>" name="id_login">
                                        <input type="hidden" class="form-control" value="<?= $user->foto; ?>" name="foto">
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary bg-merah btn-md">Edit Data</button>
                        </form>
                        <?php if ($this->session->userdata('level') == 'Petugas') { ?>
                            <a href="<?= base_url('user'); ?>" class="btn btn-danger bg-biru btn-md">Kembali</a>
                        <?php } elseif ($this->session->userdata('level') == 'Anggota') { ?>
                            <a href="<?= base_url('transaksi'); ?>" class="btn btn-danger btn-md">Kembali</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        var maxField = 5; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div>' +
            '<div class="col-sm-12">' +
            '<div class="form-group after-add-more">' +
            '<input style="margin-top: 10px;" id = "uintTextBox" class = "form-control" name = "keyword_essay[]" required = "required">' +
            '</div>' +

            '</div >' +
            '<button style="margin-left: 15px; margin-bottom:10px" class="btn btn-danger remove_button" type="button">' +
            '<i class="glyphicon glyphicon-plus"></i> Remove </button>' +
            '</div>'; //New input field html 
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function() {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>