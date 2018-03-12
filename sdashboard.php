<?php 
ob_start();
session_start();
include "includes/include.php";
include "includes/functions.php";
include "header.php";
if(!empty($_SESSION['sample_id']) && $_SESSION['sample_type']=='4')
{

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>School Officials</title>
<style>
* {box-sizing: border-box}
body {font-family:"Times New Roman", Times, serif;}

/* Style the tab */
.tab {
    float: left;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    width: 20%;
    height: 100%;
}

/* Style the buttons inside the tab */
.tab button {
    display: block;
    background-color: inherit;
    color: black;
    padding: 15px 20px;
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    float: left;
    padding: 0px 12px;
  /*  border: 1px solid #ccc;*/
    width: 80%;
    border-left: none;
    height: 100%;
}
input[type=submit] {
    width: 15%;
    background-color:#930000;
    color: white;
    padding: 10px 15px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=text],input[type=password], select {
    width: 35%;
    padding: 8px 10px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

#loading-img {

  border: 16px solid #f3f3f3;
  border-radius: 50%;
  /*border-top: 16px solid #CCCCCC;*/
  border-top: 16px solid #CCCCCC;
 border-bottom: 16px solid #CCCCCC;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
      margin-top: 15%;
    margin-left: 45%;
}

.overlay {
    background: #e9e9e9;
    display: none;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    opacity: 0.5;

}

</style>

<div class="overlay">
    <div id="loading-img"></div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
function valid_check()
{
	 if(document.form1.num_units.value=="")
		{
			 $("#form1 #error_form1").html("Please Enter Number Units Required");
			 $("#form1 #num_units").focus();
			 return false;
		}
		
}
function confirm_quote(id)
{
	var datastring="confirm_quote="+id;
	$.ajax({
			type:"POST",
			url:"includes/ajax.php",
			data:datastring,
			cache:false,
			success:function(html)
			{
				var con=html.split('~');
				if(con[1]==1)
				{
					window.location.href="sdashboard.php?cstatus="+1;
					$(".overlay").hide();
				}
			}
	});
}
function check_file()
{
	 if(document.form4.file.value=="")
	{	
		 $("#form4 #error_form4").html("Please Select File to Upload");
		 $("#form4 #file").focus();
	  	 return false;
	}
	 else if(document.form1.file.value!="")
	{	
		var cx=document.form1.file.value;
		var ext = cx.substr(document.form1.file.value.lastIndexOf('.') + 1);
		if(cx!="")
		{
			if(ext!="csv")
			{
				$("#form4 #error_form4").html("Sorry, only csv Files are allowed");
				cx="";
				$("#form4 #file").focus();
				return false;
			}	
		}

	}
}
function check_files()
{
	 var school_name=$("select[name=school_name]").val();
	 if(school_name=="")
	{
		 $("#form5 #error_form5").html("Please Select School Name");
		 $("#form5 #school_name").focus();
	  	 return false;
	}
	 else if(document.form5.file.value=="")
	{	
		 $("#form5 #error_form5").html("Please Select File to Upload");
		 $("#form5 #file").focus();
	  	 return false;
	}
	 else if(document.form5.file.value!="")
	{	
		var cx=document.form5.file.value;
		var ext = cx.substr(document.form5.file.value.lastIndexOf('.') + 1);
		if(cx!="")
		{
			if(ext!="csv")
			{
				$("#form5 #error_form5").html("Sorry, only csv Files are allowed");
				cx="";
				$("#form5 #file").focus();
				return false;
			}	
		}

	}
}
</script>
</head>
</head>
<body>
<?php 
if( isset($_POST['form_submit']) && $_POST['form_submit']=='Submit' )
{
	req_stock();
}
?>
<?php 
if(!empty($_POST['submit']))
{
upload_govtofficials();
}
if(!empty($_POST['Submit']))
{
	upload_school_details();
}

if(!empty($_GET['dwnld']) && $_GET['dwnld']==1)
{
	 $file = "sampledata.csv";
	 $filename=str_replace(' ','',$file);
	if (file_exists('upload_files/'.$file)) 
	{
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.$filename);
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public'); 
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile('upload_files/'.$file);
	    exit;
	 redirect("sdashboard.php?qid=".$examc);
	}
}
?>
<br /><br />

<div class="tab">
  <button class="tablinks" onClick="openCity(event, 'Upload')" id="defaultOpen">Upload</button>
  <button class="tablinks" onClick="openCity(event, 'Modify')" id="modify">Modify</button>
  <button class="tablinks" onClick="openCity(event, 'Required_stock')" id="defaultOpens">Request Stock</button>
  <button class="tablinks" onClick="openCity(event, 'Confirm_stock')" id="confirm_stock">Confirm Receipt Of Stock</button>
    <button class="tablinks" onClick="window.location.href='logout.php'">Logout</button>
</div>
<div id="Upload" class="tabcontent">
  <h3 style="color:#B70000; padding-left:100px">Upload File</h3><div style="padding-left:750px; color:#00A3F0"><a href="sdashboard.php?dwnld=1">Download Sample file</a></div>
  <form name="form4" id="form4" enctype="multipart/form-data" method="post" action="" onSubmit="return check_file();">
  <?php if($_GET['govt_succ']==1)
  {
  ?>
  <div style="color:#B70000; padding-left:350px">Uploaded Successfully.</div>
  <?php } ?>
  <div id="error_form4" style="color:#B70000;padding-left:100px"></div>
  <table border="0" width="100%" align="center">
  <tr>
  <td width="35%"><div align="right">Upload File</div></td>
  <td width="4%"><strong>:</strong></td>
  <td width="61%"><input type="file" name="file" id="file" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <td colspan="3" style="padding-left:350px"><input type="submit" name="submit" id="submit" value="Submit" onClick="return check_file();"></td>
  </tr>
  </table>
  </form>
</div>

<div id="Modify" class="tabcontent">
  <h3 style="color:#950255; padding-left:100px">Modify File</h3><div style="padding-left:750px; color:#00A3F0"><a href="sdashboard.php?dwnld=1">Download Sample file</a></div>
  <form name="form5" id="form5" enctype="multipart/form-data" method="post" action="" onSubmit="return check_files();">
  <?php if($_GET['school_succ']==1)
  {
  ?>
  <div style="color:#950255; padding-left:350px">Updated Successfully.</div>
  <?php } ?>
  <div id="error_form5" style="color:#950255;padding-left:100px"></div>
  <table border="0" width="100%" align="center">
  <tr>
  <!--<td width="35%"><div align="right">Select School Name</div></td>
  <td width="4%"><strong>:</strong></td>
  <td width="61%">-->
  <?php 
  
  $sel=executework("select * from sample_reg where id='".$_SESSION['sample_id']."'");
 	$row=@mysql_fetch_array($sel)
  ?>
  <input type="hidden" name="school_name" id="school_name" value="<?php echo $row['name']; ?>" readonly="" >
  </td>
  </tr>
  <tr>
  <td width="35%"><div align="right">Upload File</div></td>
  <td width="4%"><strong>:</strong></td>
  <td width="61%"><input type="file" name="file" id="file" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <td colspan="3" style="padding-left:350px"> <input type="submit" name="Submit" id="Submit" value="Submit" onClick="return check_files();">
  											<input type="hidden" name="sub" id="sub" value="Submit">
  </td>
  </tr>
  </table>
  </form>
</div>
<div id="Required_stock" class="tabcontent">
  <h3 style="color:#950255; padding-left:100px">Request Stock</h3><br><br>
  <form name="form1" id="form1" enctype="multipart/form-data" method="post" action="" onSubmit="return valid_check();">
  <?php 
  if($_GET['succ']==1)
  {?>
  <div style="color:#950255; padding-left:320px">Submitted Successfully.</div>
  <?php } ?>
  <div id="error_form1" style="color:#950255;padding-left:100px"></div>
  <table border="0" width="100%" align="center">
 <?php /*?> <?php $sel_state=executework("select * from location where precatid='101'");?>
  <tr>
  <td width="35%"><div align="right">Select State</div></td>
  <td width="4%"><div align="center"><strong>:</strong></div></td>
  <td width="61%"><select id="state" name="state" onChange="form1.submit();">
  				  <option value="">Select</option>
				  <?php while($row=@mysql_fetch_array($sel_state))
				  		{
				  ?>
				  <option  value="<?php echo $row['id']; ?>" <?php if($_POST['state']==$row['id']) { ?> selected="selected" <?php } ?> ><?php echo $row['name']?></option>
				  <?php } ?>
  				  </select>
  </td>
  </tr>
  <tr>
  <?php $sel1=executework("select * from location where precatid='".$_POST['state']."'"); ?>
  <td width="35%"><div align="right">Select City</div></td>
  <td width="4%"><div align="center"><strong>:</strong></div></td>
  <td width="61%">
  <select id="dist" name="dist">
	<option value="">Select</option>
	<?php while($row1=@mysql_fetch_array($sel1)) {
	?>
	<option value="<?php echo $row1[id]; ?>"><?php echo $row1['name']; ?></option>
	<?php } ?>
  </select>
  </td>
  </tr><?php */?>
  <tr>
  <td width="35%"><div align="right">Number Of Units Required</div></td>
  <td width="4%"><div align="center"><strong>:</strong></div></td>
  <td width="61%"><input type="text" name="num_units" id="num_units" value=""></td>
  </tr>
  <?php $sel_id=executework("select * from sample_reg where id='".$_SESSION['sample_id']."'");
  $rowid=@mysql_fetch_array($sel_id);
  
   ?>
   <input type="hidden" name="state" id="state" value="<?php echo  $rowid['state']; ?>">
   <input type="hidden" name="dist" id="dist" value="<?php echo $rowid['district']; ?>" >
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <td colspan="3" style="padding-left:350px"><input type="submit" name="form_submit" id="form_submit" value="Submit" onClick="return valid_check();"></td>
  </tr>
  </table>
  
  <br><br><?php 
  $sel_req=executework("select * from approvestock_det where user_id='".$_SESSION['sample_id']."' and (status='1' or status='2') order by id desc");
  $count=@mysql_num_rows($sel_req);
  if($count>0)
  {
  ?>
  <table border="1" cellpadding="4" cellspacing="4" width="75%" align="center">
  <tr style="background-color:#CCCCCC">
  <td>S.No</td>
  <td>State</td>
  <td>District</td>
  <td>Number Of Units</td>
  <td>Request Date</td>
  </tr>
  <?php 
  $i=1;
  while($row=@mysql_fetch_array($sel_req))
  {
  $date=date('d-M-y h:i a',strtotime($row['date']));
  $get_state=executework("select * from location where id='".$row['state']."'");
  $srow=@mysql_fetch_array($get_state);
  $get_dist=executework("select * from location where id='".$row['district']."'");
  $drow=@mysql_fetch_array($get_dist);
  ?>
  <tr>
  <td><?php echo $i; ?></td>
  <td><?php echo $srow['name']; ?></td>
  <td><?php echo $drow['name']; ?></td>
  <td><?php echo $row['num_units']; ?></td>
    <td><?php echo $date; ?></td>

  </tr>
  <?php $i++; }?>
  </table>
  <?php } 
  else {
    ?>
  <div align="center" style="color:#B70000; font-size:20px">No records Found.</div>
  <?php } ?>
  </form>
</div>

<div id="Confirm_stock" class="tabcontent">
  <h3 style="color:#950255; padding-left:100px">Confirm Receipt of Stock</h3><br><br>
  <form name="form2" id="form2" enctype="multipart/form-data" method="post" action="">
  <?php 
  if($_GET['cstatus']==1)
  {
  ?>
  <div align="center" style="color:#B70000">Receipt Acknowledged Successfully.</div>
  <?php } ?>
  <?php 
 // $sel=executework("select * from quote_price where status='2' order by id desc");
   $sel=executework("select * from approvestock_det where user_id='".$_SESSION['sample_id']."'  order by id desc");
  ?>
  <table border="1" cellpadding="2" cellspacing="2" width="70%" align="center">
  <tr style="background-color:#CCCCCC">
  <td width="7%" align="center">S.No</td>
  <td width="15%" align="center">NumberOf Units</td>
<!--  <td width="22%" align="center">Manufacturing Companies</td>
-->  <td width="15%" align="center">Quote Price</td>
  <td width="16%" align="center">Approve Date</td>
  <td width="15%" align="center"></td>
  </tr>
  <?php 
  $i=1;
  while($row=@mysql_fetch_array($sel)) 
  {
  $date=date('d-M-Y h:i a',strtotime($row['approve_date']));
  $sel1=executework("select * from  quote_price where id='".$row['quote_id']."' order by id desc");
  $row1=@mysql_fetch_array($sel1);
 // echo $row['status']."---";
  $get_mname=executework("select * from sample_reg where id='".$row['manf_id']."'");
  $row_mname=@mysql_fetch_array($get_mname);
 // $date=date("d/m/Y",strtotime($row1['approve_date']));
  ?>
  <tr>
  <td align="center"><?php echo $i; ?></td>
  <td align="center"><?php echo $row['num_units']; ?></td>
<!--  <td align="center"><?php //echo $row['name'];?></td>
-->  <td align="center"><?php echo $row1['price']; ?></td>
 
  <?php if($row['status']==4) {?>
   <td align="center"><?php echo $date; ?></td>
  <td><span style="color:#2D7B3F; font-size:20px">Confirmed.</span></td>
  <?php } 
  else if($row['status']=='3') 
  { ?>
   <td align="center"><?php echo $date; ?></td>
  <td width="10%"><span style="color:#1414C9; font-size:20px; cursor:pointer; text-decoration:underline" onClick="confirm_quote(<?php echo $row['id']; ?>)">Confirm Receipt of Stock</span></td>
  <?php }
  else 
  {?>
  	<td><span style="color:#2D7B3F; font-size:20px"></span></td>
  	<td><span style="color:#2D7B3F; font-size:20px">Pending.</span></td>
  <?php } ?>
  </tr>
  <?php $i++;
  }?>
  </table>  </form>
</div>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
     <?php 
	 if(!empty($_GET['succ']))
	 {
	 ?><script>
	document.getElementById("defaultOpens").click();
	 </script>
	 
	 <?php } 
	  if(!empty($_POST['state']))
	 {
	 ?><script>
	document.getElementById("defaultOpens").click();
	 </script>
	 
	 <?php }
	  if(!empty($_GET['cstatus']))
	 {
	 ?><script>
	document.getElementById("confirm_stock").click();
	 </script>
	 
	 <?php }
	  if(!empty($_GET['govt_succ']))
	 {
	 ?><script>
	 document.getElementById("defaultOpen").click();
	 </script>
	 <?php }
	  if(!empty($_GET['school_succ']))
	 {
	 ?><script>
		document.getElementById("modify").click();

	 </script>
	 <?php } 
	  }
	else { 
			session_destroy();
			echo "<script>window.location.href='index.php';</script>";
	 }
	
	 ?>
</body>
</html> 
