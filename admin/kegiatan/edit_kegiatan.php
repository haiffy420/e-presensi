<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * from tb_kegiatan where id_kegiatan ='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Kegiatan</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="id_kegiatan" name="id_kegiatan" value="<?php echo $data_cek['id_kegiatan']; ?>" readonly />
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kelas</label>
				<div class="col-sm-3">
					<select name="kelas" id="kelas" class="form-control">
						<option value="-">-- Pilih Status --</option>
						<?php
						//menhecek data yg dipilih sePanti sosialnya
						if ($data_cek['kelas'] == "7A") echo "<option value='7A' selected>7A</option>";
						else echo "<option value='7A'>7A</option>";

						if ($data_cek['kelas'] == "7B") echo "<option value='7B' selected>7B</option>";
						else echo "<option value='7B'>7B</option>";

						if ($data_cek['kelas'] == "Janda") echo "<option value='Janda' selected>Janda</option>";
						else echo "<option value='Janda'>Janda</option>";

						if ($data_cek['kelas'] == "Duda") echo "<option value='Duda' selected>Duda</option>";
						else echo "<option value='Duda'>Duda</option>";
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Hari</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="hari" name="hari" value="<?php echo $data_cek['hari']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="tgl" name="tgl" value="<?php echo $data_cek['tgl']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jam ke</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="jam_ke" name="jam_ke" value="<?php echo $data_cek['jam_ke']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Mata Pelajaran</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="mapel" name="mapel" value="<?php echo $data_cek['mapel']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pokok Bahasan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="pokok_bahas" name="pokok_bahas" value="<?php echo $data_cek['pokok_bahas']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Rangkuman</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="rangkuman" name="rangkuman" value="<?php echo $data_cek['rangkuman']; ?>" />
				</div>
			</div>

			
		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=view-kegiatan&kode=<?php echo $data_cek['id_kegiatan']; ?>" title="Kembali" class="btn btn-secondary">Kembali</a>
		</div>
	</form>
</div>

<?php
$id_lan = $_GET['kode']; 
if (isset($_POST['Ubah'])) {
	$sql_ubah =
		"UPDATE tb_kegiatan SET 
		kelas='" . $_POST['kelas'] . "',
		hari='" . $_POST['hari'] . "',
		tgl='" . $_POST['tgl'] . "',
		jam_ke='" . $_POST['jam_ke'] . "',
		mapel='" . $_POST['mapel'] . "',
		pokok_bahas='" . $_POST['pokok_bahas'] . "',
		rangkuman='" . $_POST['rangkuman'] . "'
		WHERE id_kegiatan='" . $_POST['id_kegiatan'] . "'";

	$query_ubah = mysqli_query($koneksi, $sql_ubah) 
	or trigger_error("Query Failed! SQL: $sql_ubah - Error: " . mysqli_error($koneksi), E_USER_ERROR);
	mysqli_close($koneksi);
	// }

	if ($query_ubah) {
		echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = '?page=view-kegiatan&kode=$id_lan';
        }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = '?page=view-kegiatan&kode=$id_lan';
        }
      })</script>";
	}
}
?>