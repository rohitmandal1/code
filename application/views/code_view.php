<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Hellow</h1>
<form action="<?php echo site_url('Code/insert');?>" method="POST">
<?php 
if ($fetch_record) {


foreach ($fetch_record as $all_datas ) {?>
<input type="checkbox" name="user_id[]" value="<?php echo $all_datas->id;?>"><tr><td><?php echo $all_datas->username;?></td></tr>
<?php } }

else{
	echo"no data found";
}

?>
<br><br>
<input type="submit" name="sub" value="Add">
</form>
</body>
</html>