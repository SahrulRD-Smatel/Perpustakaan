<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_anggota WHERE id_anggota='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<section class="content-header">
	<h1>
		Master Data
		<small>Data Anggota</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>TELKOMPUS</b>
			</a>
		</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Ubah Anggota</h3>
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
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">

						<div class="form-group">
							<label>Id anggota</label>
							<input type='text' class="form-control" name="id_anggota" value="<?php echo $data_cek['id_anggota']; ?>"
							 readonly/>
						</div>

						<div class="form-group">
							<label>Nama</label>
							<input type='text' class="form-control" name="nama" value="<?php echo $data_cek['nama']; ?>"
							/>
						</div>

						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select name="jekel" id="jekel" class="form-control" required>
								<option value="">-- Pilih --</option>
								<?php
                                //cek data yg dipilih sebelumnya
                                if ($data_cek['jekel'] == "LK") echo "<option value='LK' selected>LK</option>";
                                else echo "<option value='LK'>LK</option>";
                                
                                if ($data_cek['jekel'] == "PR") echo "<option value='PR' selected>PR</option>";
                                else echo "<option value='PR'>PR</option>";
                            ?>
							</select>
						</div>

						<div class="form-group">
							<label>Alamat</label>
							<input type='text' class="form-control" name="alamat" value="<?php echo $data_cek['alamat']; ?>"
							/>
						</div>

						<div class="form-group">
							<label>No HP</label>
							<input type='number' class="form-control" name="no_hp" value="<?php echo $data_cek['no_hp']; ?>"
							/>
						</div>

					</div>
					<!-- /.box-body -->
					</br>
					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success rounded-pill">
						<a href="?page=MyApp/data_agt" class="btn btn-warning rounded-pill">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset ($_POST['Ubah'])){
    //mulai proses ubah
    $sql_ubah = "UPDATE tb_anggota SET
		nama='".$_POST['nama']."',
		jekel='".$_POST['jekel']."',
		alamat='".$_POST['alamat']."',
        no_hp='".$_POST['no_hp']."'
        WHERE id_anggota='".$_POST['id_anggota']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_agt';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_agt';
            }
        })</script>";
    }
}

