<?php

// $sql = $koneksi->query("SELECT COUNT(id_pasien) as lansia  from tb_pasien where status!='Meninggal'");
// while ($data = $sql->fetch_assoc()) {
// 	$lansia = $data['lansia'];
// }

// $sql = $koneksi->query("SELECT COUNT(id_penanggung) as penanggung  from tb_penanggung");
// while ($data = $sql->fetch_assoc()) {
// 	$penang = $data['penanggung'];
// }

// $sql = $koneksi->query("SELECT COUNT(id_pasien) as sehat  from tb_pasien where status='Sehat'");
// while ($data = $sql->fetch_assoc()) {
// 	$kartu = $data['sehat'];
// }

// $sql = $koneksi->query("SELECT COUNT(id_pasien) as kurang_sehat from tb_pasien where status='Kurang Sehat'");
// while ($data = $sql->fetch_assoc()) {
// 	$laki = $data['kurang_sehat'];
// }

// $sql = $koneksi->query("SELECT COUNT(id_pasien) as sakit from tb_pasien where status='Sakit'");
// while ($data = $sql->fetch_assoc()) {
// 	$prem = $data['sakit'];
// }


// $sql = $koneksi->query("SELECT COUNT(id_lahir) as lahir from tb_lahir");
// while ($data = $sql->fetch_assoc()) {
// 	$lahir = $data['lahir'];
// }

// $sql = $koneksi->query("SELECT COUNT(id_mendu) as mendu  from tb_mendu");
// while ($data = $sql->fetch_assoc()) {
// 	$mendu = $data['mendu'];
// }

// $sql = $koneksi->query("SELECT COUNT(id_datang) as datang  from tb_datang");
// while ($data = $sql->fetch_assoc()) {
// 	$datang = $data['datang'];
// }

// $sql = $koneksi->query("SELECT COUNT(id_pindah) as pindah  from tb_pindah");
// while ($data = $sql->fetch_assoc()) {
// 	$pindah = $data['pindah'];
// }

?>
<div>
	
</div>
<div class="row">
	<?php

	if (isset($_SESSION['ses_id'])) {
		$sql_cek = "SELECT tb_guru.* from tb_guru where id_guru ='" . $_SESSION['ses_id'] . "'";
		$query_cek = mysqli_query($koneksi, $sql_cek);
		$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
	}
	?>
	<div class="card card-success">
		<div class="card-header">
			<h3 class="card-title">
				<i class="fa fa-user"></i> Profil
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
							<b>Nama</b>
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
				if ($data_level == "Guru") {
				?>
					<a href="?page=edit-guru&kode=<?php echo $data_cek['id_guru']; ?>" title="Ubah guru" class="btn btn-success">Ubah</a>
					<a href="?page=data-guru" class="btn btn-secondary">Kembali</a>
					<!-- <?php
						} elseif ($data_level == "Guru") {
							?>
			<a href="?page=data-guru" class="btn btn-secondary">Kembali</a> -->
				<?php } ?>
			</div>
		</div>
	</div>

</div>