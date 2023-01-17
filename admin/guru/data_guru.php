<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Guru</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
				<?php
					if ($data_level == "Administrator") {
				?>
		<div class="table-responsive">
			<div>
				<!--<a href="?page=add-guru" class="btn btn-primary">-->
				<!--	<i class="fa fa-edit"></i> Tambah Data</a>-->
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Guru</th>
						<th>NIP</th>
						<th>Alamat</th>
						<th>No Telepon</th>
						<th>Email</th>
						<th width=50x>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  
              $sql = $koneksi->query("select tb_guru.* from tb_guru");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nama_guru']; ?>
						</td>
						<td>
							<?php echo $data['nip']; ?>
						</td>
						<td>
							<?php echo $data['alamat_g']; ?>
			  			</td>
						<td>
							<?php echo $data['no_telepon_g']; ?>
			  			</td>
						<td>
							<?php echo $data['email_g']; ?>
						</td>
						<td>
						<a href="?page=guru&kode=<?php echo $data['id_guru']; ?>" title="Detail Guru"
							 class="btn btn-info btn-sm">
								<i class="fa fa-user"></i>
							</a>
							<a href="?page=edit-guru&kode=<?php echo $data['id_guru']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<!-- <a href="?page=del-guru&kode=<?php echo $data['id_guru']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
							</a> -->
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
				<!--<a href="?page=add-guru" class="btn btn-primary">-->
				<!--	<i class="fa fa-edit"></i> Tambah Data</a>-->
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Guru</th>
						<th>NIP</th>
						<th>Hubungan</th>
						<th>Alamat</th>
						<th>No Telepon</th>
						<th witdh>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  
              $sql = $koneksi->query("select tb_guru.*, tb_kegiatan.nama from tb_guru inner join tb_kegiatan on tb_guru.id_kegiatan = tb_kegiatan.id_kegiatan");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nama_guru']; ?>
						</td>
						<td>
							<?php echo $data['nama']; ?>
						</td>
						<td>
							<?php echo $data['hub_lansia']; ?>
			  			</td>
						<td>
							<?php echo $data['alamat_p']; ?>
			  			</td>
						<td>
							<?php echo $data['no_telepon_p']; ?>
						</td>
						<td>
						<a href="?page=guru&kode=<?php echo $data['id_guru']; ?>" title="guru"
							 class="btn btn-info btn-sm">
								<i class="fa fa-user"></i>
							</a>
							<!-- <a href="?page=edit-guru&kode=<?php echo $data['id_guru']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-guru&kode=<?php echo $data['id_guru']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
							</a> -->
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
	<!-- /.card-body -->