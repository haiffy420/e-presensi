<?php

$sql = $koneksi->query("SELECT COUNT(id_kegiatan) as kegiatan  from tb_kegiatan");
while ($data = $sql->fetch_assoc()) {
	$kegiatan = $data['kegiatan'];
}

$sql = $koneksi->query("SELECT COUNT(id_guru) as guru  from tb_guru");
while ($data = $sql->fetch_assoc()) {
	$guru = $data['guru'];
}

// $sql = $koneksi->query("SELECT COUNT(id_kegiatan) as sehat  from tb_kegiatan where status='Sehat'");
// while ($data = $sql->fetch_assoc()) {
// 	$kartu = $data['sehat'];
// }

// $sql = $koneksi->query("SELECT COUNT(id_kegiatan) as kurang_sehat from tb_kegiatan where status='Kurang Sehat'");
// while ($data = $sql->fetch_assoc()) {
// 	$laki = $data['kurang_sehat'];
// }

// $sql = $koneksi->query("SELECT COUNT(id_kegiatan) as sakit from tb_kegiatan where status='Sakit'");
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

<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3>
					<?php echo $kegiatan;  ?>
				</h3>

				<p>Kegiatan</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="index.php?page=data-kegiatan" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>
					<?php echo $guru;  ?>
				</h3>

				<p>Guru</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="index.php?page=data-guru" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>

</div>