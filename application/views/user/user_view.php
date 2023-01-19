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
                        <a href="user/tambah" class="btn bg-merah teks-putih"><i class="fa fa-plus"> </i> Tambah User</a>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <br />
                            <table id="example1" class="table table-bordered table-striped table" width="100%">
                                <thead>
                                    <tr class="bg-merah teks-putih">
                                        <th>No</th>
                                        <th>ID</th>
                                        <!-- <th>Foto</th> -->
                                        <th>Nama</th>
                                        <th>Keyword Essay</th>
                                        <th>Rivewer</th>
                                        <th>Dosbing Skripsi</th>
                                        <th>Kabupaten/Provinsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($user as $isi) { ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $isi['anggota_id']; ?></td>
                                            <!-- <td>
                                                <center>
                                                    <?php if (!empty($isi['foto'] !== "-")) { ?>
                                                        <img src="<?php echo base_url(); ?>assets_style/image/<?php echo $isi['foto']; ?>" alt="#" class="img-responsive" style="height:auto;width:100px;" />
                                                    <?php } else { ?> -->
                                            <!--<img src="" alt="#" class="user-image" style="border:2px solid #fff;"/>-->
                                            <!-- <i class="fa fa-user fa-3x" style="color:#333;"></i>
                                                    <?php } ?>
                                                </center> -->
                                            </td>
                                            <td><a href="<?= base_url("essay/show/" . $isi['id_login']) ?>"><?= $isi['nama']; ?></a></td>
                                            <td><?= $isi['keyword_essay']; ?></td>
                                            <td><?= $isi['reviewer']; ?></td>
                                            <td><?= $isi['dosbing_skripsi']; ?></td>
                                            <td><?= $isi['alamat']; ?></td>
                                            <td style="width:20%;">
                                                <a href="<?= base_url('user/edit/' . $isi['id_login']); ?>"><button class="btn btn-success"><i class="fa fa-edit"></i> Edit</button></a>
                                                <a href="<?= base_url('user/del/' . $isi['id_login']); ?>" onclick="return confirm('Anda yakin user akan dihapus ?');">
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