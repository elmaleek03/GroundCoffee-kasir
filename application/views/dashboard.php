<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('partials/head.php') ?>
</head>

<body id="page-top">
	<div id="wrapper"  >
		<!-- load sidebar -->
		<?php $this->load->view('partials/sidebar.php') ?>

		<div id="content-wrapper" class="d-flex flex-column" >
			<div id="content" data-url="<?= base_url('kasir') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>

				<div class="container-fluid">
				<div class="clearfix">
					<div class="float-left">
						<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
					</div>
				</div>
				<hr>
				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<?= $this->session->flashdata('success') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php elseif($this->session->flashdata('error')) : ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?= $this->session->flashdata('error') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif ?>
				

					<div class="card-header"><strong>Rincian Hari Ini</strong></div>
						<div class="card-body">
							<div class="row" >

								<div class="col-xl-3 col-md-6 mb-4"  >
									<div class="card border-left-danger shadow h-100 py-2" >
										<div class="card-body" >
										<div class="row no-gutters align-items-center" >
											<div class="col mr-2">
											<div class="text-xs font-weight-bold text-danger text-uppercase mb-1" >Pembelian Hari Ini</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pembelianperday ?></div>
											</div>
											<div class="col-auto">
											<i class="fas fa-file-invoice fa-2x text-gray-300"></i>
											</div>
										</div>
										</div>
									</div>
								</div>

								<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-danger shadow h-100 py-2">
									<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
										<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pengeluaran Hari Ini</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($total_pembeliansumperday, 0, ',', '.')?></div>
										</div>
										<div class="col-auto">
										<i class="fas fa-file-invoice-dollar fa-2x text-gray-300"></i>
										</div>
									</div>
									</div>
								</div>
								</div>

								<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-success shadow h-100 py-2">
									<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
										<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Penjualan Hari Ini</div>
										<div class="row no-gutters align-items-center">
											<div class="col-auto">
											<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $total_penjualanperday?></div>
											</div>
										</div>
										</div>
										<div class="col-auto">
										<i class="fas fa-file-invoice fa-2x text-gray-300"></i>
										</div>
									</div>
									</div>
								</div>
								</div>
								
								<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-success shadow h-100 py-2">
									<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
										<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pemasukan Hari Ini</div>
										<div class="row no-gutters align-items-center">
											<div class="col-auto">
											<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp <?= number_format($total_penjualansumperday, 0, ',', '.')?></div>
											</div>
										</div>
										</div>
										<div class="col-auto">
										<i class="fas fa-file-invoice-dollar fa-2x text-gray-300"></i>
										</div>
									</div>
									</div>
								</div>
								
							</div>
						</div>				
					</div>

					<div class="card-header"><strong>Rincian Keseluruhan</strong></div>
						<div class="card-body">
							<div class="row" >

							<div class="col-xl-3 col-md-6 mb-4">
		              <div class="card border-left-danger shadow h-100 py-2">
		                <div class="card-body">
		                  <div class="row no-gutters align-items-center">
		                    <div class="col mr-2">
		                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Pembelian</div>
		                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pembelian ?></div>
		                    </div>
		                    <div class="col-auto">
		                      <i class="fas fa-file-invoice fa-2x text-gray-300"></i>
		                    </div>
		                  </div>
		                </div>
		              </div>
		            </div>

							<div class="col-xl-3 col-md-6 mb-4">
		              <div class="card border-left-danger shadow h-100 py-2">
		                <div class="card-body">
		                  <div class="row no-gutters align-items-center">
		                    <div class="col mr-2">
		                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Pengeluaran</div>
		                      <div class="h5 mb-0 font-weight-bold text-gray-800"> Rp <?= number_format($total_pembeliansum, 0, ',', '.')?></div>
		                    </div>
		                    <div class="col-auto">
		                      <i class="fas fa-file-invoice-dollar fa-2x text-gray-300"></i>
		                    </div>
		                  </div>
		                </div>
		              </div>
		            </div>

								<div class="col-xl-3 col-md-6 mb-4">
									<div class="card border-left-success shadow h-100 py-2">
										<div class="card-body">
										<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Penjualan</div>
											<div class="row no-gutters align-items-center">
												<div class="col-auto">
											<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $total_penjualan ?></div>
										</div>
										</div>
										</div>
										<div class="col-auto">
										<i class="fas fa-file-invoice fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>							
								</div>
							  </div>
							  
							  <div class="col-xl-3 col-md-6 mb-4">
		              <div class="card border-left-success shadow h-100 py-2">
		                <div class="card-body">
		                  <div class="row no-gutters align-items-center">
		                    <div class="col mr-2">
		                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Pemasukan</div>
		                      <div class="h5 mb-0 font-weight-bold text-gray-800"> Rp <?= number_format($total_penjualansum, 0, ',', '.')?></div>
		                    </div>
		                    <div class="col-auto">
		                      <i class="fas fa-file-invoice-dollar fa-2x text-gray-300"></i>
		                    </div>
		                  </div>
		                </div>
		              </div>
		            </div>
						</div>
					</div>		


		        <div class="row">
		          	<div class="col-md-6">
						<div class="card shadow">
							<div class="card-header"><strong>Profil Toko</strong></div>
							<div class="card-body">
								<strong>Nama Toko : </strong><br>
								<input  type="text" value="<?= $toko->nama_toko ?>" readonly class="form-control mt-2 mb-2">
								<strong>Nama Pemilik : </strong><br>
								<input  type="text" value="<?= $toko->nama_pemilik ?>" readonly class="form-control mt-2 mb-2">
								<strong>No Telepon : </strong><br>
								<input  type="text" value="<?= $toko->no_telepon ?>" readonly class="form-control mt-2 mb-2">
								<strong>Alamat : </strong><br>
								<input  type="text" value="<?= $toko->alamat ?>" readonly class="form-control mt-2">
							</div>				
						</div>
		          	</div>
		          	<div class="col-md-6">
						<div class="card shadow">
							<div class="card-header"><strong>User Sedang Login</strong></div>
							<div class="card-body">
								<strong>Nama : </strong><br>
								<input type="text" value="<?= $this->session->login['nama'] ?>" readonly class="form-control mt-2 mb-2">
								<strong>Username : </strong><br>
								<input type="text" value="<?= $this->session->login['username'] ?>" readonly class="form-control mt-2 mb-2">
								<strong>Role : </strong><br>
								<input type="text" value="<?= $this->session->login['role'] ?>" readonly class="form-control mt-2 mb-2">
								<strong>Jam Login : </strong><br>
								<input type="text" value="<?= $this->session->login['jam_masuk'] ?>" readonly class="form-control mt-2">
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
	<script src="<?= base_url('sb-admin/js/demo/datatables-demo.js') ?>"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>
</html>