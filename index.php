<?php
    //Mulai Sesion
    session_start();
    if (isset($_SESSION["ses_username"])==""){
		header("location: login.php");
    
    }else{
      $data_id = $_SESSION["ses_id"];
      $data_nama = $_SESSION["ses_nama"];
      $data_user = $_SESSION["ses_username"];
      $data_level = $_SESSION["ses_level"];
    }

    //KONEKSI DB
    include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TELKOMPUS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="dist/img/favicon.png" rel="icon" style"width: 500px">
  <link href="dist/img/favicon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="dist/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="dist/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="dist/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="dist/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="dist/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="dist/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="dist/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="dist/vendor/responsive/responsive.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="dist/css/style.css" rel="stylesheet">

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body>
	<!-- Site wrapper -->
	<div>

		<header id="header" class="header fixed-top d-flex align-items-center">

			<div class="d-flex align-items-center justify-content-between">
			  <a href="#" class="logo d-flex align-items-center">
			    <img src="dist/img/logo.png" alt="">
			    <span class="d-none d-lg-block">TelkomPus</span>
			  </a>
			  <i class="bi bi-list toggle-sidebar-btn"></i>
			</div><!-- End Logo -->

			<div class="search-bar">
			  <form class="search-form d-flex align-items-center" method="POST" action="#">
			    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
			    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
			  </form>
			</div><!-- End Search Bar -->

			<nav class="header-nav ms-auto">
			  <ul class="d-flex align-items-center">

			    <li class="nav-item d-block d-lg-none">
			      <a class="nav-link nav-icon search-bar-toggle " href="#">
			        <i class="bi bi-search"></i>
			      </a>
			    </li><!-- End Search Icon-->

			    <li class="nav-item dropdown">

			      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
			        <i class="bi bi-bell"></i>
			        <span class="badge bg-primary badge-number">4</span>
			      </a><!-- End Notification Icon -->

			    </li><!-- End Notification Nav -->

			    <li class="nav-item dropdown">

			      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
			        <i class="bi bi-chat-left-text"></i>
			        <span class="badge bg-success badge-number">3</span>
			      </a><!-- End Messages Icon -->

			    </li><!-- End Messages Nav -->

			    <li class="nav-item dropdown pe-3">

			      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
			        
			        <span class="d-none d-md-block dropdown-toggle ps-2">
			          <?php echo $data_nama; ?>
			        </span>
			      </a><!-- End Profile Iamge Icon -->

			      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
			        <li class="dropdown-header">
			          <h6>
			            <?php echo $data_nama; ?>
			          </h6>
			          <span class="label label-warning">
			            <?php echo $data_level; ?>
			          </span>
			        </li>
			        <li>
			          <hr class="dropdown-divider">
			        </li>

			        <li>
			          <a class="dropdown-item d-flex align-items-center" href="error.html">
			            <i class="bi bi-person"></i>
			            <span>My Profile</span>
			          </a>
			        </li>
			        <li>
			          <hr class="dropdown-divider">
			        </li>

			        <li>
			          <a class="dropdown-item d-flex align-items-center" href="logout.php" onclick="return confirm('Anda yakin keluar dari aplikasi ?')">
			            <i class="bi bi-box-arrow-right"></i>
			            <span>Sign Out</span>
			          </a>
			        </li>

			      </ul><!-- End Profile Dropdown Items -->
			    </li><!-- End Profile Nav -->

			  </ul>
			</nav><!-- End Icons Navigation -->

		</header><!-- End Header -->

		<!-- =============================================== -->

		<!-- Left side column. contains the sidebar -->
		<aside id="sidebar" class="sidebar">

			<ul class="sidebar-nav" id="sidebar-nav">
			<!-- Level  -->

				<?php
				if ($data_level=="Administrator"){
				?>

				<li class="nav-item">
					<a class="nav-link collapse" href="?page=admin">
						<i class="bi bi-grid"></i>
						<span>Dashboard</span>
					</a>
				</li><!-- End Dashboard Nav -->

				<li class="nav-item">
					<a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
						<i class="bi bi-menu-button-wide"></i><span>Kelola Data</span><i class="bi bi-chevron-down ms-auto"></i>
					</a>
					<ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

						<li>
							<a href="?page=MyApp/data_buku">
								<i class="bi bi-circle"></i><span>Data Buku</span>
							</a>
						</li>
						<li>
							<a href="?page=MyApp/data_agt">
								<i class="bi bi-circle"></i><span>Data Anggota</span>
							</a>
						</li>
					</ul>
				</li><!-- End Components Nav -->

				<li class="nav-item">
					<a class="nav-link"  href="?page=data_sirkul">
						<i class="bi bi-journal-text"></i><span>Sirkulasi</span>
					</a>
				</li><!-- End Forms Nav -->

				<li class="nav-item">
					<a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
						<i class="bi bi-layout-text-window-reverse"></i><span>Log Data</span><i class="bi bi-chevron-down ms-auto"></i>
					</a>

					<ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
						<li>
							<a href="?page=log_pinjam">
								<i class="bi bi-circle"></i><span>Peminjaman</span>
							</a>
						</li>
						<li>
							<a href="?page=log_kembali">
								<i class="bi bi-circle"></i><span>Pengembalian</span>
							</a>
						</li>
					</ul>
				</li><!-- End Tables Nav -->

				<li class="nav-item">
					<a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
						<i class="bi bi-bar-chart"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
					</a>
					<ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
						<li>
							<a href="error.html">
								<i class="bi bi-circle"></i><span>Laporan Buku</span>
							</a>
						</li>
						<li>
							<a href="error.html">
								<i class="bi bi-circle"></i><span>Laporan Anggota</span>
							</a>
						</li>
						<li>
							<a href="error.html">
								<i class="bi bi-circle"></i><span>Laporan Peminjaman</span>
							</a>
						</li>
						<li>
							<a href="error.html">
								<i class="bi bi-circle"></i><span>Laporan Pengembalian</span>
							</a>
						</li>
					</ul>
				</li><!-- End Charts Nav -->



				<li class="nav-heading">
				SETTING
				</li>

				<li class="nav-item">
					<a class="nav-link collapse" href="?page=MyApp/data_pengguna">
						<i class="bi bi-bar-chart"></i><span>Pengguna Sistem</span>
					</a>
				</li>


				<?php
					 } elseif($data_level=="Petugas"){
				?>

				<li class="nav-item">
					<a class="nav-link collapse" href="?page=petugas">
						<i class="bi bi-grid"></i>
						<span>Dashboard</span>
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
						<i class="bi bi-menu-button-wide"></i><span>Kelola Data</span><i class="bi bi-chevron-down ms-auto"></i>
					</a>

					<ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
						<li>
							<a href="?page=MyApp/data_buku">
								<i class="bi bi-circle"></i><span>Data Buku</span>
							</a>
						</li>
						<li>
							<a href="?page=MyApp/data_agt">
								<i class="bi bi-circle"></i><span>Data Anggota</span>
							</a>
						</li>
					</ul>
				</li><!-- End Components Nav -->

				<li class="nav-item">
					<a class="nav-link collapse"  href="?page=data_sirkul">
						<i class="bi bi-journal-text"></i><span>Sirkulasi</span>
					</a>
				</li><!-- End Forms Nav -->

				<li class="nav-item">
					<a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
					  <i class="bi bi-layout-text-window-reverse"></i><span>Log Data</span><i class="bi bi-chevron-down ms-auto"></i>
					</a>
					<ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
						<li>
							<a href="?page=log_pinjam">
								<i class="bi bi-circle"></i><span>Peminjaman</span>
							</a>
						</li>
						<li>
							<a href="?page=log_kembali">
								<i class="bi bi-circle"></i><span>Pengembalian</span>
							</a>
						</li>
					</ul>
				</li><!-- End Tables Nav -->

				<li class="nav-item">
					<a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
						<i class="bi bi-bar-chart"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
					</a>
					<ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
						<li>
							<a href="error.html">
								<i class="bi bi-circle"></i><span>Laporan Buku</span>
							</a>
						</li>
						<li>
							<a href="error.html">
								<i class="bi bi-circle"></i><span>Laporan Anggota</span>
							</a>
						</li>
						<li>
							<a href="error.html">
								<i class="bi bi-circle"></i><span>Laporan Peminjaman</span>
							</a>
						</li>
						<li>
							<a href="error.html">
								<i class="bi bi-circle"></i><span>Laporan Pengembalian</span>
							</a>
						</li>
					</ul>
				</li><!-- End Charts Nav -->

				<li class="nav-heading">
				SETTING
				</li>
				

				<?php
					}
				?>

				<li class="nav-item">
					<a class="nav-link" href="logout.php" onclick="return confirm('Anda yakin keluar dari aplikasi ?')">
						<i class="bi bi-box-arrow-in-left"></i>
						<span>Logout</span>
						<span class="pull-right-container"></span>
					</a>
				</li>
			</ul>
			<!-- /.sidebar -->
		</aside>

		<!-- =============================================== -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!-- Main content -->
			<main id="main" class="main; pagetitle">

				<section class="content">
					<?php 
						if(isset($_GET['page'])){
						    $hal = $_GET['page'];
  
						    switch ($hal) {
						        //Klik Halaman Home Pengguna
						        case 'admin':
						            include "home/admin.php";
						            break;
						        case 'petugas':
						            include "home/petugas.php";
						            break;
						  
						        //Pengguna
						        case 'MyApp/data_pengguna':
						            include "admin/pengguna/data_pengguna.php";
						            break;
						        case 'MyApp/add_pengguna':
						            include "admin/pengguna/add_pengguna.php";
						            break;
						        case 'MyApp/edit_pengguna':
						            include "admin/pengguna/edit_pengguna.php";
						            break;
						        case 'MyApp/del_pengguna':
						            include "admin/pengguna/del_pengguna.php";
									  break;
									  

						        //agt
						        case 'MyApp/data_agt':
						            include "admin/agt/data_agt.php";
						            break;
						        case 'MyApp/add_agt':
						            include "admin/agt/add_agt.php";
						            break;
						        case 'MyApp/edit_agt':
						            include "admin/agt/edit_agt.php";
						            break;
						        case 'MyApp/del_agt':
						            include "admin/agt/del_agt.php";
						            break;

						        //buku
						        case 'MyApp/data_buku':
						            include "admin/buku/data_buku.php";
						            break;
						        case 'MyApp/add_buku':
						            include "admin/buku/add_buku.php";
						            break;
						        case 'MyApp/edit_buku':
						            include "admin/buku/edit_buku.php";
						            break;
						        case 'MyApp/del_buku':
						            include "admin/buku/del_buku.php";
									  break;
									  
									//sirkul
						        case 'data_sirkul':
						            include "admin/sirkul/data_sirkul.php";
						            break;
						        case 'add_sirkul':
						            include "admin/sirkul/add_sirkul.php";
						            break;
						        case 'panjang':
						            include "admin/sirkul/panjang.php";
						            break;
						        case 'kembali':
						            include "admin/sirkul/kembali.php";
									  break;

									//log
									case 'log_pinjam':
										include "admin/log/log_pinjam.php";
										break;
									case 'log_kembali':
										include "admin/log/log_kembali.php";
										break;

									//laporan
									case 'laporan':
										include "petugas/laporan/view_laporan.php";
										break;
						       

						    
						        //default
						        default:
									echo "<center><br><br><br><br><br><br><br><br><br>
									  <h1> Halaman tidak ditemukan !</h1></center>";
						            break;    
						    }
						}else{
							// Auto Halaman Home Pengguna
						    if($data_level=="Administrator"){
						        include "home/admin.php";
						        }
						            elseif($data_level=="Petugas"){
						                include "home/petugas.php";
						                }
						                  }
					?>
				</section>
			</main>
			<!-- /.content -->
		</div>

		<!-- /.content-wrapper -->

		<footer id="footer" class="footer">
			<div class="copyright">
				&copy; Copyright <strong><span>SMK Telkom Purwokerto</span></strong>. All Rights Reserved
			</div>
			<div class="credits">
				Designed by <a href="https://www.linkedin.com/in/sahrul-ramadhani-2402481b8/">sahrul.r.dhani@gmail.com</a>
			</div>
		</footer><!-- End Footer -->

		<div class="control-sidebar-bg"></div>

		<!-- ./wrapper -->

		<!-- Vendor JS Files -->

		 <script src="dist/vendor/bootstrap/js/bootstrap.bundle.js"></script>
		 <script src="dist/vendor/php-email-form/validate.js"></script>
		 <script src="dist/vendor/quill/quill.min.js"></script>
		 <script src="dist/vendor/tinymce/tinymce.min.js"></script>

		 <script src="dist/js/responsive.js"></script>

		 <script src="dist/vendor/simple-datatables/simple-datatables.js"></script>
		 <script src="dist/vendor/chart.js/chart.min.js"></script>
		 <script src="dist/vendor/apexcharts/apexcharts.min.js"></script>
		 <script src="dist/vendor/echarts/echarts.min.js"></script>

		<!-- Template Main JS File -->
		<script src="dist/js/main.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="dist/js/demo.js"></script>
		<!-- page script -->

		<script>
			$(document).ready(function() {
				$('#example1').DataTable( {
					responsive: {
						details: {
							display: $.fn.dataTable.Responsive.display.modal( {
								header: function ( row ) {
									var data = row.data();
									return 'Details for '+data[0]+' '+data[1];
								 }
							} ),
							renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
								tableClass: 'table'
							} )
						}
					}
				} );
			} );
		</script>
</body>

</html>