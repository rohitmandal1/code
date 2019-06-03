$getempgenid=mysql_fetch_assoc(mysql_query("SELECT * FROM  `faculty_registration` order by id desc"));


  $xyz="INSERT INTO faculty_barcode(fec_id, fec_barcode) VALUES ('$eeid','$barcode')";

   $addslry = mysql_query("UPDATE `salarydetails` SET `amount`='$amount[$i]' WHERE `id`='$updateidget[$i]'");


   $q="delete from faculty_registration where id='".$_REQUEST['id']."'";




   <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type="text/javascript">
    function getalldetail()
{   var emp_id = $('#emp_id').val();
 $.ajax({ 
    type: 'POST', 
    url: 'get_fixed_amount.php', 
    data: { 'action': 'all_loan_amount', emp_id : emp_id },
    success: function (data) {
      $('#emp_amount_data').html(data);
    }
    });
}

</script>

<!-- get_fixed_amount.php -->
if(!empty($_POST['action']) && $_POST['action'] == 'all_loan_amount')	
	{ extract($_POST);
	 $employy_name_list = mysql_query("SELECT DISTINCT aproved_date,advance_amount,`loan_type` FROM `loan` WHERE `emp_id`='$emp_id'");


<select name="department" id="department" style="width:148px" onchange="getalldetail()">
      <option value="" selected="selected">Select</option>
      <? $contcode="SELECT * FROM departmets"; $contcodeq=mysql_query($contcode);
    while($cccode=mysql_fetch_array($contcodeq)){?>
      <option value="<?=$cccode[id]?>">
      <?=$cccode[hrd_department]?>
      </option>
      <?    }
    ?>
    </select>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type="text/javascript">
    function getalldetail()
{   var emp_id = $('#department').val();
 $.ajax({ 
    type: 'POST', 
    url: 'get_fixed_amount.php', 
    data: { 'action': 'var_amount', emp_id : emp_id },
    success: function (data) {
      $('#var_amount_data').html(data);
    }
    });
}
</script>


<!-- get_fixed_amount.php -->
	 if(!empty($_POST['action']) && $_POST['action'] == 'var_amount'){
		?>