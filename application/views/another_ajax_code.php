<!DOCTYPE html>
<html>
<head>
  <title></title>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-theme.min.css') ?>">
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/js/jquery.js')?>"></script>
</head>
<body>
  <div id="message"></div>
   <!-- <form action="#" method="POST" > -->
    <form id="create_todo" method="POST" action="<?php echo site_url('Ajax/entry');?>">
<input type="text" name="name" id="name">
<input type="text" name="sur" id="sur">
<hr>
<button  id="contactForm"> submit </button>
</form>
<!-- </form> -->

<div>
<?php if($fetch_data){ ?> 
<table>
  <?php foreach($fetch_data as $each){ ?>
  <tr>
    <td><?php echo $each->username;  ?></td>
    <td><?php echo $each->pass;  ?></td>
    <td> <button type="button" class="btn btn-info btn-xs edit_data" data-toggle="modal"  id="<?php echo $each->id;?>" data-target="#modal-updatesection" name="user">Edit</button></td>
    <td> <button type="button" class="btn btn-warning btn-xs dlt_data" data-toggle="modal" id="<?php echo base64_encode($each->id); ?>" data-target="#modal-deletesection">Delete</button></td>
    <td><button data="<?php echo base64_encode($each->id);?>"></button></td>
  </tr>
  <?php } ?>
</table>
<?php } ?>
</div>

 <div class="modal modal-info fade" id="modal-updatesection">
          <div class="modal-dialog">
            <form role="form"  method="POST" action="">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Add Cast</h4>
              </div>
              <div class="box-body">
             <div class="row">
              
            <div class="col-md-6">
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Username:</label>
                  <input type="hidden" name="update_id" id="update_id">
                  <input type="text" class="form-control input-sm" name="update_category_name" id="update_category_name">
                </div>  
            </div>
              <div class="col-md-6">
                <label for="exampleInputEmail1">Pass:</label>
                <input type="text" class="form-control input-sm" name="update_pass" id="update_pass">
            </div>
            </div>
          </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline" name="action" >Update Cast</button>
              </div>
            </div>
          </form>
          </div>
        </div>

</body>
</html>
 
<script>
  $("#create_todo").submit(function(evt){
evt.preventDefault();

var url = $(this).attr('action');
var postData = $(this).serialize();

$.post(url, postData, function(o){
  if (o.result ==1) {
    Result.success();
    alert('oh');
  }
  else{
    Result.error();
  }
},'json');
  });
</script>
