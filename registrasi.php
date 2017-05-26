<!DOCTYPE html>
<?php
	include('koneksi/koneksi.php');
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/icon.ico"/>
    <title>BEATBOX | Registrasi</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">	
	<link href="css/responsive.css" rel="stylesheet">
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
		                    <li class=""><a href="galeri.php">Galeri</a></li>                     
		                    <li class=""><a href="forum.php">Forum</a></li>
		                    <li> <a href="login.php">Login</a></li>
		                    <li class="active"><a href="registrasi.php">Registrasi</a></li>       
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
	<section id="about">
		<div class="guitar2">				
			<img class="img-responsive" src="images/guitar2.jpg" alt="guitar">
		</div>
		<div class="about-content">					
			<div id="contact-section">
				<?php
					if(isset($_POST['registrasi']))
					{					
						$nama = $_POST['nama'];
						$username = $_POST['username'];
						$password = $_POST['password'];
						$re_password = $_POST['re_password'];
						$telp = $_POST['telp'];
						$gambar = $_POST['gambar'];
						$sql_telp = mysql_query("select * from tb_member where telp='".$_POST['telp']."'") or die(mysql_error());
						if (mysql_num_rows($sql_telp)>0) 
						{
					?>
							<div class="alert alert-warning alert-dismissable">
							  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							  Maaf No Handphone Sudah Terdaftar, Silahkan Masukkan No.Handphone Yang Lain
							</div>
					<?php
						}
						else
						{
							if ($password == $re_password) 
							{
								mysql_query("insert into tb_member (nama,username,password,telp,gambar)
									values ('$nama','$username','$password','$telp','$gambar')
									");
					?>
								<div class="alert alert-warning alert-dismissable">
								  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								  Pendaftaran Berhasil, Silahkan menunggu konfirmasi dari admin agar bisa login
								</div>
					<?php
							}
							else
							{
					?>
								<div class="alert alert-warning alert-dismissable">
								  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								  Password Tidak Sama
								</div>
					<?php
							}
						}
					}
				?>
				<h2>Registrasi</h2>
				<hr>
		    	<div class="status alert alert-success" style="display: none"></div>
		    	<form method="post" enctype="multipart/form-data">
		    		<div class="form-group">
		    			<input type="hidden" name="gambar" value="default.png">
		                <input type="text" name="nama" class="form-control" required="required" placeholder="Nama Anda">
		            </div>
		            <div class="form-group">
		                <input type="text" name="username" class="form-control" required="required" placeholder="Username">
		            </div>
		            <div class="form-group">
		                <input type="password" name="password" class="form-control" required="required" placeholder="Password">
		            </div>
		            <div class="form-group">
		                <input type="password" name="re_password" class="form-control" required="required" placeholder="Ulangi Password">
		            </div>

		            <div class="form-group">
		                <input type="number" name="telp" class="form-control" required="required" placeholder="Nomor Handphone">
		            </div>
		            <div class="form-group">
		                <input type="submit" name="registrasi" class="btn btn-primary pull-right" value="Daftar">
		            </div>
		        </form>	       
		    </div>
		</div>
	</section><!--/#about-->
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