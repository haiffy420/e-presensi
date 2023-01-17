<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT p.id_kegiatan, p.kelas, p.hari, p.tgl, p.jam_ke, p.mapel, p.pokok_bahas, p.rangkuman, p.id_guru, g.nama_guru from tb_kegiatan p left join tb_guru g on p.id_guru=g.id_guru where id_kegiatan ='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
$id_pas = $data_cek['id_kegiatan'];
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-user"></i> Detail Kegiatan
		</h3>
		</h3>
		<div class="card-tools">
		</div>
	</div>

	<div class="card-body p-0">
		<table class="table">
			<tbody>
				<tr>
					<td style="width: 150px">
						<b>Nama Guru</b>
					</td>
					<td>:
						<?php echo $data_cek['nama_guru']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Kelas</b>
					</td>
					<td>:
						<?php echo $data_cek['kelas']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Hari</b>
					</td>
					<td>:
						<?php echo $data_cek['hari']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Tanggal</b>
					</td>
					<td>:
						<?php echo $data_cek['tgl']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Jam ke</b>
					</td>
					<td>:
						<?php echo $data_cek['jam_ke']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Mata Pelajaran</b>
					</td>
					<td>:
						<?php echo $data_cek['mapel']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Pokok Bahasan</b>
					</td>
					<td>:
						<?php echo $data_cek['pokok_bahas']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Rangkuman</b>
					</td>
					<td>:
						<?php echo $data_cek['rangkuman']; ?>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="card-footer">
			<?php
			if ($data_level == "Administrator") {
			?>
				<a href="?page=edit-kegiatan&kode=<?php echo $data_cek['id_kegiatan']; ?>" title="Ubah" class="btn btn-success">Ubah</a>
				<a href="?page=data-kegiatan" class="btn btn-secondary">Kembali</a>
			<?php
			} elseif ($data_level == "Guru") {
			?>
				<a href="?page=data-kegiatan" class="btn btn-secondary">Kembali</a>
			<?php } ?>
		</div>
	</div>
</div>