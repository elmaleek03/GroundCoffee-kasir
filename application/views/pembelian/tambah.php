<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('partials/head.php') ?>
</head>

<body id="page-top">
	<div id="wrapper" >
		<!-- load sidebar -->
		<?php $this->load->view('partials/sidebar.php') ?>

		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('pembelian') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>

				<div class="container-fluid">
				<div class="clearfix">
					<div class="float-left">
						<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
					</div>
					<div class="float-right">
						<a href="<?= base_url('pembelian') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col">
						<div class="card shadow">
							<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
							<div class="card-body">
								<form action="<?= base_url('pembelian/proses_tambah') ?>" id="form-tambah" method="POST">
									<h5>Data Kasir</h5>
									<hr>
									<div class="form-row">
										<div class="form-group col-xs-6 .col-md-10">
											<label>No. Pembelian</label>
											<input type="text" name="no_pembelian" value="PB<?= time() ?>" readonly class="form-control">
										</div>
										<div class="form-group col-xs-6 .col-md-10">
											<label>Nama Kasir</label>
											<input type="text" name="nama_kasir" value="<?= $this->session->login['nama'] ?>" readonly class="form-control">
										</div>
										<div class="form-group col-xs-6 .col-md-10">
											<label>Tanggal Pembelian</label>
											<input type="text" name="tgl_pembelian" value="<?= date('Y/m/d') ?>" readonly class="form-control">
										</div>
										<div class="form-group col-xs-6 .col-md-10">
											<label>Jam</label>
											<input type="text" name="jam_pembelian" value="<?= date('H:i:s') ?>" readonly class="form-control">
										</div>
										<div class="form-group col-xs-6 .col-md-10">
											<label>Kode Kasir</label>
											<input type="text" name="kode_kasir" value="<?= $this->session->login['kode'] ?>" readonly class="form-control">
										</div>
									</div>
									<h5>Data Bahan Baku</h5>
									<hr>
									<div class="form-row">
										<div class="form-group col-xs-6 .col-md-10">
											<label for="nama_baku">Nama Baku</label>
											<select name="nama_baku" id="nama_baku" class="form-control">
												<option value="">Pilih Baku</option>
												<?php foreach ($all_baku as $baku): ?>
													<option value="<?= $baku->nama_baku ?>"><?= $baku->nama_baku ?></option>
												<?php endforeach ?>
											</select>
										</div>
										<div class="form-group col-xs-8 .col-md-10">
											<label>Kode Baku</label>
											<input type="text" name="kode_baku" value="" readonly class="form-control">
										</div>
										<div class="form-group col-xs-6 .col-md-10">
											<label>Harga Baku</label>
											<input type="text" name="harga_baku" value="" readonly class="form-control">
										</div>
										<div class="form-group col-xs-6 .col-md-10">
											<label>Jumlah</label>
											<input type="number" name="jumlah" value="" class="form-control" readonly min='1'>
										</div>
										<div class="form-group col-xs-6 .col-md-10">
											<label>Sub Total</label>
											<input type="number" name="sub_total" value="" class="form-control" readonly>
										</div>
										<div class="form-group col-xs-6 .col-md-10">
											<label for="">&nbsp;</label>
											<button disabled type="button" class="btn btn-primary btn-block" id="tambah"><i class="fa fa-plus"></i></button>
										</div>
										<input type="hidden" name="satuan" value="">
									</div>
									<div class="keranjang">
										<h5>Detail Pembelian</h5>
										<hr>
										<div class="table-responsive">
										<table class="table table-bordered" id="keranjang">
											<thead>
												<tr>
													<td width="35%">Nama Baku</td>
													<td width="15%">Harga</td>
													<td width="15%">Jumlah</td>
													<td width="10%">Satuan</td>
													<td width="10%">Sub Total</td>
													<td width="15%">Aksi</td>
												</tr>
											</thead>
											<tbody>
												
											</tbody>
											<tfoot>
												<tr>
													<td colspan="4" align="right"><strong>Total : </strong></td>
													<td id="total"></td>
													
													<td>
														<input type="hidden" name="total_hidden" value="">
														<input type="hidden" name="max_hidden" value="">
														<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
													</td>
												</tr>
											</tfoot>
										</table>
									</div>
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
	<script>
		$(document).ready(function(){
			$('tfoot').hide()

			$(document).keypress(function(event){
		    	if (event.which == '13') {
		      		event.preventDefault();
			   	}
			})

			$('#nama_baku').on('change', function(){

				if($(this).val() == '') reset()
				else {
					const url_get_all_baku = $('#content').data('url') + '/get_all_baku'
					$.ajax({
						url: url_get_all_baku,
						type: 'POST',
						dataType: 'json',
						data: {nama_baku: $(this).val()},
						success: function(data){
							$('input[name="kode_baku"]').val(data.kode_baku)
							$('input[name="harga_baku"]').val(data.harga_beli)
							$('input[name="jumlah"]').val(1)
							$('input[name="satuan"]').val(data.satuan)
							$('input[name="max_hidden"]').val(data.stok)
							$('input[name="jumlah"]').prop('readonly', false)
							$('button#tambah').prop('disabled', false)

							$('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_baku"]').val())
							
							$('input[name="jumlah"]').on('keydown keyup change blur', function(){
								$('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_baku"]').val())
							})
						}
					})
				}
			})

			$(document).on('click', '#tambah', function(e){
				const url_keranjang_baku = $('#content').data('url') + '/keranjang_baku'
				const data_keranjang = {
					nama_baku: $('select[name="nama_baku"]').val(),
					harga_baku: $('input[name="harga_baku"]').val(),
					jumlah: $('input[name="jumlah"]').val(),
					satuan: $('input[name="satuan"]').val(),
					sub_total: $('input[name="sub_total"]').val(),
				}

					$.ajax({
						url: url_keranjang_baku,
						type: 'POST',
						data: data_keranjang,
						success: function(data){
							if($('select[name="nama_baku"]').val() == data_keranjang.nama_baku) $('option[value="' + data_keranjang.nama_baku + '"]').hide()
							reset()

							$('table#keranjang tbody').append(data)
							$('tfoot').show()

							$('#total').html('<strong>' + hitung_total() + '</strong>')
							$('input[name="total_hidden"]').val(hitung_total())
						}
					})

			})


			$(document).on('click', '#tombol-hapus', function(){
				$(this).closest('.row-keranjang').remove()

				$('option[value="' + $(this).data('nama-baku') + '"]').show()

				if($('tbody').children().length == 0) $('tfoot').hide()
			})

			$('button[type="submit"]').on('click', function(){
				$('input[name="kode_baku"]').prop('disabled', true)
				$('select[name="nama_baku"]').prop('disabled', true)
				$('input[name="harga_baku"]').prop('disabled', true)
				$('input[name="jumlah"]').prop('disabled', true)
				$('input[name="sub_total"]').prop('disabled', true)
			})

			function hitung_total(){
				let total = 0;
				$('.sub_total').each(function(){
					total += parseInt($(this).text())
				})

				return total;
			}

			function reset(){
				$('#nama_baku').val('')
				$('input[name="kode_baku"]').val('')
				$('input[name="harga_baku"]').val('')
				$('input[name="jumlah"]').val('')
				$('input[name="sub_total"]').val('')
				$('input[name="jumlah"]').prop('readonly', true)
				$('button#tambah').prop('disabled', true)
			}
		})
	</script>
</body>
</html>