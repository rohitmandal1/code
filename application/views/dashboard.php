<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Hello <?php echo $value->username;?><br>
	<?php echo $value->id;?>
</h1>

<a href="<?php echo site_url('Login/logout');?>">Logout</a>
</body>
</html>