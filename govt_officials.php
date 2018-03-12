<?php 
include "includes/functions.php";
include "header1.php"


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Volunteers</title>
</head>
<style>
input[type=text],input[type=password], select {
    width: 35%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 45%;
    background-color:#950255;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=button] {
    width: 45%;
    background-color:#0099CC;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}


/*input[type=submit]:hover {
    background-color:;
}
*/
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
function check_user()
{
	var user=$("#uname").val();
	var datastring="gusername="+user;
	$.ajax({
			type:"POST",
			url:"includes/ajax.php",
			data:datastring,
			cache:false,
			success:function(html)
			{
				var con=html.split('~');
				var msg=con[0];
				if(con[1]==1) {
				$("#form1 #error_form1").html("Username Already Exit.");
				$("#uname").val("");
				$("#form1 #uname").focus();
				}
				else
				{
					$("#form1 #error_form1").html("");
				}
			}
	});
}


function valid_reg()
{
	if( ($("#form1 #name").val()==""))
	{
	  $("#form1 #error_form1").html("Please Enter Your Name");
	  $("#form1 #name").focus();
	  return false;
	}
	
	else if(($("#form1 #uname").val()==""))
	{
		 
		 $("#form1 #error_form1").html("Please Enter Username");
		 $("#form1 #uname").focus();
	  	 return false;
	}
	else if(($("#form1 #psw").val()==""))
	{
		 
		 $("#form1 #error_form1").html("Please Enter Password");
		 $("#form1 #psw").focus();
	  	 return false;
	}

	else if(($("#form1 #city").val()==""))
	{
		 
		 $("#form1 #error_form1").html("Please Enter City");
		 $("#form1 #city").focus();
	  	 return false;
	}
	else if(($("#form1 #dist").val()==""))
	{
		 
		 $("#form1 #error_form1").html("Please Enter District");
		 $("#form1 #dist").focus();
	  	 return false;
	}
	
}
</script>
<body>
<?php 
if( isset($_POST['form_submit']) && $_POST['form_submit']=='Submit' )
{
 reg_govt_officials();
}
?>
<form id="form1" name="form1" method="post" action=""  enctype="multipart/form-data" onsubmit="return valid_reg();">
<h3 style="color:#950255; padding-left:170px; margin-top:35px">Government Officials Registration</h3>
<br />
<div id="error_form1" style="color:#B70000;padding-left:150px;"></div>
  <table width="75%" border="0" align="center">
  <?php 
  if($_GET['succ']==1)
  {
  ?>
  <div style="color:#930000; padding-left:170px">Registration Completed Successfuuly.</div>
  <?php } 
   if($_GET['fail']==1)
  {
  ?>
   <div style="color:#930000; padding-left:170px">Registration Not Completed.</div>
  <?php } ?>
 
    <tr>
      <td>Name&nbsp;&nbsp;<strong>:</strong></td>
    </tr>
	<tr>
      <td><input type="text" name="name" id="name" value="<?php echo $_POST['name'] ?>" style="background-color:#FFFFFF; color:#000000; border-color:#CCCCCC; width:35%" /></td>
    </tr>
	 <tr>
      <td>Username&nbsp;&nbsp;<strong>:</strong></td>
    </tr>
	<tr>
      <td><input type="text" name="uname" id="uname" value="<?php echo $_POST['uname'] ?>" onchange="check_user();" /></td>
    </tr>
    <tr>
      <td>Password&nbsp;&nbsp;<strong>:</strong></td>
    </tr>
	<tr>
      <td><input type="password" name="psw" id="psw" value="<?php echo $_POST['psw']; ?>" /></td>
    </tr>
    <tr>
      <td>State&nbsp;&nbsp;<strong>:</strong></td>
    </tr>
	<?php $sel_state=executework("select * from location where precatid='101'");?>
	 <tr>
    
      <td><select name="state" id="state" onchange="form1.submit();">
	  		<option value="">Select</option>
			<?php while($row=@mysql_fetch_array($sel_state)) {?>
			<option value="<?php echo $row['id']?>" <?php if($_POST['state']==$row['id']) { ?> selected="selected" <?php } ?> ><?php echo $row['name']; ?></option>
				<?php } ?>
	  </select>
	  </td>
    </tr>
	<tr>
	<tr>
      <td>District&nbsp;&nbsp;<strong>:</strong></td>
    </tr>
	<?php $sel_dist=executework("select * from location where precatid='".$_POST['state']."'"); 
	//echo ("select * from location where precatid='".$_POST['state']."'"); 
	?>
	 <tr>
      <td><select id="dist" name="dist">
	  <option value="">Select</option>
	  <?php while($row1=@mysql_fetch_array($sel_dist)) { ?>
		<option value="<?php echo $row1['id']?>" <?php if($_POST['dist']==$row1['id'] ) { ?> selected="selected" <?php } ?> ><?php echo $row1['name']; ?></option>
	  <?php } ?>
	  </select></td>
    </tr>
	<tr>
      <td>City&nbsp;&nbsp;<strong>:</strong></td>
    </tr>
	 <tr>
    
      <td><input type="text" name="city" id="city" value="" /></td>
    </tr>
   
	<tr>
	  <td>&nbsp;</td>
    </tr>
	<tr>
	  <td><label>
	    <input type="submit" name="form_submit" id="form_submit" value="Submit" onclick="return valid_reg();"  />
		<input type="hidden" name="sub" id="sub" value="Submit" />
		 <input type="button" name="cancel" id="cancel" value="Cancel" onclick="window.location.href='index.php';"  />
	  </label></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php 

?>