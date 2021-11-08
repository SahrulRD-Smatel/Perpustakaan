<!-- Content Header (Page header) -->
<?php 
$data_nama = $_SESSION["ses_nama"];
?>

<section class="content-header">
	<h1>
		Transaksi
		<small>Tarikan</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>Si Tabsis</b>
			</a>
		</li>
	</ol>
</section>
<!-- Main content -->

<section class="content">

	<!-- /.box-header -->

	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4>
			<i class="icon fa fa-info"></i> Total Tarikan</h4>
		<?php
    		$sql = $koneksi->query("SELECT SUM(tarik) as total  from tb_tabungan where jenis='TR'");
    		while ($data= $sql->fetch_assoc()) {
  		?>
		<h3>
			<?php echo rupiah($data['total']); }?>
		</h3>
	</div>


	<div class="box box-primary">
		<div class="box-header">
			<a href="?page=add_tarik" class="btn btn-primary">
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
							<th>NIS</th>
							<th>Nama</th>
							<th>Tanggal</th>
							<th>Tarikan</th>
							<th>Petugas</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php

                  $no = 1;
				  $sql = $koneksi->query("select s.nis, s.nama_siswa, t.id_tabungan, t.tarik, t.tgl, t.petugas from 
				  tb_siswa s join tb_tabungan t on s.nis=t.nis 
				  where jenis ='TR' order by tgl desc, id_tabungan desc");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['nis']; ?>
							</td>
							<td>
								<?php echo $data['nama_siswa']; ?>
							</td>
							<td>
								<?php  $tgl = $data['tgl']; echo date("d/M/Y", strtotime($tgl))?>
							</td>
							<td align="right">
								<?php echo rupiah($data['tarik']); ?>
							</td>
							<td>
								<?php echo $data['petugas']; ?>
							</td>
							<td>

								<a href="?page=edit_tarik&kode=<?php echo $data['id_tabungan']; ?>" title="Ubah"
								 class="btn btn-success btn-sm">
									<i class="glyphicon glyphicon-edit"></i>
								</a>
								<a href="?page=del_tarik&kode=<?php echo $data['id_tabungan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
								 title="Hapus" class="btn btn-danger btn-sm">
									<i class="glyphicon glyphicon-trash"></i>
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