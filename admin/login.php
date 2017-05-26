<?php
	include('../koneksi/koneksi.php');
	if (isset($_SESSION['admin'])) 
	{
		header('Location:index.php');
	}
?>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
      <link rel="stylesheet" href="login/css/style.css">  
</head>

<body>
  <body>
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h2>Samarinda Beatbox</h2>
			</div>
			<?php
				if (isset($_POST['login'])) 
				{
					$sql= mysql_query("select * from tb_admin where username='".$_POST['username']."' and password='".$_POST['password']."'") or die(mysql_error());
					if (mysql_num_rows($sql)>0) 
					{
						$row = mysql_fetch_array($sql);
						$_SESSION['admin']=$row['id'];
						header('Location:index.php');
					}
					else
					{
						echo "Maaf Username atau Password Salah";
					}
				}
			?>
			<form method="post">
				<div class="login-form">
					<div class="control-group">
						<input type="text" name="username" class="login-field" placeholder="username" id="login-name">
						<label class="login-field-icon fui-user" for="login-name"></label>
					</div>
					<div class="control-group">
						<input type="password" class="login-field" name="password" placeholder="password" id="login-pass">
						<label class="login-field-icon fui-lock" for="login-pass"></label>
					</div>
					<input type="submit" class="btn btn-primary btn-large btn-block" name="login" value="Login">
				</div>
			</form>
		</div>
	</div>
</body>
  
  
</body>
</html>
