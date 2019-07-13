<?php include('user_header.php');?>

<div class="container">
	<form method="POST" enctype="multipart/form-data" action="<?php echo base_url('Users/insert');?>">
  <fieldset>
    <legend>Regristraion form</legend>
    <div class="row">
    	<div class="col-md-6">
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" name="username"  aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo set_value('username');?>">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
    </div>
    <div class="col-md-6">
    	<?php echo form_error('username');?>
    </div>
    </div>
    <div class="row">
    	<div class="col-md-6">
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" name="pass" placeholder="Password" value="<?php echo set_value('pass');?>">
    </div>
    </div>
    <div class="col-md-6">
    	<?php echo form_error('pass');?>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
    <div class="form-group">
      <label for="exampleTextarea">Name</label>
      <input type="text" class="form-control" name="name"  placeholder="Name" value="<?php echo set_value('name'); ?>">
    </div>
    </div>
    <div class="col-md-6">
    	<?php echo form_error('name');?>
    </div>
   </div>
<div class="row">
	<div class="col-md-6">
    <div class="form-group">
      <label for="exampleSelect1">Mobile</label>
      <input type="text" class="form-control" name="mobile"  placeholder="Mobile" value="<?php echo set_value('mobile');?>">
    </div>
    </div>
    <div class="col-md-6">
    	<?php echo form_error('mobile');?>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
    <div class="form-group">
      <label for="exampleInputFile">File input</label>
      <input type="file" class="form-control-file"  name="userfile" aria-describedby="fileHelp" value="<?php echo set_value('userfile');?>">
    </div>
    </div>
    <div class="col-md-6">
    	<?php echo form_error('userfile');?>
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-default">Cancle</button>
  </fieldset>
</form>
</div>
<?php include('user_footer.php');?>
