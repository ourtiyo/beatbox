<?php
	include('koneksi/koneksi.php');
	$query = mysql_query("select * from tb_komunitas");
	$data = mysql_fetch_array($query);
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

    <!-- MAP -->
    <style type="text/css">
    	#map_canvas {
    		width: 100%;
    		height: 300px;
    		margin-bottom: 100px;
    	}
    </style>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAS9xgi3tO8hgUZXRYAYysflM64O5iwE88"></script>
    <script>
        function initialize() {
        var position = new google.maps.LatLng(<?php echo $data['lat']; ?>, <?php echo $data['lang']; ?>);
        
        var myOptions = {
          zoom: 15,
          center: position,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        
        var map = new google.maps.Map(
            document.getElementById("map_canvas"),
            myOptions);

        var marker = new google.maps.Marker({
            position: position,
            map: map,
            title:"Klik Saya"
        });  

        var contentString = "<strong style='color:#000;'><?php echo $data['alamat'];?></strong>";
        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map,marker);
          
        });

      }
    </script>
</head><!--/head-->

<body onload="initialize()">
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
		                    <li class="active"><a href="index.php">Home</a></li>
		                    <li class=""><a href="event.php">Event</a></li>
		                    <li class=""><a href="gallery.php">Galeri</a></li>                     
		                    <li class=""><a href="forum.php">Forum</a></li>
		                    <?php 
		                    	if (isset($_SESSION['username'])) {
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

    <section id="home">	
		<div id="main-slider" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#main-slider" data-slide-to="0" class="active"></li>
				<li data-target="#main-slider" data-slide-to="1"></li>
				<li data-target="#main-slider" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<?php
					$sql_slider = mysql_query("select * from tb_slider ORDER BY id DESC");
					$active = 0;
					while ($row_slider = mysql_fetch_array($sql_slider)) 
					
					{
						$active++;
				?>
						<div class="item <?php
						if ($active == 1 ) 
						{
							echo "active";
						}?>">
							<img class="img-responsive" src="images/slider/<?php echo $row_slider['gambar']; ?>" alt="slider">						
						</div>
				<?php
					}
				?>
				
			</div>
		</div>    	
    </section>
	<!--/#home-->
	<section id="event">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-9">
					<div id="event-carousel" class="carousel slide" data-interval="false">
						<h2 class="heading">beatbox event</h2>
						<a class="even-control-left" href="event.php">Event Lainnya >></i></a>
						<div class="carousel-inner">
							<div class="item active">
								<div class="row">
									<?php 
										$sql_event = mysql_query("SELECT * FROM tb_event ORDER BY id DESC");
										$no=0;
										while ($row_event = mysql_fetch_array($sql_event)) 
										{
											$tanggal = $row_event['tanggal'];
                                            $format = date('d-m-y h:m:s A',strtotime($tanggal ));
											$no++;
											if ($no==4) {
												break;
											}
									?>
											<div class="col-sm-4">
												<a href="">
													<div class="single-event">
														<img style="width:270px; height:230px" class="img-responsive" src="images/event/<?php echo $row_event['gambar']; ?>" alt="event-image">
														<h4><?php echo $row_event['judul']; ?></h4>
														<h5 style="color:#fff;"><?php echo $format; ?></h5>
													</div>
												</a>
											</div>
									<?php
										}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="guitar">
					<img class="img-responsive" src="images/event.png" alt="guitar">
				</div>
			</div>			
		</div>
	</section><!--/#event-->
	<section id="contact">
		<?php
			$sql_komunitas = mysql_query("select * from tb_komunitas") or die(mysql_error());
			$row_komunitas = mysql_fetch_array($sql_komunitas);
		?>
		<div class="contact-section">
			<div class="ear-piece">
				<img class="img-responsive" src="images/ear-piece.png" alt="">
			</div>
			<div class="container">
				<div class="row">
					<div class="col-sm-3 col-sm-offset-4">
						<div class="contact-text">
							<h3>Kontak</h3>
							<address>
								E-mail: <?php echo $row_komunitas['email']; ?><br>
								Phone: <?php echo $row_komunitas['telp']; ?><br>
								Alamat : <?php echo $row_komunitas['alamat']; ?>
							</address>
						</div>
					</div>
					<div class="col-sm-5">
						<div id="contact-section">
							<h3>Map</h3>
							<div id="map_canvas"></div>
					    </div>
					</div>
				</div>
			</div>
		</div>		
	</section>
    <!--/#contact-->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="color:#000;" id="myModalLabel">LOGIN</h4>
      </div>
      <form method="post">
      <div class="modal-body">
        	<div class="form-group">
        		<input class="form-control" type="text" name="username" placeholder="Username">
        	</div>
        	<div class="form-group">
        		<input class="form-control" type="password" name="password" placeholder="Password">
        	</div>
        	<span style="color:#ccc;">Belum Memiliki Akun?</span> <a href="">Silahkan Daftar</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Login</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--/Modal-->


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
	<script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
    <script type="text/javascript" src="js/main.js"></script>  
</body>
</html>