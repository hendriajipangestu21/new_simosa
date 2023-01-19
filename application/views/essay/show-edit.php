<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>

<!-- include summernote css/js -->
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
									<img src="<?= base_url('assets_style/image/' . $data_praja['foto']); ?>" width="60%" class="img-responsive" alt="#">
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

						<?php

						?>

						<form action="<?php echo base_url('essay/simpan'); ?>" method="POST" enctype="multipart/form-data">
							<?php
							if ($essay) {
								echo "<input type='hidden' name='method' id='method' value='update' class='form-control' readonly>";
								echo "<input type='hidden' name='id_essay' id='id_essay' value='" . $essay['id_essay'] . "' class='form-control' readonly>";
								echo "<input type='hidden' name='id_praja' id='id_praja' value='" . $data_praja['id_login'] . "' class='form-control' readonly>";
							} else {
								echo "<input type='hidden' name='method' id='method' value='new' class='form-control' readonly>";
							} ?>
							<input type='hidden' name='id_essay' id='id_essay' value='<?= !empty($essay['id_essay']) ? $essay['id_essay'] : ""; ?>' class='form-control' readonly>
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

							<?php if ($this->session->userdata('level') === "Praja") {
								foreach (unserialize($essay['keyword_essay']) as $data_keyword) {
									echo '<div class="col-sm-12">
										<div class="form-group after-add-more">
										<label>Keyword Essay</label>';
									echo '<input class="form-control" readonly name="keyword_essay[]" value="' . $data_keyword . '">';
									echo '</div>
									</div>';
								}
							} else {

							?>

								<div class="row field_wrapper">

									<?php

									foreach (unserialize($essay['keyword_essay']) as $data_keyword) {
										echo '<div class="col-sm-12">
											<div class="form-group after-add-more">
											<label>Keyword Essay</label>';
										echo '<input class="form-control" name="keyword_essay[]" value="' . $data_keyword . '">';
										echo '</div>
										</div>';
									}
									?>


									<div class="col-sm-12">
										<div class="form-group">
											<button style="margin-top: 25px;" class="btn btn-success add_button" type="button">
												<i class="glyphicon glyphicon-plus"></i> Add
											</button>
										</div>
									</div>
								</div>

							<?php } ?>

							<div align="right">
								<button type="submit" class="btn btn-primary bg-merah">Simpan Draft</button>
							</div>

						</form>

						<hr>
						<ul class="media-list">

							<?php
							if (!empty($komentar)) {
								foreach ($komentar as $kom) :


									$foto = $kom->foto;
									$idUs = $kom->id_komentator;
									$nama = $kom->nama;
									$level = $kom->level;
									$komen = $kom->komentar;
									$tgl  = date('d F Y', strtotime($kom->tgl_komen));

									$gambar = "assets_style/image/" . $foto;

									if ($level == "Petugas") {
										$label = "label-primary";
									} else {
										$label = "label-warning";
									}

									if ($idUs == $idbo) {
										$media = "bg-white";
									} else {
										$media = "bg-info";
									}
							?>

									<li class="media <?= $media ?>">
										<div class="media-left">
											<a href="#">
												<img width="64" height="64" class="media-objek" src="<?= base_url("$gambar"); ?>" alt="...">
											</a>
										</div>
										<div class="media-body">
											<h4 class="media-heading"><?= $nama ?></h4>
											<p><span class="label <?= $label; ?>"><?= $level ?></span> <span>
													<font color='dimgray' size='1'>Komentar pada <?= $tgl ?></font>
												</span></p>
											<p>
												<?= $komen ?>
											</p>
										</div>
									</li>

								<?php

								endforeach;

								?>



						</ul>
						<!--komentar-->



						<!--kolom komentar-->
						<h4 class='text-danger'>Kolom Komentar:</h4>
						<form method="POST" action="<?= site_url('komentar/kirim') ?>">
							<div class="w3-row-padding">
								<div class="w3-half">
									<input type="hidden" value="<?= $data_praja["id_login"]; ?>" name="id_praja">
									<input type="hidden" value="<?= $essay["id_essay"]; ?>" name="id_essay">
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
						<!--kolom komentar-->
						<?php
							} else {
								if ($level == 'Petugas') {


						?>
							<!--kolom komentar-->
							<h4 class='text-danger'>Kolom Komentar:</h4>
							<form method="POST" action="<?= site_url('komentar/kirim') ?>">
								<div class="w3-row-padding">
									<div class="w3-half">
										<input type="hidden" value="<?= $data_praja["id_login"]; ?>" name="id_praja">
										<input type="hidden" value="<?= !empty($essay["id_essay"]) ? $essay["id_essay"] : ''; ?>" name="id_essay">
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
							<!--kolom komentar-->
					<?php
								}
							}
					?>

					<!--komentar-->
					</div>
					<br>


				</div>
			</div>
		</div>




</div>
</section>
</div>


<script type="text/javascript">
	$(document).ready(function() {
		var maxField = 5; //Input fields increment limitation
		var addButton = $('.add_button'); //Add button selector
		var wrapper = $('.field_wrapper'); //Input field wrapper
		var fieldHTML = '<div>' +
			'<div class="col-sm-12">' +
			'<div class="form-group after-add-more">' +
			'<label>Keyword Essay</label>' +
			'<input style="margin-top: 10px;" id = "uintTextBox" class = "form-control" name = "keyword_essay[]" required = "required">' +
			'</div>' +

			'</div >' +
			'<button style="margin-left: 15px; margin-bottom:10px" class="btn btn-danger remove_button" type="button">' +
			'<i class="glyphicon glyphicon-plus"></i> Remove </button>' +
			'</div>'; //New input field html 
		var x = 1; //Initial field counter is 1

		//Once add button is clicked
		$(addButton).click(function() {
			//Check maximum number of input fields
			if (x < maxField) {
				x++; //Increment field counter
				$(wrapper).append(fieldHTML); //Add field html
			}
		});

		//Once remove button is clicked
		$(wrapper).on('click', '.remove_button', function(e) {
			e.preventDefault();
			$(this).parent('div').remove(); //Remove field html
			x--; //Decrement field counter
		});
	});
</script>