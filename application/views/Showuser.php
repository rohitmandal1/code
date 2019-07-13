<!DOCTYPE html>
<html>
<head>
	<title>yy</title>
</head>
<body> 
	<!-- <?php echo $error;?> -->
	<form method="post" action="<?php echo site_url('Users/insert'); ?>" enctype="multipart/form-data">
		<input type="text" name="username" value="">
		<br>
		<input type="text" name="pass" value="">
        <br>
        <input type="file" value="Add" name="images[]" multiple>
        <br>
        <input type="submit" value="Add">
	</form>
	<a href="<?php echo  site_url('Code/Index');?>">Change</a>
<?php
foreach ($all_data as $all_datas) {
?>
<input type="text" name="" value="<?php echo $all_datas->username;?>"><br>
<a href="<?php echo site_url('Users/edit').'?id='.base64_encode($all_datas->id); ?>">Edit</a>
<a href="<?php echo site_url('Users/deleteuser').'?id='.base64_encode($all_datas->id); ?>">Delete</a>
<div id="container"><img src="<?php  echo base_url($all_datas->img); ?>" alt="" style = "width:50px; height:50px" /></div>
<?php 
}

?>
</body>
</html>