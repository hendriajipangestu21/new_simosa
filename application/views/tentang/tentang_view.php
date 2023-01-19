<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper" style='padding:20px;'>
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:crimson;"> </i> Daftar Data Praja
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-file-text"></i>&nbsp; Daftar Data Praja</li>
        </ol>
    </section>
    <br>
    <section class="content panel">
        <?php if (!empty($this->session->flashdata())) {
            echo $this->session->flashdata('pesan');
        } ?>
        <div class="row panel-body">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <a href="tentang/tambah" class="btn bg-merah teks-putih"><i class="fa fa-plus"> </i> Tambah Keterangan</a>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <br />
                            <table id="example1" class="table table-bordered table-striped table" width="100%">
                                <thead>
                                    <tr class="bg-merah teks-putih">
                                        <th>No</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($user as $isi) { ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $isi['keterangan']; ?></td>
                                            <td><?= $isi['status']; ?></td>
                                            <td style="width:20%;">
                                                <a href="<?= base_url('tentang/aktif/' . $isi['id_tentang_kami']); ?>"><button class="btn btn-primary">Aktif</i></button></a>
                                                <a href="<?= base_url('tentang/edit/' . $isi['id_tentang_kami']); ?>"><button class="btn btn-success"><i class="fa fa-edit"></i> Edit</button></a>
                                                <a href="<?= base_url('tentang/del/' . $isi['id_tentang_kami']); ?>" onclick="return confirm('Anda yakin untuk mengahpus data ini ?');">
                                                    <button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button></a>

                                            </td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>