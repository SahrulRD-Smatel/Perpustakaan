<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Tabungan
		<small>Pencarian</small>
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

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Cari Siswa</h3>
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
				<!-- form start -->
				<form action="?page=data_tabungan" method="post" enctype="multipart/form-data">
					<div class="box-body">

						<div class="form-group">
							<label>Siswa</label>
							<select name="nis" id="nis" class="form-control select2" style="width: 100%;">
								<option selected="selected">-- Pilih --</option>
								<?php
                        // ambil data dari database
                        $query = "select * from tb_siswa where status='Aktif'";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
								<option value="<?php echo $row['nis'] ?>">
									<?php echo $row['nis'] ?>
									-
									<?php echo $row['nama_siswa'] ?>
								</option>
								<?php
                        }
                        ?>
							</select required>
						</div>

						<div class="form-group">
							<label>Saldo Tabungan</label>
							<input type="text" name="saldo" id="saldo" class="form-control" placeholder="Saldo" readonly>
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Lihat" value="Lihat" class="btn btn-primary">
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<script src="././bootstrap/lookup.js"></script>
<script>
	$(document).ready(function() {
		$('#nis').change(function() {
			var nis = $(this).val();
			$.ajax({
				url: "plugins/proses-ajax.php",
				method: "POST",
				data: {
					nis: nis
				},
				success: function(data) {
					$('#saldo').val(data);
				}
			});
		});
	});
</script>