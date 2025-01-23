<section class="content-header">
	<h1 style="text-align:center;">
		Laporan Denda
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>Si Perpustakaan</b>
			</a>
		</li>
	</ol>
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="?page=MyApp/print_laporan" title="Print" class="btn btn-success" style="color: green;">
				<i class="glyphicon glyphicon-print"></i>Print
			</a>
		</div>

		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>ID Peminjam</th>
							<th>Buku</th>
							<th>Peminjam</th>
							<th>Tgl Pinjam</th>
							<th>Jatuh Tempo</th>
							<th>Denda</th>
						</tr>
					</thead>
					<tbody>

					<?php
					$koneksi = mysqli_connect("localhost", "root", "", "data_perpus");

					if (!$koneksi) {
						die("Connection failed: " . mysqli_connect_error());
					}

					$sql = "SELECT 
						tb_sirkulasi.id_buku, 
						tb_buku.judul_buku, 
						tb_anggota.NIM,
						tb_anggota.nama,
						tb_sirkulasi.id_sk,
						tb_sirkulasi.tgl_pinjam,
						tb_sirkulasi.tgl_kembali,
						IF(DATEDIFF(NOW(), tb_sirkulasi.tgl_kembali) <= 0, 0, DATEDIFF(NOW(), tb_sirkulasi.tgl_kembali)) AS telat_pengembalian 
					FROM tb_sirkulasi 
					JOIN tb_anggota ON tb_anggota.NIM = tb_sirkulasi.NIM 
					JOIN tb_buku ON tb_buku.id_buku = tb_sirkulasi.id_buku 
					WHERE tb_sirkulasi.status = 'KEM' 
					ORDER BY tb_sirkulasi.id_sk";

					$result = mysqli_query($koneksi, $sql);

					if (!$result) {
						die("Query Error: " . mysqli_error($koneksi));
					}

					$no = 0;
					$total_denda = 0;
					$tarif_denda = 1000;

					while ($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
						$no++;
						$total_denda += ($data['telat_pengembalian'] * $tarif_denda);
						echo '<tr>
							<td>' . $no . '</td>
							<td>' . $data['id_sk'] . '</td>
							<td>' . $data['judul_buku'] . '</td>
							<td>' . $data['nama'] . '</td>
							<td>' . date('d/M/Y', strtotime($data['tgl_pinjam'])) . '</td>
							<td>' . date('d/M/Y', strtotime($data['tgl_kembali'])) . '</td>
							<td>Rp. ' . number_format($data['telat_pengembalian'] * $tarif_denda, 0, ',', '.') . '</td>
						</tr>';
					}
					?>
					<tr>
						<th colspan="7" style="text-align:right; padding-right:0.90cm;">
							Total Denda Rp. <?php echo number_format($total_denda, 0, ',', '.'); ?>
						</th>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
