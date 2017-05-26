<?php 
	include('../koneksi/koneksi.php');
	mysql_query("DELETE FROM tb_slider WHERE id = '".$_GET['id']."'");
	refresh('slider.php');
?>