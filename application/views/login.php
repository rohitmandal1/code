<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php if ($error) {
		echo $error;
	}?>
<form method="post" action="<?php echo site_url('Login') ?>">
	
<input type="text" name="usernamr">
<br>	
<input type="text" name="pass">	
<br>
<input type="submit" name="" value="Login">
</form>
</body>
</html>