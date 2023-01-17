<!-- <script>
		var table = $('#example1').DataTable();

$('.dataTables_filter input').unbind().bind('keyup', function() {
   var searchTerm = this.value.toLowerCase(),
       regex = '\\b' + searchTerm + '\\b';
   table.rows().search(regex, true, false).draw();
})
	</script> -->
<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Kegiatan
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<?php
		if ($data_level == "Administrator") {
		?>

			<div class="table-responsive">
				<!-- <div>
					<a href="?page=add-kegiatan" class="btn btn-primary">
						<i class="fa fa-edit"></i> Tambah Data</a>
					<a target="_blank" href="export.php" class="btn btn-primary">Export</a>
				</div> -->

				<br>

				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width=10px>No</th>
							<th width=100px>Nama Guru</th>
							<th width=30px>Kelas</th>
							<th width=10px>Hari</th>
							<th width=50px>Tanggal</th>
							<th width=10px>Jam Ke</th>
							<th width=50px>Mata Pelajaran</th>
							<th width=85x>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
						$no = 1;
						$sql = $koneksi->query("SELECT p.id_kegiatan, p.kelas, p.hari, p.tgl, p.jam_ke, p.mapel, p.pokok_bahas, p.rangkuman, p.id_guru, g.nama_guru from tb_kegiatan p left join tb_guru g on p.id_guru=g.id_guru");
						while ($data = $sql->fetch_assoc()) {
						?>

							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php echo $data['nama_guru']; ?>
								</td>
								<td>
									<?php echo $data['kelas']; ?>
								</td>
								<td>
									<?php echo $data['hari']; ?>
								</td>
								<td>
									<?php echo $data['tgl']; ?>
								</td>
								<td>
									<?php echo $data['jam_ke']; ?>
								</td>
								<td>
									<?php echo $data['mapel']; ?>
								</td>
								<td>

									<a href="?page=view-kegiatan&kode=<?php echo $data['id_kegiatan']; ?>" title="Detail" class="btn btn-info btn-sm">
										<i class="fa fa-eye"></i>
									</a>
									<a href="?page=edit-kegiatan&kode=<?php echo $data['id_kegiatan']; ?>" title="Ubah" class="btn btn-success btn-sm">
										<i class="fa fa-edit"></i>
									</a>
									<a href="?page=del-kegiatan&kode=<?php echo $data['id_kegiatan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
										<i class="fa fa-trash"></i>
									</a>
								</td>
							</tr>

						<?php
						}
						?>
					</tbody>
					</tfoot>
				</table>
			</div>

		<?php
		} elseif ($data_level == "Guru") {
		?>
			<div class="table-responsive">
				<div>
					<a href="?page=add-kegiatan" class="btn btn-primary">
						<i class="fa fa-edit"></i> Tambah Data Presensi</a>
					<a target="_blank" href="export.php" class="btn btn-primary">Export</a>
				</div>
				<br>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width=10px>No</th>
							<th width=30px>Kelas</th>
							<th width=30px>Hari</th>
							<th width=30px>Tanggal</th>
							<th width=50px>Mata Pelajaran</th>
							<th width=85x>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
						$no = 1;
						$sql = $koneksi->query("SELECT p.id_kegiatan, p.kelas, p.hari, p.tgl, p.jam_ke, p.mapel, p.pokok_bahas, p.rangkuman, p.id_guru from tb_kegiatan p left join tb_guru g on p.id_guru=g.id_guru left join tb_pengguna u on g.id_pengguna=u.id_pengguna where u.id_pengguna='$data_id' order by p.id_kegiatan desc");
						while ($data = $sql->fetch_assoc()) {
						?>

							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php echo $data['kelas']; ?>
								</td>
								<td>
									<?php echo $data['hari']; ?>
								</td>
								<td>
									<?php echo $data['tgl']; ?>
								</td>
								<td>
									<?php echo $data['mapel']; ?>
								</td>

								<td>
									<a href="?page=view-kegiatan&kode=<?php echo $data['id_kegiatan']; ?>" title="Detail" class="btn btn-info btn-sm">
										<i class="fa fa-eye"></i>
									</a>
									<a href="?page=edit-kegiatan&kode=<?php echo $data['id_kegiatan']; ?>" title="Ubah" class="btn btn-success btn-sm">
										<i class="fa fa-edit"></i>
									</a>
									<a href="?page=del-kegiatan&kode=<?php echo $data['id_kegiatan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
										<i class="fa fa-trash"></i>
									</a>
								</td>
							</tr>

						<?php
						}
						?>
					</tbody>
					</tfoot>
				</table>
			<?php
		}
			?>
			</div>
	</div>

	<!-- <script>
		$(document).ready(function() {
			$('#example1').DataTable({
				initComplete: function() {
					this.api()
						.columns()
						.every(function() {
							var column = this;
							var select = $('<select><option value=""></option></select>')
								.appendTo($(column.footer()).empty())
								.on('change', function() {
									var val = $.fn.dataTable.util.escapeRegex($(this).val());

									column.search(val ? '^' + val + '$' : '', true, false).draw();
								});

							column
								.data()
								.unique()
								.sort()
								.each(function(d, j) {
									select.append('<option value="' + d + '">' + d + '</option>');
								});
						});
				},
			});
		});
	</script> -->

	<!-- <script>
		$(document).ready(function() {
			$('#example1').DataTable({
				dom: 'Bfrtip',
				buttons: [{
						extend: 'copyHtml5',
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5]
						}
					},
					{
						extend: 'excelHtml5',
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5]
						}
					},
					{
						extend: 'pdfHtml5',
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5]
						}
					},
					{
						extend: 'print',
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5]
						}
					}
				]
			});
		});
	</script> -->
	<!-- /.card-body -->