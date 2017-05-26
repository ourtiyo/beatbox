<?php
	session_start();
	mysql_connect('localhost','root','rahasia21');
	$db = mysql_select_db('db_beatbox');

	function refresh($url)
	{
		echo '<meta http-equiv="refresh" content="0; '.$url.'">';
	}
?>
