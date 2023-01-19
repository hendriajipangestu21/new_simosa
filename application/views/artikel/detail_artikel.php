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
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-edit" style="color:green"> </i> <?= $title_web; ?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-file-text"></i>&nbsp; <?= $title_web; ?></li>
		</ol>
	</section>
	<section class="content">
		<?php if (!empty($this->session->flashdata())) {
			echo $this->session->flashdata('pesan');
		} ?>
		<div class="row">
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-header with-border">
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<div class="form-group">
								<h4><label>GAMBAR</label>
								</h4>
								<center>
									<img src="<?= base_url('assets_style/image/artikel/' . $data_artikel->img); ?>" class="img-responsive" alt="#">
								</center>
							</div>
							<div class="form-group">
								<h4><label>JUDUL ARTIKEL</label></h4>
								<input type="text" class="form-control" value="<?= $data_artikel->judul ?>" readonly>
							</div>
							<div class="form-group">
								<h4><label>KATEGORI</label></h4>
								<input type="text" class="form-control" value="<?= $data_artikel->kategori ?>" readonly>
							</div>

							<div class="form-group">
								<h4><label>STATUS</label></h4>
								<input type="text" class="form-control" value="<?= $data_artikel->status ?>" readonly>
							</div>
						</div>

						<script>
							CKEDITOR.replace('essay')
						</script>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="box box-primary">
					<div class="box-header with-border">
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">

							<div class="form-group">
								<label>
									<h4>
										<b>ISI</b>
									</h4>
								</label>
								<textarea name="essay" id="essay" readonly><?= $data_artikel->isi; ?></textarea>
							</div>
							<div class="pull-right">
								<a href="<?= base_url('artikel'); ?>" class="btn btn-danger btn-md">Kembali</a>
							</div>

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