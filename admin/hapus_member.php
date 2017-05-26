<?php 
	include('../koneksi/koneksi.php');
	mysql_query("DELETE FROM tb_member WHERE id = '".$_GET['id']."'");
	refresh('member.php');
?>