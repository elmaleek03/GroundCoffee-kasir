<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('partials/head.php') ?>
</head>

<body id="page-top">
	<div id="wrapper">
		<!-- load sidebar -->
		<?php $this->load->view('partials/sidebar.php') ?>

		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('baku') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>

				<div class="container-fluid">
				<div class="clearfix">
					<div class="float-left">
						<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
					</div>
					<div class="float-right">
						<a href="<?= base_url('baku') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<div class="card shadow">
							<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
							<div class="card-body">
								<form action="<?= base_url('baku/proses_tambah') ?>" id="form-tambah" method="POST">
									<div class="form-row">
										<div class="form-group col-xs-6 .col-md-10">
											<label for="kode_baku"><strong>Kode Baku</strong></label>
											<input type="text" name="kode_baku" placeholder="Masukkan Kode Baku" autocomplete="off"  class="form-control" required value="<?= mt_rand(10000000, 99999999) ?>" maxlength="8" readonly>
										</div>
										<div class="form-group col-xs-6 .col-md-10">
											<label for="nama_baku"><strong>Nama Baku</strong></label>
											<input type="text" name="nama_baku" placeholder="Masukkan Nama Baku" autocomplete="off"  class="form-control" required>
										</div>
										<div class="form-group col-xs-6 .col-md-10">
											<label for="harga_beli"><strong>Harga</strong></label>
											<input type="number" name="harga_beli" placeholder="Masukkan Harga Beli" autocomplete="off"  class="form-control" required>
										</div>
										<div class="form-group col-xs-6 .col-md-10">
											<label for="stok"><strong>Total Pembelian</strong></label>
											<input type="number" name="stok" placeholder="Masukkan Total Pembelian" autocomplete="off"  class="form-control" required>
										</div>
									<div class="form-group col-xs-6 .col-md-10">
											<label for="satuan"><strong>Satuan</strong></label>
											<select name="satuan" id="satuan" class="form-control" required>
												<option value="">-- Silahkan Pilih --</option>
												<option value="pcs">Pcs</option>
												<option value="sachet">Box</option>
												<option value="renceng">Kg</option>
												<option value="pak">Pack</option>
											</select>
										</div>
									</div>
									<hr>
									<div class="form-group">
										<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
										<button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
									</div>
								</form>
							</div>				
						</div>
					</div>
				</div>
				</div>
			</div>
			<!-- load footer -->
			<?php $this->load->view('partials/footer.php') ?>
		</div>
	</div>
	<?php $this->load->view('partials/js.php') ?>
</body>
</html>