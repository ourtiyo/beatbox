<!DOCTYPE html>
<?php
	include('koneksi/koneksi.php');
	if (isset($_SESSION['member'])) {
		$sql_member = mysql_query("SELECT * FROM tb_member where username='".$_SESSION['username']."'") or die(mysql_error());
		$row_member = mysql_fetch_array($sql_member);
	}
	
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/icon.ico"/>
    <title>Beatbox | FORUM</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">	
	<link href="css/responsive.css" rel="stylesheet">
	<!-- fancybox -->
    <script type="text/javascript" src="fancybox/jquery.js"></script>
    <!-- ckeditor -->
    <script type="text/javascript" src="admin/ckeditor/ckeditor.js"></script>
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
		                    <li><a href="event.php">Event</a></li>
		                    <li><a href="gallery.php">Galeri</a></li>                     
		                    <li class="active"><a href="forum.php">Forum</a></li>
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
	<section id="explore">
		<div class="container">
		</div>
	</section><!--/#explore-->
	<section class="kontent">
		<div id="sponsor-carousel" class="carousel slide" data-interval="false">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h2 style="margin-bottom:0px; color:#000;">
							<?php
								if (isset($_POST['simpan'])) 
								{
									$judul = $_POST['judul'];
									$tanggal = $_POST['tanggal'];
									$topik = addslashes($_POST['topic']);
									$member = $_POST['member'];
									mysql_query("INSERT tb_forum (judul,topic,tanggal,id_member)
										VALUES ('$judul','$topik','$tanggal','$member')") or die(mysql_error());
								}
							?>
							Forum Diskusi
							<?php
								if (isset($_SESSION['member'])) 
								{
							?>
									<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Buat Topik</button>
							<?php
								}
							?>
						</h2><hr style="border:1px solid #777;">
						
						<div class="col-md-8">
							<div class="row">
								<?php
									$sql_forum = mysql_query("select * from tb_forum order by id desc") or die(mysql_error());
									while ($row_forum = mysql_fetch_array($sql_forum)) 
									{
										$sql_id_member = mysql_query("select * from tb_member where id='".$row_forum['id_member']."'");
										$row_id_member = mysql_fetch_array($sql_id_member);
                                        $tanggal = $row_forum['tanggal'];
                                        $format = date('d-m-Y',strtotime($tanggal ));
								?>
										<div class="col-md-12" style="border-bottom:1px solid #777;; padding:20px;">
											<div class="row">
												<div class="col-md-2 thumb">
													<center>
													<img class="thumbnail" style="width:100%; height:100px;" src="images/member/<?php echo $row_id_member['gambar']; ?>">
													<p style="color:#000; margin:-10px;">Dibuat Oleh <br><?php echo $row_id_member['nama'];?></p>
													</center>
												</div>
												<div class="col-md-10">
													<h3 style="color:#000; text-transform: none; margin:0px;"><strong><?php echo $row_forum['judul']; ?></strong></h3>
													<p style="color:#000;">Dilihat : <?php echo $row_forum['dilihat']; ?> &nbsp; <label style="color:#777;">Tanggal : <?php echo $format; ?></label></p>
													<p style="color:#000;"><?php  echo substr($row_forum['topic'], 0, 100);?>
													</p>
													<div class="pull-right">
														<?php
															if (isset($_POST['dilihat'.$row_forum['id']])) 
															{
																$jumlah_dilihat = $_POST['jumlah_dilihat']+1;
																$idnya = $_POST['idnya'];
																mysql_query("UPDATE tb_forum SET dilihat ='$jumlah_dilihat' where id='$idnya'") or die(mysql_error());
																refresh('view.php?id='.$row_forum['id']);
															}
														?>
														<form method="post">
															<input type="hidden" name="jumlah_dilihat" value="<?php echo $row_forum['dilihat'];?>">
															<input type="hidden" name="idnya" value="<?php echo $row_forum['id'];?>">
															<input type="submit" class="btn btn-danger btn-ku" name="dilihat<?php echo $row_forum['id']; ?>" value="Lihat Selengkapnya >>">
														</form>
														
													</div>
												</div>
											</div>
										</div>
								<?php
									}
								?>
								
							</div>
						</div>
						<div class="col-md-4">
							<h3 style="color:#000;"><strong>Event Terbaru</strong></h3>
							<div class="row">
								<?php 
									$query=mysql_query("select * from tb_event ORDER BY id DESC") or die(mysql_error());
									$no=0;
									while ($tampil = mysql_fetch_array($query)) 
									{
                                    $tanggal = $tampil['tanggal'];
                                    $format = date('d-m-Y h:m:s A',strtotime($tanggal ));
									$no++;
								?>
									<div class="col-md-12 <?php if ($tampil['id']==$_GET['id']) {
										echo "hidden";
									} ?>">
										<a href="detail_event.php?id=<?php echo $tampil['id']; ?>">
											<div class="col-md-4 thumb">
												<img class="thumbnail"style="width:100%; height:80px;" src="images/event/<?php echo $tampil['gambar']; ?>">
											</div>
											<div class="col-md-8">
												<div class="row">
												<h3 style="color:#000; margin:0px;"><strong> <?php echo $tampil['judul']; ?></strong></h3>
												<p style="color:#000;">tanggal : <?php echo $format; ?></p>
												</div>
											</div>
										</a>
									</div>

								<?php
									if ($no == 5) {
										break;
									}
									}
								?>
								
							</div>
						</div>						
					</div>
				</div>				
			</div>
		</div>
	</section><!--/#sponsor-->
	<!--Modal -->
	<!-- Button trigger modal -->

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel" style="color:#000;">Buat Topic</h4>
	      </div>
	      <div class="modal-body">
	      	<form method="post">
		        <div class="form-group">
		        	<label style="color:#000;">Judul</label>
		        	<input type"text" class="form-control" name="judul" placeholder="Masukkan Judul" required>
		        	<input type="hidden" name="member" value="<?php echo $row_member['id']; ?>">
		        	<input type="hidden" name="tanggal" value="<?php echo date('Y-m-d'); ?>">
		        </div>
		        <div class="form-group">
		        	<label style="color:#000;">Topic</label>
		        	<textarea name="topic" class="ckeditor" id="ckeditor" required placeholder="Masukkan Topik Anda"></textarea>
		        </div>
		        <div class="form-group">
			        <input type="submit" name="simpan" class="btn btn-primary pull-right" value="Simpan">
		        </div>
		    </form>
	      </div>
	      <div class="modal-footer">
	      </div>
	    </div>
	  </div>
	</div>

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