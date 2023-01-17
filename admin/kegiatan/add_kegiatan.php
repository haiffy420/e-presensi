<?php
include "inc/koneksi.php";
?>
<div class="card card-info ">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Presensi
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<div class="col-md-6 col-sm-12 mb-3">
					<label>Kelas</label>
					<select name="kelas" id="kelas" class="form-control">
						<option value="-">- Pilih -</option>
						<option>7A</option>
						<option>7B</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Hari</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="hari" name="hari" placeholder="Hari" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="tgl" name="tgl" placeholder="Tanggal">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jam ke</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="jam_ke" name="jam_ke" placeholder="Jam ke">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Mata Pelajaran</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="mapel" name="mapel" placeholder="Mata Pelajaran">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pokok Bahasan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="pokok_bahas" name="pokok_bahas" placeholder="Pokok Bahasan">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Rangkuman</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="rangkuman" name="rangkuman" placeholder="Rangkuman">
				</div>
			</div>
			<div class="form-group row" hidden>
				<?php
				mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
				$sql = $koneksi->query("SELECT g.id_guru from tb_guru g left join tb_pengguna u on g.id_pengguna=u.id_pengguna where u.id_pengguna='$data_id'");
				while ($data = $sql->fetch_assoc()) {
				?>
					<label class="col-sm-2 col-form-label">ID Guru</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="id_guru" name="id_guru" value="<?php echo $data['id_guru']; ?>">
					</div>
				<?php } ?>
			</div>
			<div class="card-footer">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
				<a href="?page=data-kegiatan" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {
	//mulai proses simpan data

	$sql_simpan = "INSERT INTO tb_kegiatan ( kelas, hari, tgl, jam_ke, mapel, pokok_bahas, rangkuman, id_guru) VALUES (
			'" . $_POST['kelas'] . "',
            '" . $_POST['hari'] . "',
			'" . $_POST['tgl'] . "',
			'" . $_POST['jam_ke'] . "',
			'" . $_POST['mapel'] . "',
            '" . $_POST['pokok_bahas'] . "',
            '" . $_POST['rangkuman'] . "',
			'" . $_POST['id_guru'] . "')";

	$query_simpan = mysqli_query($koneksi, $sql_simpan);

	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-kegiatan';
          }
      })</script>";
	} else {
		echo trigger_error("Query Failed! SQL: $sql_simpan - Error: " . mysqli_error($koneksi), E_USER_ERROR);
		"<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-kegiatan';
          }
      })</script>";
	}
}
mysqli_close($koneksi);
//selesai proses simpan data
?>