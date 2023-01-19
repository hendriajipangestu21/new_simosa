<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>

<div class="content-wrapper" style='padding:20px;'>
    <section class="content-header">
        <h1>
            <i class="fa fa-plus" style="color:crimson"> </i> Tambah User
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-plus"></i>&nbsp; Tambah User</li>
        </ol>
    </section>
    <br>
    <section class="content panel">
        <div class="row panel-body">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-header with-border">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="<?php echo base_url('tentang/add'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea name="keterangan" id="keterangan"><?= !empty($essay["isi"]) ? $essay["isi"] : ""; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary bg-merah btn-md">Submit</button>
                        </form>
                        <a href="<?= base_url('user'); ?>" class="btn btn-danger bg-biru btn-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>