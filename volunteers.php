<?php 
include "includes/functions.php";
include "header1.php";
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
    margin: 14px 0;
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
	var datastring="vusername="+user;
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
	var gen=$('input[name=gender]:checked').length;
	if( ($("#form1 #name").val()==""))
	{
	  $("#form1 #error_form1").html("Please Enter Your Name");
	  $("#form1 #name").focus();
	  return false;
	}
	
	else if(($("#form1 #age").val()==""))
	{	
		 
		 $("#form1 #error_form1").html("Please Enter Your Age");
		 $("#form1 #age").focus();
	  	 return false;
	}

	else if((gen==0))
	{
		 $("#form1 #error_form1").html("Please Select Gender");
		 $("#form1 #gender").focus();
	  	 return false;
	}

	else if(($("#form1 #city").val()==""))
	{
		 
		 $("#form1 #error_form1").html("Please Enter City");
		 $("#form1 #city").focus();
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
}
</script>
<body>
<?php 
if(!empty($_POST['sub']))
{
reg_volunteers();
}
?>
<form id="form1" name="form1" method="post" action=""  enctype="multipart/form-data" onsubmit="return valid_reg();">
<h3 style="color:#950255; padding-left:170px; margin-top:35px">Volunteers Registration</h3>
<br />
<div id="error_form1" style="color:#B70000;padding-left:150px;"></div>
  <table width="75%" border="0" align="center">
  <?php 
  if($_GET['succ']==1)
  {
  ?>
  <div style="color:#950255; padding-left:170px"><br>Registration Successful! Thanks for supporting our cause.<br><br> </div>
  <?php } 
  if($_GET['fail']==1)
  {
  ?>
   <div style="color:#930000; padding-left:170px">Registration not Successful! Please re-try.</div>
  <?php } ?>
    <tr>
      <td>Name&nbsp;&nbsp;<strong>:</strong></td>
    </tr>
	<tr>
      <td><input type="text" name="name" id="name" value="" style="background-color:#FFFFFF; width:35%; border-color:#CCCCCC; color:#000000" /></td>
    </tr>
    <tr>
      <td>Age&nbsp;&nbsp;<strong>:</strong></td>
    </tr>
	<tr>
     
      <td><input type="text" name="age" id="age" value="" /></td>
    </tr>
    <tr>
      <td>Gender&nbsp;&nbsp;<strong>:</strong></td>
    </tr>
	 <tr>
     
      <td><label>
        &nbsp;&nbsp;<input name="gender" id="gender" type="radio" value="Male" /><font color = "#3333ff">&nbspMale</font>
       </label>
	   </td></tr><tr><td>
        <label>
         &nbsp;&nbsp;<input name="gender" id="gender" type="radio" value="Female" /><font color = "#950255">&nbspFemale</font>
       </label></td>
    </tr>
    <tr>
      <td>City&nbsp;&nbsp;<strong>:</strong></td>
    </tr>
	 <tr>
    
      <td><input type="text" name="city" id="city" value="" /></td>
    </tr>
    <tr>
      <td>Username&nbsp;&nbsp;<strong>:</strong></td>
    </tr>
	<tr>
      <td><input type="text" name="uname" id="uname" value="" onchange="check_user();" /></td>
    </tr>
    <tr>
      <td>Password&nbsp;&nbsp;<strong>:</strong></td>
    </tr>
	<tr>
      <td><input type="password" name="psw" id="psw" value="" /></td>
    </tr>
	<tr>
	  <td>&nbsp;</td>
    </tr>
	<tr>
	  <td><label>
	    <input type="submit" name="submit" id="submit" align="center" value="Submit" onclick="return valid_reg();"  />
		<input type="hidden" name="sub" id="sub" value="Submit" />
		 <input type="button" name="cancel" id="cancel" value="Cancel" onclick="window.location.href='index.php';"  />
	  </label></td>
    </tr>
  </table>
</form>
</body>
</html>
