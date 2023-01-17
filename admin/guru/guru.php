<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT tb_guru.* from tb_guru where id_guru ='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-user"></i> Detail guru
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
						<b>Nama guru</b>
					</td>
					<td>:
						<?php echo $data_cek['nama_guru']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>NIP</b>
					</td>
					<td>:
						<?php echo $data_cek['nip']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Alamat guru</b>
					</td>
					<td>:
						<?php echo $data_cek['alamat_g']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>No Telepon</b>
					</td>
					<td>:
						<?php echo $data_cek['no_telepon_g']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Email</b>
					</td>
					<td>:
						<?php echo $data_cek['email_g']; ?>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="card-footer">
		<?php
		if ($data_level == "Administrator") {
		?>
			<a href="?page=edit-guru&kode=<?php echo $data_cek['id_guru']; ?>" title="Ubah guru" class="btn btn-success">Ubah</a>
			<a href="?page=data-guru" class="btn btn-secondary">Kembali</a>
			<?php
		} elseif ($data_level == "Guru") {
		?>
		<a href="?page=data-guru" class="btn btn-secondary">Kembali</a>
		<?php }?>
		</div>
	</div>
</div>