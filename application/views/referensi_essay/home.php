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
						<div class="table-responsive">

							<!-- <div class="box-header with-border">
								<a href="<?= base_url("essay/show_edit/") ?>"><button class="btn btn-primary bg-merah teks-putih"><i class="fa fa-plus"> </i> Tambah Essay</button></a>
							</div> -->

							<table id="example1" class="table table-bordered table-striped table" width="100%">
								<thead>
									<tr class=' bg-merah teks-putih'>
										<th>No</th>
										<th>Judul</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($referensi_essay->result_array() as $isi) {
									?>
										<tr>
											<td><?= $no; ?></td>
											<td><?= $isi['judul']; ?></td>
											<td>
												<?php if ($this->session->userdata('level') == 'Petugas') { ?>
													<a href="<?= base_url('essay/show_edit/' . $isi['id_referensi']); ?>" class="btn btn-primary bg-biru btn-sm" title="detail pinjam">
														<i class="fa fa-eye"></i> Detail Essay</a>
													<a href="<?= base_url('essay/prosespinjam?id_referensi=' . $isi['id_referensi']); ?>" onclick="return confirm('Anda yakin menghapus essay ini ?');" class="btn btn-danger btn-sm" title="hapus pinjam">
														<i class="fa fa-trash"></i></a>
												<?php } else { ?>
													<a href="<?= base_url('referensi_essay/show_edit/' . $isi['id_referensi']); ?>" class="btn btn-primary bg-biru btn-sm" title="detail pinjam">
														<i class="fa fa-eye"></i> Detail Essay</a>
												<?php } ?>
											</td>
											</td>

										</tr>
									<?php $no++;
									} ?>
								</tbody>
							</table>
						</div>
						<script>
							CKEDITOR.replace('essay')
						</script>
					</div>
				</div>
			</div>
		</div>
</div>
</section>
</div>



Join Zoom Meeting
https://us05web.zoom.us/j/89347504134?pwd=eTNGaTl5U3ZDZVUxMjJPQ3UyaTBNZz09

Meeting ID: 893 4750 4134
Passcode: nLm02H



