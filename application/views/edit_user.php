<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="<?php echo  site_url('Users/update');?>" method="POST">
	<input type="text" name="username" value="<?php echo $getdata->username;?>">
	<input type="text" name="pass" value="<?php echo $getdata->pass;?>">
	<input type="hidden" name="id" value="<?php echo $getdata->id;?>">
	<input type="submit" name="" value="Update">
</form>
</body>
</html>