<section class="content-header">
	<h1>
		Sirkulasi
		<small>Buku</small>
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
<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="?page=add_sirkul" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
				<button type="button" class="btn btn-box-tool" data-widget="remove">
					<i class="fa fa-remove"></i>
				</button>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>ID SKL</th>
							<th>Buku</th>
							<th>Peminjam</th>
							<th>Tgl Pinjam</th>
							<th>Tgl Kembali</th>
							<th>Denda</th>
							<th>Kelola</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT s.id_sk, b.judul_buku, a.nama, s.tgl_pinjam, s.tgl_kembali
                  from tb_sirkulasi s inner join tb_buku b on s.id_buku=b.id_buku
				  inner join tb_anggota a on s.id_anggota=a.id_anggota
				  WHERE CURDATE() > tgl_kembali order by tgl_pinjam desc");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['id_sk']; ?>
							</td>
							<td>
								<?php echo $data['judul_buku']; ?>
							</td>
							<td>
								<?php echo $data['nama']; ?>
							</td>
							<td>
								<?php echo $data['tgl_pinjam']; ?>
							</td>
							<td>
								<?php echo $data['tgl_kembali']; ?>
							</td>

							<?php
							// untuk menghitung selisih hari terlambat
							$t = date_create($data['tgl_kembali']);
							$n = date_create(date('Y-m-d'));
							$terlambat = date_diff($t, $n);
							$hari = $terlambat->format("%a");
							// menghitung denda
							$denda = $hari * 1000;
							?>

							<td>
								<?= $denda ?>
							</td>

							<td>
								<a href="?page=panjang&kode=<?php echo $data['nis']; ?>" onclick="return confirm('Perpanjang Data Ini ?')"
								 title="Perpanjang" class="btn btn-success">
									<i class="glyphicon glyphicon-edit"></i>
								</a>
								<a href="?page=kembali&kode=<?php echo $data['nis']; ?>" onclick="return confirm('Kembalikan Buku Ini ?')"
								 title="Kembalikan" class="btn btn-danger">
									<i class="glyphicon glyphicon-refresh"></i>
							</td>
						</tr>
						<?php
                  }
                ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</section>