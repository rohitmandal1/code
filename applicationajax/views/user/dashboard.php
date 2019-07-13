<?php include('userlogout_header.php');?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-theme.min.css') ?>">
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
      <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
</head>
<body> 
<h1>Hello. <?php echo $value->username;?></h1>
 <h1><?php 
//$adddata = $this->uri->segment(3);   
/*echo $adddata->stauts;*/

 echo $this->input->get('id');?></h1>
 
<div class="container">  
  <script src="js/front.js"></script>
         <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
          <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
          <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js">
          </script>
          <script type="text/javascript" class="init">
              $(document).ready(function() {
                $('#DataTab').DataTable();
              } );
          </script>
          <form method="POST">
             <table id="DataTab" class="display" cellspacing="0" width="100%" style="text-transform:capitalize">
              <thead>
               <tr>
                            <tr>  
                                    <th>Name</th>  
                                    <th>Username</th>  
                                    <th>Password</th>  
                                    <th>Mobile</th>  
                                    <th>Action</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>  
                               </tr> 
                         
                 </tr>
              </thead>
                        <tbody>
                       <?php
                       if (count($all)) {
                       
                        foreach ($all as $alls) {
                       ?>  
                               <tr>  
                                    <td><?php echo $alls->name;?></td>  
                                    <td><?php echo $alls->username;?></td>  
                                    <td><?php echo $alls->pass;?></td>  
                                    <td><?php echo $alls->mobile;?></td>
                                    <td>
                                      <div id="add"> 
                                      <button  type="button" name="add" id="<?php echo $value->id;?>" class="btn btn-info btn-xs edit_data">Add Frend
                                       </button>
                                     </div>
                                      </td>
                                    <td><input type="hidden" name="user_id" id="user_id" value="<?php echo $value->id;?>"></td>
                                    <td><input type="text" name="frend_id" id="frend_id" value="<?php echo $alls->id;?>"></td>s
                                    <td><input type="hidden" name="stauts" id="stauts" value="Send"></td>  
                               </tr>  
                               <?php }}

                                  ?>
                            </tbody>  
                      </table> 
 </form>
                  
           </div> 
<script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script> 
</body>
</html>
<script>

$(document).ready(function(){
  $(".edit_data").on('click', function(e) {
    e.preventDefault();
            var user_id = $('#user_id').val();
            var frend_id = $('#frend_id').val();
            var stauts = $('#stauts').val();

            $.ajax({
                url: '<?php echo site_url('Users/addfrend'); ?>',
                type: 'post',
                data: ({
                  user_id : user_id,
                  frend_id : frend_id,
                  stauts : stauts
                  }),
                success: function(response){
//alert(' Frend Request Send');
                    //$("#message").html(response.message);

                }
            });

  });
});

$(document).ready(function(){  
 $(document).on('click', '.edit_data', function(){  
           var cast_id = $(this).attr("id");
           
           $.ajax({  
                url:'<?php echo site_url('Users/showreq'); ?>',  
                type: 'post',  
                data:{cast_id:cast_id},  
                dataType:"json", 
                success:function(data){  
                      $('#add').html(data);    
                }  
           }); 

      });
      });
</script>
 

