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
								<center>
									<img src="<?= base_url('assets_style/image/' . $data_praja['foto']); ?>" class="img-responsive" alt="#">
								</center>
							</div>
							<div class="form-group">
								<label>Nama Praja</label>
								<input type="text" class="form-control" value="<?= $data_praja['nama'] ?>" readonly>
							</div>
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<br />
								<input type="text" class="form-control" value="<?= $data_praja['jenkel'] ?>" readonly>
							</div>

							<div class="form-group">
								<label>Telpon</label>
								<br />
								<input type="text" class="form-control" value="<?= $data_praja['telepon'] ?>" readonly>
							</div>
							<div class="form-group">
								<label>Email</label>
								<br />
								<input type="text" class="form-control" value="<?= $data_praja['email'] ?>" readonly>
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<textarea class="form-control" name="alamat" required="required" readonly><?= $data_praja['alamat'] ?></textarea>
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
							<form action="<?php echo base_url('essay/simpan'); ?>" method="POST" enctype="multipart/form-data">
								<?php if ($essay) {
									echo "<input type='hidden' name='method' id='method' value='update' class='form-control' readonly>";
									echo "<input type='hidden' name='id_essay' id='id_essay' value='" . $essay['id_essay'] . "' class='form-control' readonly>";
								} else {
									echo "<input type='hidden' name='method' id='method' value='new' class='form-control' readonly>";
								} ?>
								<div class="form-group">
									<label>
										<h4>
											<b>JUDUL</b>
										</h4>
									</label>
									<input type="text" name="judul" id="judul" value="<?= !empty($essay['judul']) ? $essay['judul'] : ""; ?>" class="form-control">
								</div>
								<div class="form-group">
									<label>
										<h4>
											<b>ISI</b>
										</h4>
									</label>
									<textarea name="essay" id="essay"><?= !empty($essay["isi"]) ? $essay["isi"] : ""; ?></textarea>
								</div>
								<div class="pull-right">
									<button type="submit" class="btn btn-primary btn-md">Simpan Draft</button>
								</div>
							</form>
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