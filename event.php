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
    <title>Beatbox | Event</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">	
	<link href="css/responsive.css" rel="stylesheet">
	<!-- fancybox -->
    <script type="text/javascript" src="fancybox/jquery.js"></script>
	<link rel="stylesheet" href="fancybox/jquery.fancybox.css?v=2.1.0" type="text/css" media="screen" />
    <script type="text/javascript" src="fancybox/jquery.fancybox.pack.js?v=2.1.0"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      $('.fancybox').fancybox();
          });
    </script>
    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
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
		                    <li class="active"><a href="event.php">Event</a></li>
		                    <li><a href="gallery.php">Galeri</a></li>                     
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
								elseif (isset($_SESSION['admin'])) 
								{
							?>
									<li class="dropdown">
									    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
									    <?php
									    	$panggil_admin = mysql_query("select * from tb_admin where id='".$_SESSION['admin']."'") or die(mysql_error());
									    	$row_panggil_admin = mysql_fetch_array($panggil_admin);
									    	echo $row_panggil_admin['nama'];
									    ?>
									    <span class="caret"></span>
									    </a>
									    <ul class="dropdown-menu" style="background:#d9534f">
									      	<li><a class="ku" href="logout.php">Logout</a></li>
									    </ul>
									</li>
							<?php
								}
								else{
							?>
							<li> <a href="login.php">Login</a></li>
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
	<section id="sponsor">
		<div id="sponsor-carousel" class="carousel slide" data-interval="false">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h2>Gallery</h2>
						<?php
							$sql_event = mysql_query("select * from tb_event ORDER BY id DESC") or die(mysql_error());
							while ($row_event = mysql_fetch_array($sql_event)) 
							{
						?>
							<div class="col-md-3 thumb">
				                <a class="thumbnail" href="detail_event.php?id=<?php echo $row_event['id']; ?>">
				                	<div class="col-md-12" style="background-color:#5bc0de;">
				                    <span class="label label-info">Tanggal : <?php echo $row_event['tanggal']; ?></span>
				                    <p></p>
				                    </div>
				                    
				                    <img class="img-responsive ku" src="images/event/<?php echo $row_event['gambar']; ?>" alt="">
				                    <hr style="border:1px solid #999;">
				                    <h3 style="color:#000; margin-top:-10px;"><?php echo $row_event['judul']; ?></h3>
				                </a>
				            </div>
						<?php
							}
						?>	
						
					</div>
				</div>				
			</div>
		</div>
	</section><!--/#sponsor-->

    <footer id="footer">
        <div class="container">
            <div class="text-center">
                <p> Copyright  &copy;2017<a target="_blank" href=""> Samarinda Beatbox Community </a>Theme. All Rights Reserved. <br> Designed by <a target="_blank" href="">Joko Dwi Prayoga</a></p>                
            </div>
        </div>
    </footer>
    <!--/#footer-->
  
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