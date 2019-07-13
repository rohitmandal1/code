<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
</head>
<body>
<form action="<?php echo site_url('Select/insert');?>" method="POST">
	<select name="course">
		<option>select</option>
		<?php foreach ($course_data as $course_datas): ?>
			<option value="<?php echo $course_datas->id?>"><?php echo $course_datas->name; ?></option>
		<?php endforeach ?>
	</select>

	<select name="user">
		<option>select</option>
		<?php foreach ($user_data as $user_datas): ?>
			<option value="<?php echo $user_datas->id?>"><?php echo  $user_datas->username;?></option>
		<?php endforeach ?>
	</select>

	<input type="submit" name="sub" value="Add">
    </form>
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
             <table id="DataTab" class="display" cellspacing="0" width="100%" style="text-transform:capitalize">
              <thead>
               <tr>
                            <th>S.R.No.</th>
                        <th>Username</th>
                        <th>Apply course</th>
                         
                 </tr>
              </thead>
                        <tbody>
                       <?php 
                     $i=1;
                     foreach ($apply_data as $apply_datas) {

                       ?>
                      <tr align="center"> 
                        <td><?php echo $i++;?></td>
                        <td><?php echo $apply_datas->username;?></td>
                        <td><?php echo $apply_datas->name;?></td>
                         </tr>
                         <?php }?>
                            </tbody> 
                      </table> 
 </table>
<hr>
 <form action="" method="POST">
 	<select name="user" id="user" onchange="getalldetail();">
		<option>select</option>
		<?php foreach ($user_data as $user_datas): ?>
			<option value="<?php echo $user_datas->id?>"><?php echo  $user_datas->username;?></option>
		<?php endforeach ?>
	</select>
  
  <div id="emp_amount_data">
	<input type="text" name="" id="" value="">		
  </div>
 </form>
 <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type="text/javascript">
    function getalldetail()
{   var user = $('#user').val();
 $.ajax({ 
    type: 'POST',
    datatype:'json', 
    url: "<?php echo site_url('Select/fetch_coursedata'); ?>", 
    data: { user : user },
    success: function (data) {
      $('#emp_amount_data').html(data);
    }
    });
}

</script>
</body>
</html>