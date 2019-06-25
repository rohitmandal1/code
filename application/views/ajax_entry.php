<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-theme.min.css') ?>">
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<div id="message"></div>
	 <!-- <form action="#" method="POST" > -->
<input type="text" name="name" id="name">
<input type="text" name="sur" id="sur">
<hr>
<button  id="contactForm"> submit </button>
<!-- </form> -->

<div>
<?php if($fetch_data){ ?>	
<table>
	<?php foreach($fetch_data as $each){ ?>
	<tr>
		<td><?php echo $each->username;  ?></td>
		<td><?php echo $each->pass;  ?></td>
		<td> <button type="button" class="btn btn-info btn-xs edit_data" data-toggle="modal"  id="<?php echo base64_encode($each->id);?>" data-target="#modal-updatesection">Edit</button></td>
		<td> <button type="button" class="btn btn-warning btn-xs dlt_data" data-toggle="modal" id="<?php echo base64_encode($each->id); ?>" data-target="#modal-deletesection">Delete</button></td>
		<td><button data="<?php echo base64_encode($each->id);?>"></button></td>
	</tr>
	<?php } ?>
</table>
<?php } ?>
</div>

 <div class="modal modal-info fade" id="modal-updatesection">
          <div class="modal-dialog">
            <form role="form"  method="POST">
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
                <button type="submit" class="btn btn-outline" value="Update" name="submit">Update Cast</button>
              </div>
            </div>
          </form>
          </div>
        </div>

</body>
</html>
 
<script>

$(document).ready(function(){
	$("#contactForm").on('click', function(e) {
		e.preventDefault();
		// alert('submit');

            // var contactForm = $(this);
            var name = $('#name').val();
            var sur = $('#sur').val();

            $.ajax({
                url: '<?php echo site_url('Ajax/entry'); ?>',
                type: 'post',
                data: ({
                	name : name,
                	sur : sur
                	}),
                success: function(response){
                    if(response) {
                            // location.reload(); 
                            //window.location.reload();
 
						}

                    $("#message").html(response.message);

                }
            });

	});
});


/*Fetch data*/
    $("button").click(function(){


       var title = $("input[name='name']").val();
       var description = $("input[name='sur']").val();


        $.ajax({
           url: 'Ajax/fetch',
           type: 'POST',
           data: {title: title, description: description},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
                $("tbody").append("<tr><td>"+title+"</td><td>"+description+"</td></tr>");  
           }
        });


    });
$(document).ready(function(){ 
  $(document).on('click', '.edit_data', function(){  
           var cast_id = $(this).attr("id");
           alert(cast_id);
           $.ajax({  
                url:"Ajax/fetch",  
                method:"POST",  
                data:{cast_id:cast_id},  
                dataType:"json",  
                success:function(data){  
                     $('#update_id').val(data.id);  
                     $('#update_category_name').val(data.username);
                     $('#update_pass').val(data.pass);   
                    $('#modal-updatesection').modal('show');  
                }  
           });  
      });
};
</script>
