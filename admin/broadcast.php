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
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css"> 
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
                        <li class="divider"></li>
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
                        <a href="event.php"><i class="fa fa-bar-chart-o"></i> Data Event</a>
                    </li>
                    <li>
                        <a href="gallery.php"><i class="fa fa-file-image-o"></i> Data Gallery</a>
                    </li>
                    <li>
                        <a href="member.php"><i class="fa fa-users"></i> Data Member</a>
                    </li>
                    <li>
                        <a class="" href="admin.php"><i class="fa fa-user"></i> Data Admin </a>
                    </li>
                    <li>
                        <a class="active-menu" href="broadcast.php"><i class="fa fa-envelope"></i> Broadcast </a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->

		<div id="page-wrapper">
    		  <div class="header"> 
                <h1 class="page-header">
                    Dashboard <small>Broadcast Pesan</small>
                </h1>
    			<ol class="breadcrumb">
        		  <li><a href="#">Home</a></li>
        		  <li class="active">Broadcast</li>
        		</ol> 
    		  </div>
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Data Broadcast</div>
                                <div class="panel-body">
                                    <?php
                                        if (isset($_POST['tambah'])) 
                                        {
                                            $tanggal = $_POST['tanggal'];
                                            $pesan = $_POST['pesan'];
                                            
                                            //simpan ke table broadcast
                                            mysql_query("insert into tb_broadcast (tanggal,pesan) values ('$tanggal','$pesan')") or die(mysql_error());

                                            //kirim kepada member
                                            $sql=mysql_query("select * from tb_member where status = '1' ORDER BY status ASC") 
                                                or die(mysql_error());
                                                    
                                            $no=0;
                                            while ($row= mysql_fetch_array($sql)) 
                                            {
                                                  //input ke outbox
                                                    $no_hp = $row['telp'];

                                                    mysql_query("INSERT INTO outbox (DestinationNumber,TextDecoded)
                                                                 VALUES('$no_hp','$pesan')
                                                        ") or die(mysql_error());
                                            }

                                            echo '<script language="javascript">alert("Pesan Telah dikirimkan Kepada Member");</script>';
                                            refresh('broadcast.php');
                                        }
                                    ?>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                      <i class="fa fa-plus"></i> Tambah
                                    </button>
                                    <hr>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="info">
                                                <th style="width:15px;">No</th>
                                                <th>Tanggal</th>
                                                <th>Pesan</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql = mysql_query("select * from tb_broadcast order by id desc") or die(mysql_error());
                                                $no=0;
                                                while ($rows=mysql_fetch_array($sql)) 
                                                {
                                                $no++;
                                            ?>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $rows['tanggal'] ?></td>
                                                        <td><?php echo nl2br($rows['pesan']); ?></td>
                                                       
                                                    </tr>
                                                   
                                            <?php
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->
            </div>
        <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Pesan</h4>
      </div>
      <form method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
                <label>Pesan</label>
                <textarea name="pesan" class="form-control" required maxlength="160" placeholder="silahkan ketikkan Pesan..."></textarea>
            </div>
            <input type="hidden" name="tanggal" value="<?php echo date("Y-m-d");?>">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
          </div>
      </form>
    </div>
  </div>
</div>

    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
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

      <script>
    
      </script>

</body>

</html>