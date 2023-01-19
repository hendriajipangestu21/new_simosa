<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<style type="text/css">
	.child {
		margin-left: 50px;
	}

	.modal {
		width: 40% !important;
	}

	textarea {
		width: 100%;
		height: 80px;
	}

	.invalid-feedback {
		color: red;
	}
</style>


<?php
$d = $this->db->query("SELECT * FROM tbl_login WHERE id_login='$idbo'")->row();
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
<div class="content-wrapper" style='padding:20px;'>
	<section class="content-header">
		<h1>
			<i class="fa fa-edit" style="color:crimson;"> </i> <?= $title_web; ?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-file-text"></i>&nbsp; <?= $title_web; ?></li>
		</ol>
	</section>
	<br>
	<section style='box-shadow:0px;'>
		<?php if (!empty($this->session->flashdata())) {
			echo $this->session->flashdata('pesan');
		} ?>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-danger" style='padding:10px;'>
					<div class="box-header with-border">
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<form action="<?php echo base_url('artikel/simpan'); ?>" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label>
									<h4>
										<b>JUDUL</b>
									</h4>
								</label>
								<input type="text" name="judul" id="judul" value="<?= set_value('judul') ?>" class=" form-control">
								<div class="invalid-feedback"><?php echo form_error('judul'); ?></div>
							</div>
							<div class="form-group">
								<label>
									<h4>
										<b>ISI</b>
									</h4>
								</label>
								<textarea name="isi" id="isi"><?= set_value('isi') ?></textarea>
								<div class="invalid-feedback"><?php echo form_error('isi'); ?></div>
							</div>

							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>
											<h4>
												<b>KATEGORI</b>
											</h4>
										</label>
										<select class="form-control" name="kategori" id="kategori">
											<?php foreach($kategori as $k): ?>
											<option value="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
											<?php endforeach; ?>
										</select>
										<div class="invalid-feedback"><?php echo form_error('kategori'); ?></div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>
											<h4>
												<b>GAMBAR</b>
											</h4>
										</label>
										<input type="file" id="gambar" accept="image/*" name="gambar" class="custom-control-input">
										<!-- <div class="invalid-feedback"><?php echo form_error('gambar'); ?></div> -->
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>
											<h4>
												<b>STATUS</b>
											</h4>
										</label>
										<br>
										<input type="radio" id="status1" value="Draft" <?= set_value('status') == "Draft" ? "checked" : ""; ?> name="status" class="custom-control-input">
										<b>Jadikan Draft</b>
										<br>
										<input type="radio" id="status2" value="Publish" name="status" <?= set_value('status') == "Publish" ? "checked" : ""; ?> class="custom-control-input">
										<b>Publish</b>
										<div class="invalid-feedback"><?php echo form_error('status'); ?></div>
									</div>
								</div>
							</div>
							<div align="right">
								<button type="submit" class="btn btn-primary bg-merah">SIMPAN</button>
							</div>
						</form>
						<hr>
					</div>
					<br>
				</div>
			</div>
		</div>
</div>
</section>
</div>