<?php
    include('../koneksi/koneksi.php');
    if (!isset($_SESSION['admin'])) 
    {
        header('Location:login.php');
    }
    $sql_admin= mysql_query("select * from tb_admin where id='".$_SESSION['admin']."'")or die(mysql_error());
    $row_admin = mysql_fetch_array($sql_admin);
    $sql = mysql_query("select * from tb_komunitas");
    $row = mysql_fetch_array($sql);
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../images/icon.ico"/>
    <title>Beatbox</title>
            <script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/jquery-gmaps-latlon-picker.css"/>
    <script type="text/javascript" src="../js/jquery-gmaps-latlon-picker.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAS9xgi3tO8hgUZXRYAYysflM64O5iwE88"></script>

    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css"> 
    <link rel="stylesheet" type="text/css" href="assets/css/style_common.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/style1.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/mystyle.css">

</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><strong>Beatbox Samarinda</strong></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <?php echo $row_admin['nama']; ?><i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
        <div id="sideNav" href=""><i class="fa fa-caret-right"></i></div>
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a class="active-menu" href="slider.php"><i class="fa fa-vcard"></i> Data Komunitas</a>
                    </li>
                    <li>
                        <a href="event.php"><i class="fa fa-bar-chart-o"></i> Data Event</a>
                    </li>
                    <li>
                        <a href="gallery.php"><i class="fa fa-file-image-o"></i> Data Gallery</a>
                    </li>
                    <li>
                        <a href="member.php"><i class="fa fa-users"></i> Data Member</a>
                    </li>
                    <li>
                        <a href="admin.php"><i class="fa fa-user"></i> Data Admin </a>
                    </li>
                     <li>
                        <a class="" href="broadcast.php"><i class="fa fa-envelope"></i> Broadcast </a>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->

		<div id="page-wrapper">
    		  <div class="header"> 
                <h1 class="page-header">
                    Data Komunitas <small>Slider</small>
                </h1>
    			<ol class="breadcrumb">
        		  <li><a href="index.php">Home</a></li>
                  <li><a href="#">Data Komunitas</a></li>
        		  <li class="active">Slider</li>
        		</ol> 
    		  </div>
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Banner Slider
                        </div>
                        <div class="panel-body">
                            <h3>Tambah Slider</h3><hr>
                            <?php 
                                if (isset($_POST['tambah_slider'])) 
                                {
                                    $gambar = $_FILES['slider']['name'];
                                    $lokasi_slider = $_FILES['slider']['tmp_name'];
                                    move_uploaded_file($lokasi_slider, "../images/slider/$gambar");
                                    mysql_query("INSERT INTO tb_slider (gambar) VALUES ('$gambar')");
                                    //echo '<meta http-equiv="refresh" content="0; slider.php">';
                                    refresh('slider.php');
                                }
                            ?>
                            <form method="post" enctype="multipart/form-data">
                                <div class="fileUpload btn btn-primary">
                                    <span><i class="fa fa-plus"></i> Pilih Foto</span>
                                    <input type="file" name="slider" required class="upload" />
                                </div>
                                <input type="submit" class="btn btn-success" name="tambah_slider" value="Upload">

                            </form>
                            <hr>
                            <div class="row">
                                <?php
                                    $sql_slider = mysql_query("select * from tb_slider") or die(mysql_error());
                                    while ($row_slider = mysql_fetch_array($sql_slider)) 
                                    {
                                ?>
                                    <div class="col-md-4 view view-first">
                                        <img class="img-thumbnail" src="../images/slider/<?php echo $row_slider['gambar'];?>" />
                                         <a class="info" href="hapus_slider.php?id=<?php echo $row_slider['id'];?>" onclick="return confirm('Yakin Ingin Menghapus?')"><h2>HAPUS</h2></a>
                                    </div>
                                <?php
                                    }
                                ?>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                
                    <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Informasi Komunitas
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form method="post">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="mail" name="email" class="form-control" value="<?php echo $row['email'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Telpon</label>
                                            <input type="number" name="telp" class="form-control" value="<?php echo $row['telp'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                                        </div>
                                        <?php
                                            if (isset($_POST['simpan'])) 
                                            {
                                                $mail = $_POST['email'];
                                                $telp = $_POST['telp'];
                                                $alamat = $_POST['alamat'];
                                                $lat = $_POST['lat'];
                                                $long = $_POST['long'];
                                                mysql_query("UPDATE tb_komunitas SET email = '$mail',
                                                                                     telp ='$telp',
                                                                                     alamat = '$alamat',
                                                                                     lat = '$lat',
                                                                                     lang = '$long'
                                                    where id='".$row['id']."'
                                                    ");
                                                refresh('slider.php');
                                            }
                                        ?>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                        <label>Map</label>
                                        <fieldset class="gllpLatlonPicker">
                                            <div class="gllpMap">Google Maps</div>
                                            Latitude : <input type="text" name="lat" class="gllpLatitude" value="<?php echo $row['lat']; ?>"/>
                                            Longitude : <input type="text" name="long" class="gllpLongitude" value="<?php echo $row['lang']; ?>"/>
                                            <input type="hidden" name="zoom" class="gllpZoom" value="13"/>
                                        </fieldset>
                                    </div>
                                </form>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                
                </div>
                <!-- /. ROW  -->
            
        
            </div>
        <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
     
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    
    
    <script src="assets/js/easypiechart.js"></script>
    <script src="assets/js/easypiechart-data.js"></script>
    
     <script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>
    
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>

    <script type="text/javascript">jssor_1_slider_init();</script>

</body>

</html>