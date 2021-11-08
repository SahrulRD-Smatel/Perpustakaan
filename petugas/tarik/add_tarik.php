<!-- Content Header (Page header) -->

<?php 
$data_nama = $_SESSION["ses_nama"];

date_default_timezone_set("Asia/Jakarta"); 
$tanggal = date("Y-m-d");
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

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Tarikan</h3>
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
							</select>
						</div>

						<div class="form-group">
							<label>Saldo Tabungan</label>
							<input type="text" name="saldo" id="saldo" class="form-control" placeholder="Saldo" readonly>
						</div>

						<div class="form-group">
							<label>Tarikan</label>
							<input type="text" name="tarik" id="tarik" class="form-control" placeholder="Jumlah tarikan" required>
						</div>


					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Simpan" value="Tarik" class="btn btn-success">
						<a href="?page=data_tarik" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

    if (isset ($_POST['Simpan'])){

		//menangkap post
		$tarik=$_POST['tarik'];
		//membuang Rp dan Titik
		$tarik_hasil=preg_replace("/[^0-9]/", "", $tarik);

		$sql_simpan = "INSERT INTO tb_tabungan (nis,setor,tarik,tgl,jenis,petugas) VALUES (
			'".$_POST['nis']."',
			'0',
			'".$tarik_hasil."',
			'".$tanggal."',
			'TR',
			'".$data_nama."')";
			$query_simpan = mysqli_query($koneksi, $sql_simpan);
			mysqli_close($koneksi);
	
		if ($query_simpan) {
			echo "<script>
			Swal.fire({title: 'Tarikan Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {
				if (result.value) {
					window.location = 'index.php?page=data_tarik';
				}
			})</script>";
			}else{
			echo "<script>
			Swal.fire({title: 'Tarikan Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {
				if (result.value) {
					window.location = 'index.php?page=add_tarik';
				}
			})</script>";
		}
	}
?>

<script src="././bootstrap/lookup.js"></script>  
<script>
    $(document).ready(function(){  
        $('#nis').change(function(){  
            var nis = $(this).val();  
            $.ajax({  
                url:"plugins/proses-ajax.php",  
                method:"POST",  
                data:{nis:nis},  
                success:function(data){  
                    $('#saldo').val(data);  
                }  
            });  
        });  
    }); 
</script>

<script type="text/javascript">
	var tarik = document.getElementById('tarik');
	tarik.addEventListener('keyup', function (e) {
		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formattarik() untuk mengubah angka yang di ketik menjadi format angka
		tarik.value = formattarik(this.value, 'Rp ');
	});

	/* Fungsi formattarik */
	function formattarik(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split = number_string.split(','),
			sisa = split[0].length % 3,
			tarik = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? '.' : '';
			tarik += separator + ribuan.join('.');
		}

		tarik = split[1] != undefined ? tarik + ',' + split[1] : tarik;
		return prefix == undefined ? tarik : (tarik ? 'Rp ' + tarik : '');
	}
</script>