<!DOCTYPE html>
<html>
<head>
 	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
<script src="<?php echo base_url('assets/js/jquery.js');?>"></script>

 </head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Rohit</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor03">
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<!-- <?php echo base_url('Users/login');?> -->
<form method="POST" id="loginForm" action="<?php echo base_url('Users/login');?>" >
  <fieldset>
    <?php if( $error=$this->session->flashdata('login_failed')):?>
    <div class="row">
      <div class="col-md-6">
        <div class="alert alert-dismissible alert-danger">
          <?php echo $error;?>
        </div>
      </div>
      <div class="col-md-6"></div>
    </div>
    <?php endif; ?>
    <div class="row">
      <div class="col-md-6">
    <div class="form-group">
      <label for="exampleInputEmail1">Username</label>
      <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Username">
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
      <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
    </div>
    </div>
    <div class="col-md-6">
      <?php echo form_error('pass');?>
    </div>
    </div>
    <button type="reset"  name="reset" class="btn btn-default">Reset</button>
    <button type="submit"  class="btn btn-primary">Submit</button>
  </fieldset>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</body>
</html>
<!-- <script type="text/javascript">
 $(document).ready(function() {
  $("#loginForm").unbind('submit').bind('submit', function() {
    var form = $(this);

    $.ajax({
      url: form.attr('action'),
      type: form.attr('method'),
      data: form.serialize(),
      dataType: 'json',
      success:function(response) {        
        if(response.success == true) {
          
          $(".text-danger").remove();
          $(".form-group").removeClass('has-error').removeClass('has-success');

        window.location.href= "http://[::1]/article/index.php/users/welcome";          
        }
        
        else{
          alert('hj');
        }
      } // /success
    });  // /ajax

    return false;
  }); 
});
</script> -->