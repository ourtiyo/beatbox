<?php
    include('../koneksi/koneksi.php');
    if (!isset($_SESSION['admin'])) 
    {
        header('Location:login.php');
    }
    $sql_admin= mysql_query("select * from tb_admin where id='".$_SESSION['admin']."'")or die(mysql_error());
    $row_admin = mysql_fetch_array($sql_admin);
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../images/icon.ico"/>
    <title>Beatbox</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- ckeditor-->
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <!-- datetimepicker-->
    <link rel="stylesheet" type="text/css" href="assets/js/datetimepicker/bootstrap-datetimepicker.min.css">
    <script type="text/javascript" src="assets/js/datetimepicker/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/datetimepicker/moment.js"></script>
    <script type="text/javascript" src="assets/js/datetimepicker/bootstrap-datetimepicker.min.js"></script>


    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css"> 
    <link rel="stylesheet" type="text/css" href="assets/css/mystyle.css">
     <script type="text/javascript">
      $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD h:m:s A',
          });
      });


</script>

</head>

<body>
    <?php
        $sql=mysql_query("select * from tb_event where id='".$_GET['id']."'");
        $row = mysql_fetch_array($sql);
    ?>
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
                        <?php echo $row_admin['nama']; ?> <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
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
                        <a href="slider.php"><i class="fa fa-vcard"></i> Data Komunitas</a>
                    </li>
                    <li>
                        <a class="active-menu" href="event.php"><i class="fa fa-bar-chart-o"></i> Data Event</a>
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
                    Data Event <small>Detail</small>
                </h1>
                <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="">Data Event</a></li>
                  <li class="active">Detail</li>
                </ol> 
              </div>
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Detail Event
                            </div>
                            <div>
                            <button class="btn btn-primary" style="margin:20px;" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"> </i> Edit</button>
                            <?php 
                                if (isset($_POST['simpan'])) 
                                {
                                    $judul = $_POST['judul'];
                                    $tanggal = $_POST['tanggal'];
                                    $gambar =$_FILES['gambar']['name'];
                                    $lokasi_gambar = $_FILES['gambar']['tmp_name'];
                                    $artikel = $_POST['artikel'];
                                    mysql_query("UPDATE tb_event SET judul = '$judul',
                                                                     tanggal = '$tanggal',
                                                                     artikel = '$artikel'
                                    where id='".$_GET['id']."'
                                     ");
                                    if ($gambar!="") 
                                    {
                                        move_uploaded_file($lokasi_gambar,"../images/event/$gambar");
                                        mysql_query("UPDATE tb_event SET gambar = '$gambar'
                                            where id='".$_GET['id']."'
                                            ");
                                    }
                                    refresh('detail_event.php?id='.$_GET['id']);
                                }
                            ?>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="../images/event/<?php echo $row['gambar']; ?>" class="img-responsive" alt="Responsive image">
                                        <h2><?php echo $row['judul'] ?></h2><br>
                                        <label style="color:#777;">Event : <?php echo $row['tanggal'];?></label>
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo $row['artikel']; ?>
                                    </div>
                                </div>
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
<!-- Modal tambah event -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Edit Event</h4>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Judul Event</label>
                <input type="text" name="judul" class="form-control" value="<?php echo $row['judul']; ?>">
            </div>
            <div class="form-group">
              <label for="datetimepicker">Tanggal Event</label>
              <div class="input-group date" id="datetimepicker1">
                    <input type='text' name="tanggal" class="form-control" value="<?php echo $row['tanggal']; ?>" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div> 
            <label>Gambar Event</label><br>
            <img style ="width:100px;"src="../images/event/<?php echo $row['gambar']; ?>">
            <div class="fileUpload btn btn-primary">
                <span><i class="fa fa-picture-o"></i> Ubah Gambar</span>
                <input type="file" name="gambar" class="upload"/>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="artikel" class="ckeditor" id="ckeditor" rows="5"><?php echo $row['artikel']; ?></textarea>
            </div>
                <input type="submit" name="simpan" class="btn btn-primary pull-right" value="Simpan">
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- /.modal tambah event -->

    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <!-- Bootstrap Js -->
     
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

      <script>
    
      </script>

</body>

</html>