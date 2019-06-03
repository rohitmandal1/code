<!DOCTYPE html>
<html>
<head>
	<title>yy</title>
</head>
<body>
	<form method="post" action="<?php echo site_url('Users/insert'); ?>">
		<input type="text" name="username" value="">
		<br>
		<input type="text" name="pass" value="">
		<br>
        <input type="submit" value="Add">
	</form>
<?php
foreach ($all_data as $all_datas) {
?>
<input type="text" name="" value="<?php echo $all_datas->username;?>"><br>
<a href="<?php echo site_url('Users/edit').'?id='.base64_encode($all_datas->id); ?>">Edit</a>
<a href="<?php echo site_url('Users/deleteuser').'?id='.base64_encode($all_datas->id); ?>">Delete</a>
<?php 
}

?>
</body>
</html>