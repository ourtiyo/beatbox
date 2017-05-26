<?php 
	include('../koneksi/koneksi.php');
	mysql_query("DELETE FROM tb_event WHERE id = '".$_GET['id']."'");
	refresh('event.php');
?>