<?php 
	include('../koneksi/koneksi.php');
	mysql_query("DELETE FROM tb_gallery WHERE id = '".$_GET['id']."'");
	refresh('gallery.php');
?>