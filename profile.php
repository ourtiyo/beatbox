<!DOCTYPE html>
<?php
	include('koneksi/koneksi.php');

	if (!isset($_SESSION['member'])) {
		header("Location:login.php");
	}

?>
<?php
	$sql= mysql_query("select * from tb_member where username='".$_SESSION['username']."'");
	$row = mysql_fetch_array($sql);
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/icon.ico"/>
    <title>Beatbox Samarinda</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">	
	<link href="css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header" role="banner">		
		<div class="main-nav">
			<div class="container">
				<div class="header-top">
					<div class="pull-right social-icons">
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-google-plus"></i></a>
						<a href="#"><i class="fa fa-youtube"></i></a>

						


					</div>
				</div>     
		        <div class="row">	        		
		            <div class="navbar-header">
		                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		                    <span class="sr-only">Toggle navigation</span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                </button>
		                <a class="navbar-brand" href="index.html">
		                	<img class="img-responsive" src="images/logo_.png" alt="logo">
		                </a>                    
		            </div>
		            <div class="collapse navbar-collapse">
		                <ul class="nav navbar-nav navbar-right">                 
		                    <li><a href="index.php">Home</a></li>
		                    <li class=""><a href="event.php">Event</a></li>
		                    <li class=""><a href="gallery.php">Galeri</a></li>                     
		                    <li class=""><a href="forum.php">Forum</a></li>
		                    <?php 
		                    	if (isset($_SESSION['member'])) {

							?>
		                    <li class="dropdown">
							    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
							    <?php echo $_SESSION['username']; ?>
							    <span class="caret"></span>
							    </a>
							    <ul class="dropdown-menu" style="background:#d9534f">
							      	<li style="border-bottom: 2px solid #fff;"><a class="ku" href="profile.php">Profile</a></li>
							      	<li><a class="ku" href="logout.php">Logout</a></li>
							    </ul>
							 </li>
							<?php
								}
								else{
							?>
							<li class="active"> <a href="login.php">Login</a></li>
		                    <li class=""><a href="registrasi.php">Registrasi</a></li>       
							<?php
								}
		                    ?>
		                </ul>
		            </div>
		        </div>
	        </div>
        </div>                    
    </header>
    <!--/#header--> 
	<section id="explore">
		<div class="container">
		</div>
	</section><!--/#explore-->
	<section id="content">
		<div class="guitar2">				
			<div class="content-ku">
				<h2>Profile</h2>
				<?php
					if (isset($_POST['update'])) 
					{
						$foto = $_FILES['foto']['name'];
						$lokasi_foto = $_FILES['foto']['tmp_name'];
						$nama = $_POST['nama'];
						$username = $_POST['username'];
						$alamat = $_POST['alamat'];
						$telp = $_POST['telp'];
						mysql_query("UPDATE tb_member SET nama = '$nama',
														  username = '$username',
														  alamat ='$alamat',
														  telp ='$telp'
							where username='".$_SESSION['username']."'
							");	
						if ($foto!="") {
							move_uploaded_file($lokasi_foto,"images/member/$foto");
							mysql_query("UPDATE tb_member SET gambar='$foto'
								where username='".$_SESSION['username']."'
								");
						}
						refresh('profile.php');

					}
				?>
				<hr>
				
				<div class="row">
					<form method="post" enctype="multipart/form-data">
						<div class="col-md-4">
							<?php
								if ($row['gambar']=="") {
							?>
									<img src="images/member/default.png">
							<?php
								}
								else{
							?>
									<img src="images/member/<?php echo $row['gambar']; ?>">
							<?php
								}
							?>
							<div class="fileUpload btn btn-primary">
							    <center><span>Ganti Foto</span></center>
							    <input type="file" class="upload" name="foto" value="<?php echo $row['gambar']; ?>" />
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<label class="black">Nama Lengkap</label>
								<input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>">
							</div>
							<div class="form-group">
								<label class="black">Username</label>
								<input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>">
							</div>
							<div class="form-group">
								<label class="black">Alamat</label>
								<input type="text" class="form-control" name="alamat" value="<?php echo $row['alamat']; ?>">
							</div>
							<div class="form-group">
								<label class="black">Nomor Telpon</label>
								<input type="text" class="form-control" name="telp" value="<?php echo $row['telp']; ?>">
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary pull-right" name="update" value="Simpan">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="content-content">					
			
		</div>
	</section><!--/#content-->
   <footer id="footer">
        <div class="container">
            <div class="text-center">
                <p> Copyright  &copy;2017<a target="_blank" href=""> Samarinda Beatbox Community </a>Theme. All Rights Reserved. <br> Designed by <a target="_blank" href="">Joko Dwi Prayoga</a></p>                
            </div>
        </div>
    </footer>
    <!--/#footer-->
  
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  	<script type="text/javascript" src="js/gmaps.js"></script>
	<script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/coundown-timer.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
</body>
</html>