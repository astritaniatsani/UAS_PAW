<?php 
	session_start();
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['status']==""){
		header("location:../index.php?pesan=gagal");
	}
	?>
	<?php
include '../koneksi.php';

if(isset($_POST['submit'])){
	
	$prodi=htmlentities($_POST['prodi']);
	$kurikulum=ucwords(htmlentities($_POST['kurikulum']));
	$kd_matkul=htmlentities($_POST['kd_matkul']);
	$nm_matkul=htmlentities($_POST['nm_matkul']);
	$sifat=ucwords(htmlentities($_POST['sifat']));
	$semester=htmlentities($_POST['semester']);
	$jml_sks_T=ucwords(htmlentities($_POST['jml_sks_T']));
	$jml_sks_P=htmlentities($_POST['jml_sks_P']);
	$jml_sks_PL=htmlentities($_POST['jml_sks_PL']);
	
	
	$query=mysqli_query($koneksi,"insert into matkul values('$prodi','$kurikulum','$kd_matkul','$nm_matkul','$sifat','$semester','$jml_sks_T','$jml_sks_P','$jml_sks_PL')");
	
	if($query){
		
		?><div class="alert alert-success" role="alert">
									<strong>
                                    <h1>Data Berhasisl Disimpan !!!
								</div><script language="javascript">document.location.href="data_matkul.php";</script><?php
	}else{ 
		?><div class="alert alert-success" role="alert">
									<strong>
                                    <h1>Data Gagal Disimpan !!!
								</div><script language="javascript">document.location.href="data_matkul.php";</script><?php
	}
		
}else{
	unset($_POST['submit']);
}


?>
<!DOCTYPE html>
<head>
<title>SISAMIK : Sistem Informasi Surat Akademik</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Colored Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="../css/bootstrap.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="../css/font.css" type="text/css"/>
<link href="../css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="../js/jquery2.0.3.min.js"></script>
<script src="../js/modernizr.js"></script>
<script src="../js/jquery.cookie.js"></script>
<script src="../js/screenfull.js"></script>
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
<link rel="stylesheet" type="text/css" href="../css/table-style.css" />
<link rel="stylesheet" type="text/css" href="../css/basictable.css" />
<script type="text/javascript" src="../js/jquery.basictable.min.js"></script>
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
					<a class="subnav-text" href="skl/data_dosen.php">
					Surat Keterangan Lulus
					</a>
					</li>
                    <li>
					<a class="subnav-text" href="skkp/data_matkul.php">
					Surat Keterangan Kerja Praktik
					</a>
					</li>
                    <li>
					<a class="subnav-text" href="skp/data_ruang.php">
					Surat Keterangan Penelitian
					</a>
					</li>
					<li>
					<a class="subnav-text" href="skt/data_ruang.php">
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
					<a class="subnav-text" href="surat_tugas/data_sutuga.php">
					Surat Tugas Mengajar
					</a>
					</li>
					<li>
					<a class="subnav-text" href="skl/data_skl.php">
					Surat Keterangan Lulus
					</a>
					</li>
                    <li>
					<a class="subnav-text" href="skkp/data_skkp.php">
					Surat Keterangan Kerja Praktik
					</a>
					</li>
                    <li>
					<a class="subnav-text" href="skp/data_skp.php">
					Surat Keterangan Penelitian
					</a>
					</li>
					<li>
					<a class="subnav-text" href="skt/data_skt.php">
					Surat Keterangan Tahfidz
					</a>
					</li>
				</ul>
			</li>
            
  
			<li>
				<a href="laporan_surat.php">
					<i class="fa fa-file-text-o nav_icon"></i>
					<span class="nav-text">
					Laporan
					</span>
				</a>
			</li>
			
		</ul>
		<ul class="logout">
			<li>
			<a href="../logout.php">
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
				<h1><a href="admin.php"><img src="../images/logo.png" alt="" />SISAMIK</a></h1>
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
											Well come Administrator  <?php echo $_SESSION['username']; ?>!</strong></font>
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
									<li> <a href="../logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
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
			<h2>Data Mata Kuliah</h2>
		</div>
		<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class=" form-grids form-grids-right">
				<div class="widget-shadow " data-example-id="basic-forms"> 
					<div class="form-title">
						<h4>Form  Input Data Mata Kuliah :</h4>
					</div>
					<div class="form-body">
						<form class="form-horizontal" action="#" method="post"> 
							<div class="form-group">
							<label for="selector1" class="col-sm-2 control-label">Prodi</label>
							<div class="col-sm-8"><select name="prodi" id="prodi" class="form-control1">
								<option value="701">Matematika</option>
								<option value="702">Fisika</option>		
                                <option value="703">Biologi</option>
								<option value="704">Kimia</option>
                                <option value="705">Teknik Informatika</option>
								<option value="706">AgroTeknologi</option>	
							<option value="707">Teknik Elektro</option>								</select></div></div>
            			<div class="form-group"> 
							<label for="inputEmail3" class="col-sm-2 control-label">Kurikulum</label> 
							<div class="col-sm-9"> 
								<input type="text" name="kurikulum" class="form-control" placeholder="Kurikulum"> 
							</div> 
						</div> 
						<div class="form-group"> 
							<label for="inputPassword3" class="col-sm-2 control-label">Kode Mata Kuliah</label> 
							<div class="col-sm-9"> 
								<input type="nm_jur" name="kd_matkul" class="form-control" id="nm_jur" placeholder="Kode MAta Kuliah"> 
							</div></div> 
                        
						<div class="form-group"> 
							<label for="inputPassword3" class="col-sm-2 control-label">Nama Mata Kuliah</label> 
							<div class="col-sm-9"> 
								<input type="nm_jur" name="nm_matkul" class="form-control" id="nm_jur" placeholder="Kode MAta Kuliah"> 
							</div></div> 
                            <div class="form-group">
						<label for="selector1" class="col-sm-2 control-label">Sifat</label>
						<div class="col-sm-8"><select name="sifat" id="sifat" class="form-control1">
							<option value="P">P</option>
							<option value="W">W</option>		
							</select></div></div> 
						<div class="form-group"> 
							<label for="inputPassword3" class="col-sm-2 control-label">Semester</label> 
							<div class="col-sm-9"> 
								<input type="nm_jur" name="semester" class="form-control" id="nm_jur" placeholder="Semester"> 
                                </div></div>
						<div class="form-group"> 
							<label for="inputPassword3" class="col-sm-2 control-label">Jumlah SKS T</label> 
							<div class="col-sm-9"> 
								<input type="nm_jur" name="jml_sks_T" class="form-control" placeholder="Jumlah SKS T"> 
							</div></div> 
                            <div class="form-group"> 
							<label for="inputPassword3" class="col-sm-2 control-label">Jumlah SKS P</label> 
							<div class="col-sm-9"> 
								<input type="nm_jur" name="jml_sks_P" class="form-control"  placeholder="Jumlah SKS P"> 
							</div></div> 
                            <div class="form-group"> 
							<label for="inputPassword3" class="col-sm-2 control-label">Jumlah SKS PL</label> 
							<div class="col-sm-9"> 
								<input type="nm_jur" name="jml_sks_PL" class="form-control" id="nm_jur" placeholder="Jumlah SKS PL"> 
							</div></div>                                                
							</div></div> 
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
			  <h3>Tabel Data Mata Kuliah</h3>
			    <table id="table">
				<thead>
				  <tr>
					<th>No</th>
					<th>Prodi</th>
					<th>Kurikulum</th>
					<th>Kode Mata Kuliah</th>
					<th>Nama Mata Kuliah</th>	
                    <th>Sifat</th>
					<th>Semester</th>
					<th>Jumlah SKS</th>
					<th>Aksi</th>
				  </tr>
				</thead>
						<tbody>
						   <?php
		$view=mysqli_query($koneksi,"select * from matkul order by kd_matkul asc");
		
		$no=0;
		while($row=mysqli_fetch_array($view)){
		?>	
		<tr>
            <td><?php echo $no=$no+1;?></td>
             <td><?php echo $row['prodi'];?></td>
            <td><?php echo $row['kurikulum'];?></td>
            <td><?php echo $row['kd_matkul'];?></td>
            <td><?php echo $row['nm_matkul'];?></td>
            <td><?php echo $row['sifat'];?></td>
            <td><?php echo $row['semester'];?></td>
            <td><?php $jumlah=0;
			 $jumlah=$row['jml_sks_T']+
            $row['jml_sks_P']+
            $row['jml_sks_PL']; 
			echo $jumlah ?></td>
           
            <td class="options-width">
            <a href="edit_matkul.php?kd_matkul=<?php echo $row['kd_matkul']; ?>"><img src="../images/ubah.png" width="15" height="15" /></a> |
<a href="hapus_matkul.php?kd_matkul=<?php echo $row['kd_matkul']; ?>"><img src="../images/hapus.png" width="15" height="15" /></a>            
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
	</section>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/proton.js"></script>
</body>
</html>
   
	
