<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
			<div class="col-md-4">
				<div class="box box-danger" style='padding:10px;'>
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
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="box box-danger" style='padding:10px;'>
					<div class="box-header with-border">
					</div>
					<!-- /.box-header -->
					<div class="box-body">

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

							<div align="right">
								<button type="submit" class="btn btn-primary bg-merah">Simpan Draft</button>
							</div>

						</form>

						<hr>


						<!--komentar-->
						<?php if (!empty($essay)) {
						?>

							<h4 class='text-danger'>Kolom Komentar:</h4>
							<form method="POST" action="<?php echo site_url('komentar/kirim') ?>">
								<div class="w3-row-padding">
									<div class="w3-half">
										<input type="hidden" value="<?php echo $data_praja["id_login"]; ?>" name="id_praja">
										<input type="hidden" value="<?php echo $essay["id_essay"]; ?>" name="id">
										<input class="w3-input w3-border" type="hidden" placeholder="Nama" name="nama" value="<?= $d->nama ?>">
									</div>
									<div class="w3-half">
										<input class="w3-input w3-border" type="hidden" placeholder="Email" name="email" value="<?= $d->email ?>">
									</div>
								</div>
								<div class="w3-padding">
									<textarea style="width: 100%;" name="isi" placeholder="Isikan komentar disini"></textarea>
								</div>
								<div class="w3-padding">
									<button class="btn btn-lg bg-orange-gelap" type="submit">Kirim Komentar</button>
								</div>
							</form>

							<?php
							$content_id =  $essay["id_essay"];
							$query = $this->db->query("SELECT * FROM table_comment WHERE comment_status='0' AND comment_content_id = '$content_id' ORDER BY comment_id DESC");
							foreach ($query->result() as $utama) :
							?>

								<div class="w3-padding w3-container w3-panel w3-leftbar w3-border-red w3-pale-red">
									<p>
										<b><?php echo $utama->comment_nama ?></b>
										<br><?php echo $utama->comment_isi ?>
									</p>
								</div>

								<?php
								$content_id = $content_id;
								$comment_id = $utama->comment_id;
								$query = $this->db->query("SELECT * FROM table_comment WHERE comment_status='$comment_id' AND comment_content_id = '$content_id'");
								foreach ($query->result() as $balasan) :
								?>

									<div class="w3-padding w3-panel w3-pale-blue w3-leftbar w3-border-blue child">
										<p>
											<b><?php echo $balasan->comment_nama ?></b>
											<br><?php echo $balasan->comment_isi ?>
										</p>
									</div>

								<?php endforeach; ?>
								<div class="w3-container">
									<form class="w3-container" method="POST" action="<?php echo site_url('komentar/balas') ?>">
										<input type="hidden" name="comment_id" value="<?php echo $utama->comment_id ?>">
										<input type="hidden" name="content_id" value="<?php echo $content_id ?>">
										<input type="hidden" value="<?php echo $data_praja["id_login"]; ?>" name="id_praja">
										<div class="w3-section">
											<input class="w3-input w3-border w3-margin-bottom" type="hidden" placeholder="Nama" name="nama" value="<?= $d->nama ?>" required>
											<input class="w3-input w3-border" type="hidden" placeholder="Email" name="email" value="<?= $d->email ?>" required>
											<br>
											<textarea style="width: 100%;" placeholder="isikan balasan komentar disini" name="isi"></textarea>
											<button style="width:30%" class="w3-button w3-block w3-blue w3-section w3-padding" type="submit">Kirim balasan komentar</button>
										</div>
									</form>
								</div>
								<footer class="w3-container w3-blue w3-border-top w3-padding-3"></footer>

							<?php endforeach; ?>


						<?php } ?>
						<!--komentar-->
					</div>
					<br>


				</div>
			</div>
		</div>




</div>
</section>
</div>