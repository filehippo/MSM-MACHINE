<!doctype html>
<html lang="en">
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Machine Shop Database">
    <meta name="author" content="Alfred Albizures">

	<link rel="SHORTCUT ICON" href="logincss/iconlogo.jpg"/>
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="logincss/iconlogo.jpg" />
	<link rel="apple-touch-icon" sizes="72x72" href="logincss/iconlogo.jpg" />
	<link rel="apple-touch-icon" sizes="114x114" href="logincss/iconlogo.jpg" />
	<link rel="apple-touch-icon" sizes="144x144" href="logincss/iconlogo.jpg" />
	
    <title>MSM Machine</title>
    <!-- Bootstrap core CSS -->
    <link href="logincss/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="logincss/floating-labels.css" rel="stylesheet">
	</head>

	<?php
		include('authen/login.php'); // Includes Login Script
		if(isset($_SESSION['login_user']))
		{
		header("location: user/profile.php");
		}
	?>
  
	<body>
		<form class="form-signin" form action="" method="post" id="frmLogin">  
			<div class="text-center mb-4">
			<img class="mb-4" src="logincss/iconlogo.jpg" alt="" width="72" height="72">
			<h1 class="h3 mb-3 font-weight-normal">MSM Machine</h1>
			<p>Database Management Tool</p>
		</div>
		<div class="form-label-group">
			<input name="username" type="text" id="name" class="form-control" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" placeholder="Username" required >
			<label for="name">Username</label>
		</div>
		<div class="form-label-group">
			<input type="password" name="password" id="password" class="form-control" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" placeholder="Password" required>
			<label for="password">Password</label>
		</div>
		<div class="checkbox mb-3">
			<label>
			<input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["username"])) { ?> checked <?php } ?> />
			<label for="remember-me">remember me</label>
		</div>
			<input type="submit" name="submit" value="Sign in"  class="btn btn-lg btn-primary btn-block" >
			<p class="mt-5 mb-3 text-muted text-center">msmmachine &copy; 2018, 2019 </p>
		</form>
	</body>
</html>
<!--  
Made with <3 in Houston,TX by
William and Alfred Albizures
2/13/2019 - 5:30 PM 
hello@twinrat.com
		   _
       .__(.)< (Skuahhh)
        \___)   
 ~~~~~~~~~~~~~~~~~~-->
