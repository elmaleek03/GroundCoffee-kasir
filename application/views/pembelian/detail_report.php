<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
	<link href="<?= base_url('sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
	<div class="row">
		<div class="col text-center">
			<h3 class="h3 text-dark"><?= $title ?></h3>
			<!-- <h4 class="h4 text-dark "><strong><?= $perusahaan->nama_perusahaan ?></strong></h4> -->
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-4">
		<div class="table-responsive">
			<table class="table table-borderless">
				<tr>
					<td><strong>No Pembelian</strong></td>
					<td>:</td>
					<td><?= $pembelian->no_pembelian ?></td>
				</tr>
				<tr>
					<td><strong>Nama Kasir</strong></td>
					<td>:</td>
					<td><?= $pembelian->nama_kasir ?></td>
				</tr>
				<tr>
					<td><strong>Waktu Pembelian</strong></td>
					<td>:</td>
					<td><?= $pembelian->tgl_pembelian ?> - <?= $pembelian->jam_pembelian ?></td>
				</tr>
			</table>
		</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered">
				<thead>
					<tr>
						<td><strong>No</strong></td>
						<td><strong>Nama Baku</strong></td>
						<td><strong>Harga Baku</strong></td>
						<td><strong>Jumlah</strong></td>
						<td><strong>Sub Total</strong></td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($all_detail_pembelian as $detail_pembelian): ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $detail_pembelian->nama_baku ?></td>
							<td>Rp <?= number_format($detail_pembelian->harga_baku, 0, ',', '.') ?></td>
							<td><?= $detail_pembelian->jumlah_baku ?> <?= strtoupper($detail_pembelian->satuan) ?></td>
							<td>Rp <?= number_format($detail_pembelian->sub_total, 0, ',', '.') ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="4" align="right"><strong>Total : </strong></td>
						<td>Rp <?= number_format($pembelian->total, 0, ',', '.') ?></td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</body>
</html>