<!DOCTYPE html>
<?php
	include('koneksi/koneksi.php');

	if (isset($_SESSION['username'])) {
		header("Location:profile.php");
	}
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/icon.ico"/>
    <title>Beatbox | Login</title>
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
		                    <?php 
		                    	if (isset($_SESSION['member'])) {
							?>
							<li class="active"> <a href="login.php"><?php echo $_SESSION['username']; ?></a></li>
							<?php
								}
		                    ?>
		                    <li class="active"> <a href="login.php">Login</a></li>
		                    <li class=""><a href="registrasi.php">Registrasi</a></li>       
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
					if(isset($_POST['login'])){					
						$username = $_POST['username'];
						$password = $_POST['password'];
						$sql= mysql_query("select * from tb_member where username='$username' and password='$password'") or die(mysql_error());
						$result= mysql_num_rows($sql);
						
						if($result>0) {
							$row= mysql_fetch_array($sql);
							if ($row['status']>0) {
								$_SESSION['member'] = $row['id'];
								$_SESSION['username'] = $row['username'];
								header("Location:profile.php");
							}
							else{
				?>
								<div class="alert alert-warning alert-dismissable">
								  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								  <strong>Maaf</strong> Anda Belum Dikonfirmasi Oleh Admin, Silahkan Menunggu
								</div>
				<?php
							}
						}
						else{
				?>
							<div class="alert alert-warning alert-dismissable">
							  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							  Username atau Password Salah
							</div>
				<?php
						}
					}
				?>
				<h2>Login</h2>
				<hr>
		    	<div class="status alert alert-success" style="display: none"></div>
		    	<form method="post">
		            <div class="form-group">
		                <input type="text" name="username" class="form-control" required="required" placeholder="Username">
		            </div>
		            <div class="form-group">
		                <input type="password" name="password" class="form-control" required="required" placeholder="Password">
		            </div>
		            <div class="form-group">
		                <input type="submit" name="login" class="btn btn-primary pull-right" value="Login">
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