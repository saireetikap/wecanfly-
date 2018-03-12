<?php 
include "includes/functions.php";
include "header1.html";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login</title>
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
    width:35%;
    background-color:#950255;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	align:center;
}
input[type=button] {
    width: 15%;
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
function valid_reg()
{
	 var gen=$("select[name=type]").val();
	if(($("#form1 #uname").val()==""))
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
	else if(gen=="")
	{
		 $("#form1 #error_form1").html("Please Select Type");
		 $("#form1 #type").focus();
	  	 return false;
	}
}
</script>
<body>
<?php 
if(!empty($_POST['sub']))
{
login_conf();
}
?>
<form  id="form1" name="form1" method="post" action=""  enctype="multipart/form-data" onsubmit="return valid_reg();">
<h3 style="color:#950255; padding-left:170px; margin-top:35px">Login Here</h3>
<br />
<div id="error_form1" style="color:#B70000;padding-left:150px;"></div>
  <table width="75%" border="0" align="center">
  <?php 
  if($_GET['succ']==1)
  {
  ?>
  <div style="color:#950255; padding-left:170px">Registration Completed Successfuuly.</div>
  <?php } 
   if($_GET['fail']==1)
  {
  ?>
   <div style="color:#950255; padding-left:170px">Invalid Login Username/Password.</div>
  <?php } ?>
    
	 <tr>
      <td>Username&nbsp;&nbsp;<strong>:</strong></td>
    </tr>
	<tr>
      <td><input type="text" name="uname" id="uname" value=""  /></td>
    </tr>
    <tr>
      <td>Password&nbsp;&nbsp;<strong>:</strong></td>
    </tr>
	<tr>
      <td><input type="password" name="psw" id="psw" value="" /></td>
    </tr>
   <tr>
      <td>Type&nbsp;&nbsp;<strong>:</strong></td>
    </tr>
	<tr >
      <td><select name="type" id="type">
	  <option value="">Select</option>
	  <option value="1">Volunteers</option>
	  <option value="2">Government Representative</option>
	  <option value="3">Manufacturing Company</option>
	  <option value="4">School Representative</option>
	  </select>
	  </td>
    </tr> 
	<tr>
	  <td>&nbsp;</td>
    </tr>
	<tr>
	  <td><label>
	    <input type="submit" name="submit" id="submit" value="Submit" onclick="return valid_reg();" style="width:50%"/>
		<input type="hidden" name="sub" id="sub" value="Submit"/>
		 <input type="button" name="cancel" id="cancel" value="Cancel" onclick="window.location.href='index.php';"  style="width:45%" />
	  </label></td>
    </tr>
  </table>
  <br />
 <br />
 <br />
</form>
</body>
</html>

