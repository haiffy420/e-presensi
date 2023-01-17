<!-- <?php
if (isset($_GET['kode'])) {
	$sql_cek_p = "SELECT * from tb_guru where id_guru ='" . $_GET['kode'] . "'";
	$query_cek_p = mysqli_query($koneksi, $sql_cek_p);
	$data_cek_p = mysqli_fetch_array($query_cek_p, MYSQLI_BOTH);
}
?> -->
<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT tb_guru.* from tb_guru where id_guru ='" . $_GET['kode'] . "'";
	$query_cek_p = mysqli_query($koneksi, $sql_cek);
	$data_cek_p = mysqli_fetch_array($query_cek_p, MYSQLI_BOTH);
}
?>
<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data Guru
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<!-- <label class="col-sm-2 col-form-label">No Sistem</label> -->
				<div class="col-sm-2">
					<input type="text" class="form-control" id="id_guru" name="id_guru" value="<?php echo $data_cek_p['id_guru']; ?>" readonly hidden />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_guru" name="nama_guru" value="<?php echo $data_cek_p['nama_guru']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIP</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nip" name="nip" value="<?php echo $data_cek_p['nip']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_g" name="alamat_g" value="<?php echo $data_cek_p['alamat_g']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Telepon</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_telepon_g" name="no_telepon_g" value="<?php echo $data_cek_p['no_telepon_g']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="email_g" name="email_g" value="<?php echo $data_cek_p['email_g']; ?>" />
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=guru&kode=<?php echo $data_cek_p['id_guru']; ?>" title="Kembali" class="btn btn-secondary">Kembali</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Ubah'])) {
	$sql_ubah =
		"UPDATE tb_guru SET 
		nama_guru='" . $_POST['nama_guru'] . "',
		nip='" . $_POST['nip'] . "',
		no_telepon_g='" . $_POST['no_telepon_g'] . "',
		alamat_g='" . $_POST['alamat_g'] . "',
		email_g='" . $_POST['email_g'] . "',
		WHERE id_guru='" . $_POST['id_guru'] . "'";

	$query_ubah = mysqli_query($koneksi, $sql_ubah);
// 	or trigger_error("Query Failed! SQL: $sql_ubah - Error: " . mysqli_error($koneksi), E_USER_ERROR);
	mysqli_close($koneksi);


	if ($query_ubah) {
		echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = '';
        }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = '';
        }
      })</script>";
	}
}
?>