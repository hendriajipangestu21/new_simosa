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

							<div class="box-header with-border">
								<a href="<?= base_url("artikel/add/") ?>"><button class="btn btn-primary bg-merah teks-putih"><i class="fa fa-plus"> </i> Tambah Artikel</button></a>
							</div>

							<table id="example1" class="table table-bordered table-striped table" width="100%">
								<thead>
									<tr class=' bg-merah teks-putih'>
										<th>No</th>
										<th>Thumbnail</th>
										<th>Judul</th>
										<th>Kategori</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($data_artikel as $data) {
										if ($data['status']=='Draft') 
										{
											$bg = "pink";
										}
										else
										{
											$bg = "";
										}
									?>
										<tr style='background-color:<?= $bg ?>;'>
											<td><?= $no; ?></td>
											<td>
												<center>
													<img width='50' height='50' src="<?= base_url('assets_style/image/artikel/' .$data['img']); ?>" alt="">
												</center>
											</td>
											<td><?= $data['judul']; ?></td>
											<td><?= $data['nama_kategori']; ?></td>
											<td><?= $data['status']; ?></td>
											<td>
												<?php if ($this->session->userdata('level') == 'Petugas') { ?>
													<a href="<?= base_url('artikel/show/' . $data['id_artikel']); ?>" class="btn btn-primary btn-sm" title="detail pinjam">
														<i class="fa fa-eye"></i> Detail</button></a>
													<a href="<?= base_url('artikel/edit/' . $data['id_artikel']); ?>"><button class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</button></a>
													<a href="<?= base_url('artikel/del/' . $data['id_artikel']); ?>" onclick="return confirm('Anda yakin user akan dihapus ?');">
														<button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button></a>
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
