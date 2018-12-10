<?php 
	session_start();
	include '../../koneksi.php';
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['status']==""){
		header("location:../../index.php?pesan=gagal");
	}
	?>
<link href="../../JQuery/smoothness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
<!DOCTYPE html>
<head>
<title>SISAMIK : Sistem Informasi Surat Akademik</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Colored Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="../../css/bootstrap.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="../../css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="../../css/font.css" type="text/css"/>
<link href="../../css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="../../js/jquery2.0.3.min.js"></script>
<script src="../../js/modernizr.js"></script>
<script src="../../js/jquery.cookie.js"></script>
<script src="../../js/screenfull.js"></script>
<!-- tables -->
<link rel="stylesheet" type="text/css" href="../../css/table-style.css" />
<link rel="stylesheet" type="text/css" href="../../css/basictable.css" />
<script type="text/javascript" src="../../js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<!-- //tables -->
</head>
<body class="dashboard-page">
	<nav class="main-menu">
		<ul>
			<li>
				<a href="../admin.php">
					<i class="fa fa-home nav_icon"></i>
					<span class="nav-text">
					Dashboard
					</span>
				</a>
			</li>
			<li class="has-subnav">
				<a href="javascript:;">
				<i class="fa fa-check-square-o nav_icon"></i>
				<span class="nav-text">
					Surat Akademik
				</span>
				<i class="icon-angle-right"></i><i class="icon-angle-down"></i>
				</a>
				<ul>
					<li>
					<a class="subnav-text" href="surat_tugas/input_sutuga.php">
					Surat Tugas Mengajar
					</a>
					</li>
					<li>
					<a class="subnav-text" href="../skl/input_skl.php">
					Surat Keterangan Lulus
					</a>
					</li>
                    <li>
					<a class="subnav-text" href="../skkp/input_skkp.php">
					Surat Keterangan Kerja Praktik
					</a>
					</li>
                    <li>
					<a class="subnav-text" href="../skp/input_skp.php">
					Surat Keterangan Penelitian
					</a>
					</li>
					<li>
					<a class="subnav-text" href="../skt/input_skt.php">
					Surat Keterangan Tahfidz
					</a>
					</li>
				</ul>
			</li>
            	<li class="has-subnav">
				<a href="javascript:;">
				<i class="icon-table nav-icon"></i>
				<span class="nav-text">
					Data Master
				</span>
				<i class="icon-angle-right"></i><i class="icon-angle-down"></i>
				</a>
				<ul>
					<li>
					<a class="subnav-text" href="../data_jurusan.php">
					Jurusan
					</a>
					</li>
					<li>
					<a class="subnav-text" href="../data_dosen.php">
					Dosen
					</a>
					</li>
                    <li>
					<a class="subnav-text" href="../data_matkul.php">
					MataKuliah
					</a>
					</li>
                    <li>
					<a class="subnav-text" href="../data_ruang.php">
					Ruang
					</a>
					</li>
				</ul>
			</li>
			<li class="has-subnav">
				<a href="javascript:;">
				<i class="fa fa-file-text-o nav_icon"></i>
				<span class="nav-text">
					Data Surat Akademik
				</span>
				<i class="icon-angle-right"></i><i class="icon-angle-down"></i>
				</a>
				<ul>
					<li>
					<a class="subnav-text" href="surat_tugas/input_sutuga.php">
					Surat Tugas Mengajar
					</a>
					</li>
					<li>
					<a class="subnav-text" href="../skl/input_skl.php">
					Surat Keterangan Lulus
					</a>
					</li>
                    <li>
					<a class="subnav-text" href="../skkp/input_skkp.php">
					Surat Keterangan Kerja Praktik
					</a>
					</li>
                    <li>
					<a class="subnav-text" href="../skp/input_skp.php">
					Surat Keterangan Penelitian
					</a>
					</li>
					<li>
					<a class="subnav-text" href="../skt/input_skt.php">
					Surat Keterangan Tahfidz
					</a>
					</li>
				</ul>
			</li>
				<li>
				<a href="laporan_sutuga.php">
					<i class="fa fa-file-text-o nav_icon"></i>
					<span class="nav-text">
					Laporan
					</span>
				</a>
			</li>
		</ul>
		<ul class="logout">
			<li>
			<a href="../../logout.php">
			<i class="icon-off nav-icon"></i>
			<span class="nav-text">
			Logout
			</span>
			</a>
			</li>
		</ul>
	</nav>
	<section class="wrapper scrollable">
		<nav class="user-menu">
			<a href="javascript:;" class="main-menu-access">
			<i class="icon-proton-logo"></i>
			<i class="icon-reorder"></i>
			</a>
		</nav>
		<section class="title-bar">
			<div class="logo">
				<h1><a href="../../admin.php"><img src="../../images/logo.png" alt="" />SISAMIK</a></h1>
			</div>
			</div>
			<div class="w3l_search">
				<form action="#" method="post">
					<input type="text" name="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required>
					<button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
				</form>
			</div>
			<div class="header-right">
				<div class="profile_details_left">
					<div class="header-right-left">
						<!--notifications of menu start -->						
										<div class="notification_bottom"><strong>
										
											Well come Administrator <?php echo $_SESSION['username']; ?> !</strong></font>
										</div> 
							<div class="clearfix"> </div>
						</ul>
					</div>	
					<div class="profile_details">		
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">	
										<span class="prfil-img"><i class="fa fa-user" aria-hidden="true"></i></span> 
										<div class="clearfix"></div>	
									</div>	
								</a>
								<ul class="dropdown-menu drp-mnu">
									<li> <a href="../data_user.php"><i class="fa fa-cog"></i> Settings</a> </li> 
									<li> <a href="../detail_user.php"><i class="fa fa-user"></i> Profile</a> </li> 
									<li> <a href="../../logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</section>
		<div class="main-grid">
         
        <div class="agile-grids">	
				<!-- tables -->
				<div class="table-heading">
					<h2>Sistem Informasi Surat Akademik</h2>
				</div>
        <div class="panel panel-widget forms-panel">
						<div class="forms">
							<div class=" form-grids form-grids-right">
								<div class="widget-shadow " data-example-id="basic-forms"> 
									<div class="form-title">
										<h4>Surat Tugas :</h4>
									</div>
									<div class="form-body">
										<form class="form-horizontal" action="pemesanan_simpan.php" method="post"> 
											<?php include "pemesanan1.php"; ?>          
											
										<div
											<div class="form-group"> 
												<div class="col-sm-offset-2 col-sm-10"> 									
												</div> 
											</div> 
											 
										</form> 
									</div>
								</div>
							</div>
						</div>	
					</div>
	
        <!--  end product-table................................... --> 
        </form>					
					</div>  
				</div>
				<!-- //tables -->
			</div>
		</div>
	</section>
	<script src="../../js/bootstrap.js"></script>
	<script src="../../js/proton.js"></script>
</body>
</html>
   
	
