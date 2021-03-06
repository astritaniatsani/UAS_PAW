<?php

include "koneksi.php";

if(isset($_POST['submit'])){
	
	$nip=htmlentities($_POST['nip']);
	$nama=ucwords(htmlentities($_POST['nama']));
	$gelar=ucwords(htmlentities($_POST['gelar']));
	$jenis_kelamin=htmlentities($_POST['jenis_kelamin']);
	
	
	$query=mysql_query("insert into jurusan values('$nip','$nama','$gelar','$jenis_kelamin')");
	
	if($query){
		?><script language="javascript">document.location.href="data_pejabat.php";</script><?php
	}else{
		?><script language="javascript">document.location.href="data_pejabat.php";</script><?php
	}
	
}else{
	unset($_POST['submit']);
}


?>

<!DOCTYPE html>
<head>
<title>SISTM : Sitem Informasi Surat Tugas Fakultas Sains dan Teknologi</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Colored Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/screenfull.js"></script>
<script>
	$(function () {
		$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

		if (!screenfull.enabled) {
			return false;
		}

		$('#toggle').click(function () {
			screenfull.toggle($('#container')[0]);
		});	
	});
</script>
<!-- tables -->
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
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
				<a href="index.php">
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
					Surat Tugas
				</span>
				<i class="icon-angle-right"></i><i class="icon-angle-down"></i>
				</a>
				<ul>
					<li>
					<a class="subnav-text" href="input_sutuga.php">
					Input Surat Tugas
					</a>
					</li>
					<li>
					<a class="subnav-text" href="data_sutuga.php">
					Data Surat Tugas
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
					<a class="subnav-text" href="data_jurusan.php">
					Jurusan
					</a>
					</li>
					<li>
					<a class="subnav-text" href="data_dosen.php">
					Dosen
					</a>
					</li>
                    <li>
					<a class="subnav-text" href="data_matkul.php">
					MataKuliah
					</a>
					</li>
                    <li>
					<a class="subnav-text" href="data_ruang.php">
					Ruang
					</a>
					</li>
					<li>
					<a class="subnav-text" href="data_pejabat.php">
					Pejabat
					</a>
					</li>
				</ul>
			</li>
<!--<li>
				<a href="surat_tugas/laporan_sutuga.php">
					<i class="fa fa-file-text-o nav_icon"></i>
					<span class="nav-text">
					Laporan
					</span>
				</a>
			</li>-->	
			
		</ul>
		<ul class="logout">
			<li>
			<a href="logout.php">
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
				<h1><a href="index.html"><img src="images/logo.png" alt="" />SISTM</a></h1>
			</div>
			<div class="full-screen">
				<section class="full-top">
					<button id="toggle"><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>	
				</section>
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
											Well come Administrator !</strong></font>
										</div> 
									
								</ul>
							</li>	
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
									<li> <a href="data_user.php"><i class="fa fa-cog"></i> Settings</a> </li> 
									<li> <a href="detail_user.php"><i class="fa fa-user"></i> Profile</a> </li> 
									<li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
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
					<h2>Data Jurusan</h2>
				</div>
        <div class="panel panel-widget forms-panel">
						<div class="forms">
							<div class=" form-grids form-grids-right">
								<div class="widget-shadow " data-example-id="basic-forms"> 
									<div class="form-title">
										<h4>Form  Input Data Jurusan :</h4>
									</div>
									<div class="form-body">
										<form class="form-horizontal" action="#" method="post"> 
											<div class="form-group"> 
												<label for="inputEmail3" class="col-sm-2 control-label">Kode Universitas</label> 
												<div class="col-sm-9"> 
													<input type="text" name="kd_univ" class="form-control" id="nama" placeholder="Kode Universitas"> 
												</div> 
									</div> 
                                    <div class="form-group"> 
												<label for="inputEmail3" class="col-sm-2 control-label">Kode Jurusan</label> 
												<div class="col-sm-9"> 
													<input type="text" name="kd_jur" class="form-control" id="kd_jur" placeholder="Kode Jurusan"> 
												</div> 
											</div> 
											<div class="form-group"> 
												<label for="inputPassword3" class="col-sm-2 control-label">Nama Jurusan</label> 
												<div class="col-sm-9"> 
													<input type="nm_jur" name="nm_jur" class="form-control" id="nm_jur" placeholder="Nama Jurusan"> 
												</div></div> 
                                            
		<div class="form-group">
											<label for="selector1" class="col-sm-2 control-label">Jenjang Studi</label>
											<div class="col-sm-8"><select name="jenjang_studi" id="jenjang_studi" class="form-control1">
												<option value="Strata 1 - Reguler">Strata 1 - Reguler</option>
												<option value="Diploma 3">Diploma 3</option>											</select></div></div>
											<div class="form-group"> 
												<div class="col-sm-offset-2 col-sm-10"> 									
												</div> 
											</div> 
											<div class="col-sm-offset-2"> 
												<button type="submit" name="submit" class="btn btn-default w3ls-button">Submit</button> 
											</div> 
										</form> 
									</div>
								</div>
							</div>
						</div>	
					</div>
		
        
        
        
        
        
			
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h3>Tabel Data Pejabat</h3>
					    <table id="table">
						<thead>
						  <tr>
							<th>No</th>
							<th>Nip</th>
							<th>Nama</th>
							<th>Gelar</th>
							<th>Jenis Kelamin</th>
							<th>Aksi</th>
						  </tr>
						</thead>
						<tbody>
						   <?php
		$view=mysql_query("select * from pejabat order by nip asc");
		
		$no=0;
		while($row=mysql_fetch_array($view)){
		?>	
		<tr>
            <td><?php echo $no=$no+1;?></td>
             <td><?php echo $row['nip'];?></td>
            <td><?php echo $row['nama'];?></td>
            <td><?php echo $row['gelar'];?></td>
            <td><?php echo $row['jenis_kelamin'];?></td>
           
            <td class="options-width">
            <a href="edit_pejabat.php?nip=<?php echo $row['nip']; ?>"><img src="images/ubah.png" width="15" height="15" /></a> |
<a href="hapus_pejabat.php?nip=<?php echo $row['nip']; ?>"><img src="images/hapus.png" width="15" height="15" /></a>            
            </td>
        </tr>
		<?php
		}
		?>
        
        <!--  end product-table................................... --> 
        </form>

						</tbody>
					  </table>
					</div>  
				</div>
				<!-- //tables -->
			</div>
		</div>
		<!-- footer -->
		<div class="footer">
			<p>© 2016 Colored . All Rights Reserved . Design by <a href="http://w3layouts.com/">W3layouts</a></p>
		</div>
		<!-- //footer -->
	</section>
	<script src="js/bootstrap.js"></script>
	<script src="js/proton.js"></script>
</body>
</html>
   
	
