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
					<td>No</td>
					<td>Kode Baku</td>
					<td>Nama Baku</td>
					<td>Harga Beli</td>
					<td>Harga Jual</td>
					<td>Stok</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($all_baku as $baku): ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $baku->kode_baku ?></td>
						<td><?= $baku->nama_baku ?></td>
						<td>Rp <?= number_format($baku->harga_beli, 0, ',', '.') ?></td>
						<td>Rp <?= number_format($baku->harga_jual, 0, ',', '.') ?></td>
						<td><?= $baku->stok ?> <?= strtoupper($baku->satuan) ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>