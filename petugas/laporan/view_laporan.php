<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Laporan
		<small>Periodik</small>
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
					<h3 class="box-title">Atur Tanggal</h3>
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
				<form action="./report/laporan.php" method="post" enctype="multipart/form-data" target="_blank">
					<div class="box-body">

						<div class="form-group">
							<label>Tanggal Awal</label>
							<input type="date" name="tgl_1" id="tgl_1" class="form-control">
						</div>

						<div class="form-group">
							<label>Tanggal Akhir</label>
							<input type="date" name="tgl_2" id="tgl_2" class="form-control">
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" target="_blank" class="btn btn-info" name="btnCetak">Cetak</button>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>