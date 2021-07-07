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
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<td>No Pembelian</td>
					<td>Nama Kasir</td>
					<td>Tanggal Pembelian</td>
					<td>Total</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($all_pembelian as $pembelian): ?>
					<tr>
						<td><?= $pembelian->no_pembelian ?></td>
						<td><?= $pembelian->nama_kasir ?></td>
						<td><?= $pembelian->tgl_pembelian ?> Pukul <?= $pembelian->jam_pembelian ?></td>
						<td>Rp <?= number_format($pembelian->total, 0, ',', '.') ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>