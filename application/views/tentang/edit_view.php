<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper" style='padding:20px;'>
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:crimson;"> </i> Update Data
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-edit"></i>&nbsp; Update Data</li>
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
                        <form action="<?php echo base_url('tentang/upd'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="hidden" name="id_keterangan" id="id_keterangan" value="<?= !empty($data->id_tentang_kami) ? $data->id_tentang_kami : ""; ?>" />
                                    </div>
                                    <div class=" form-group">
                                        <label>Keterangan</label>
                                        <textarea name="keterangan" id="keterangan"><?= !empty($data->keterangan) ? $data->keterangan : ""; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary bg-merah btn-md">Submit</button>
                        </form>
                        <?php if ($this->session->userdata('level') == 'Petugas') { ?>
                            <a href="<?= base_url('tentang'); ?>" class="btn btn-danger bg-biru btn-md">Kembali</a>
                        <?php } elseif ($this->session->userdata('level') == 'Anggota') { ?>
                            <a href="<?= base_url('tentang'); ?>" class="btn btn-danger btn-md">Kembali</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>