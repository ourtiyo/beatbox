<?php 
	include('../koneksi/koneksi.php');
	mysql_query("DELETE FROM tb_admin WHERE id = '".$_GET['id']."'");
	refresh('admin.php');
?>