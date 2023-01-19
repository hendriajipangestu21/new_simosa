<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<?php
$bulan_tes = array(
	'01' => "Januari",
	'02' => "Februari",
	'03' => "Maret",
	'04' => "April",
	'05' => "Mei",
	'06' => "Juni",
	'07' => "Juli",
	'08' => "Agustus",
	'09' => "September",
	'10' => "Oktober",
	'11' => "November",
	'12' => "Desember"
);
?>
<div class="content-wrapper" style="padding:20px;">
	<section class="content-header">
		<h1>
			<i class="fa fa-edit" style="color:crimson"> </i> <?= $title_web; ?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-file-text"></i>&nbsp; <?= $title_web; ?></li>
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
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="row">
							<div class="col-md-6 padding-100">
								<h1 class="text-danger" style="font-weight:bold; font-size:46px; color:navy;">Belum Ada Essay</h1>
								<?php
								if ($this->session->userdata('level') === "Praja") {
								?>
									<font size="4">
										<p>Klik <b class="text-danger">Buat Essay</b> untuk menambahkan Essay.</p>
									</font>
									<a href="<?= base_url("essay/show_edit/") ?>"><button class="btn btn-primary bg-merah teks-putih btn-lg"><i class="fa fa-pencil" aria-hidden="true"></i> </i> Buat Essay</button></a>
								<?php } ?>
							</div>
							<div class="col-md-6">
								<center>
									<img width="80%" src="<?= base_url('assets_style/image/logo/jalan-kosong.png'); ?>" alt="">
								</center>
							</div>
						</div>
						<!--
						<table id="example1" class="table table-bordered table-striped table" width="100%">
							<thead>
								<tr class=' bg-merah teks-putih'>
									<th>No</th>
									<th>Judul</th>
									<th>Penulis</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($essay->result_array() as $isi) {
									$anggota_id = $isi['id_praja'];
									$ang = $this->db->query("SELECT * FROM tbl_login WHERE anggota_id = '$anggota_id'")->row();
								?>
									<tr>
										<td><?= $no; ?></td>
										<td><?= $isi['judul']; ?></td>
										<td><?= $isi['nama']; ?></td>
										<td>
											<?php if ($this->session->userdata('level') == 'Petugas') { ?>
												<a href="<?= base_url('essay/show_edit/' . $isi['id_essay'] . '/' . $isi['id_praja']); ?>" class="btn btn-primary bg-biru btn-sm" title="detail pinjam">
													<i class="fa fa-eye"></i> Detail Essay</a>
												<a href="<?= base_url('essay/prosespinjam?id_essay=' . $isi['id_essay']); ?>" onclick="return confirm('Anda yakin menghapus essay ini ?');" class="btn btn-danger btn-sm" title="hapus pinjam">
													<i class="fa fa-trash"></i></a>
											<?php } else { ?>
												<a href="<?= base_url('essay/show_edit/' . $isi['id_essay']); ?>" class="btn btn-primary bg-biru btn-sm" title="detail pinjam">
													<i class="fa fa-eye"></i> Detail Essay</a>
											<?php } ?>
										</td>
										</td>

									</tr>
								<?php $no++;
								} ?>
							</tbody>
						</table>
						-->
					</div>
					<script>
						CKEDITOR.replace('essay')
					</script>
				</div>
			</div>
		</div>
</div>
</section>
</div>