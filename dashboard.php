<?php 
ob_start();
session_start();
include "includes/include.php";
include "includes/functions.php";
include "header.php";
if(!empty($_SESSION['sample_id']) && $_SESSION['sample_type']=='2')
{
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Government Officials</title>
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
</style>

<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #000000;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
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
<script type="text/javascript">
function approved_quote(id)
{
	var approve_id=id;
	var govt_id='<?php echo $_SESSION['sample_id']; ?>';
		$(".overlay").show();
	var datastring="approve_id="+approve_id+"&govt_id="+govt_id;
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
					window.location.href="dashboard.php?rstatus="+1;
					$(".overlay").hide();
				}
				if(con[1]==0)
				{
					alert("Already Send");
					window.location.href="dashboard.php";
					$(".overlay").hide();
				}

			}
	});
}

function check_file()
{
	 if(document.form1.file.value=="")
	{	
		 $("#form1 #error_form1").html("Please Select File to Upload");
		 $("#form1 #file").focus();
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
				$("#form1 #error_form1").html("Sorry, only csv Files are allowed");
				cx="";
				$("#form1 #file").focus();
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
		 $("#form2 #error_form2").html("Please Select School Name");
		 $("#form2 #school_name").focus();
	  	 return false;
	}
	 else if(document.form2.file.value=="")
	{	
		 $("#form2 #error_form2").html("Please Select File to Upload");
		 $("#form2 #file").focus();
	  	 return false;
	}
	 else if(document.form2.file.value!="")
	{	
		var cx=document.form2.file.value;
		var ext = cx.substr(document.form2.file.value.lastIndexOf('.') + 1);
		if(cx!="")
		{
			if(ext!="csv")
			{
				$("#form2 #error_form2").html("Sorry, only csv Files are allowed");
				cx="";
				$("#form2 #file").focus();
				return false;
			}	
		}

	}
}

</script>
<script type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

</head>
<body>
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
	 redirect("dashboard.php?qid=".$examc);
	}
}
?>
<br /><br />
<div class="tab">
<!--  <button class="tablinks" onClick="openCity(event, 'Upload')" id="defaultOpen">Upload</button>
  <button class="tablinks" onClick="openCity(event, 'Modify')" id="modify">Modify</button>
-->  <button class="tablinks" onClick="openCity(event, 'request_stock')" id="defaultOpen">Stock Requested</button>
  <button class="tablinks" onClick="openCity(event, 'approve_stock')" id="approve_stocks">Approve Stock</button>
    <button class="tablinks" onClick="window.location.href='logout.php'">Logout</button>
</div>
<?php /*?><div id="Upload" class="tabcontent">
  <h3 style="color:#B70000; padding-left:100px">Upload File</h3><div style="padding-left:750px; color:#00A3F0"><a href="dashboard.php?dwnld=1">Download Sample file</a></div>
  <form name="form1" id="form1" enctype="multipart/form-data" method="post" action="" onSubmit="return check_file();">
  <?php if($_GET['succ']==1)
  {
  ?>
  <div style="color:#B70000; padding-left:350px">Uploaded Successfully.</div>
  <?php } ?>
  <div id="error_form1" style="color:#B70000;padding-left:100px"></div>
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
  <h3 style="color:#B70000; padding-left:100px">Upload File</h3><div style="padding-left:750px; color:#00A3F0"><a href="dashboard.php?dwnld=1">Download Sample file</a></div>
  <form name="form2" id="form2" enctype="multipart/form-data" method="post" action="" onSubmit="return check_files();">
  <?php if($_GET['school_succ']==1)
  {
  ?>
  <div style="color:#B70000; padding-left:350px">Uploaded Successfully.</div>
  <?php } ?>
  <div id="error_form2" style="color:#B70000;padding-left:100px"></div>
  <table border="0" width="100%" align="center">
  <tr>
  <td width="35%"><div align="right">Select School Name</div></td>
  <td width="4%"><strong>:</strong></td>
  <td width="61%">
  <?php $sel=executework("select * from sample_govt_officials group by school_name");
  ?>
  <select name="school_name" id="school_name">
  <option value="">Select</option>
  <?php while($row=@mysql_fetch_array($sel)) { ?>
  <option value="<?php echo $row['id']; ?> "><?php echo $row['school_name']; ?></option>
  <?php } ?>
  </select>
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
<?php */?>
<div id="approve_stock" class="tabcontent">
  <h3 style="color:#950255; padding-left:100px">Approve Quotations</h3>
  <?php if($_GET['astatus']=='1')
  {?>
  <div style="color:#950255;" align="center">Approved Successfully.</div>
  <?php } ?><br>
<form name="form3" id="form3" action="" method="post" enctype="multipart/form-data">
 <?php 
  $sel_get=executework("select * from sample_reg where id='".$_SESSION['sample_id']."'");
  $rsel_get=@mysql_fetch_array($sel_get);
  
  $sel=executework("select * from approvestock_det where state='".$rsel_get['state']."' and district='".$rsel_get['district']."' order by id desc");
  
  $cnt=@mysql_num_rows($sel);
  if($cnt>0)
  {
  ?>
  <table border="1" cellpadding="2" cellspacing="2" width="70%" align="center">
  <tr style="background-color:#CCCCCC">
  <td width="15%" align="center">S.No</td>
  <td width="15%" align="center">School Name</td>
  <td width="22%" align="center">Number Of Units</td>
  <td width="17%" align="center">Approved Price</td>
  <td width="31%" align="center"></td>
  </tr>
  <?php 
  	$i=1;
  	
 	 while($row=@mysql_fetch_array($sel))
	  {
	$sel_stock=executework("select * from approvestock_det where id='".$row['stock_id']."'");
	$row_stock=@mysql_fetch_array($sel_stock);  
	$get_sname=executework("select * from sample_reg where id='".$row['user_id']."'");
	$row_sname=@mysql_fetch_array($get_sname);
  ?>
  <tr>
  <td align="center"><?php echo $i; ?></td>
  <td align="center"><?php echo $row_sname['name'];?></td>
  <td align="center"><?php echo $row['num_units']; ?></td>
  <?php if($row['status']=='3') { ?>
  <td align="center"><?php echo $row['price'];?></td>
  <?php } else {?>
  <td>&nbsp;</td>
  <?php } ?>
  <td align="center"><a href="#" class="form_field" style="color:#FF0000" onClick="MM_openBrWindow('view_det.php?id=<?php echo $row['id'] ?>','Details','width=500,height=500')">View Details</a></td>
  </tr>
  <?php $i++;
  }?>
  </table> 
  <?php } else {?>
  <div align="center" style="color:#950255">No Records Found.</div>
  <?php } ?>
</form>
</div>

<div id="request_stock" class="tabcontent">
<h3 style="color:#950255; padding-left:100px">Stock that has been requested from the schools in your District</h3><br><br>
  <?php if($_GET['rstatus']=='1')
  {?>
  <div style="color:#950255;" align="center">Quote Request has been sent to Manufacturing Companies</div><br><br>
  <?php } ?><br>
<form name="form4" id="form4" action="" method="post" enctype="multipart/form-data">
	<?php /*?><table align="center" width="100%" border="0">
	<?php $sel_state=executework("select * from location where precatid='101'"); ?>
	<tr>
  <td width="35%"><div align="right">Select State</div></td>
  <td width="4%"><div align="center"><strong>:</strong></div></td>
  <td width="61%"><select id="state" name="state" onChange="form4.submit();">
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
	<option value="<?php echo $row1[id]; ?>" <?php if($_POST['dist']==$row1['id']) { ?> selected="selected" <?php } ?>><?php echo $row1['name']; ?></option>
	<?php } ?>
  </select>
  </td>
  </tr>
  <tr>
  <td colspan="3" style="padding-left:350px;"><input type="submit" name="form_submit" id="frm_submit" value="Submit"></td>
  </tr>
	</table>
	
 <?php 
if( isset($_POST['form_submit']) && $_POST['form_submit']=='Submit' )
{
	$con=" where state='".$_POST['state']."' and district='".$_POST['dist']."'";
}<?php */?><?php 
  $sel_det=executework("select * from sample_reg where id='".$_SESSION['sample_id']."'");
  $rsel=@mysql_fetch_array($sel_det);
  $sel=executework("select * from approvestock_det where state='".$rsel['state']."' and district='".$rsel['district']."' order by id desc ");
  $cnt=@mysql_num_rows($sel);
  if($cnt>0)
  {
  ?>
  <table border="1" cellpadding="4" cellspacing="2" width="80%" align="center">
  <tr style="background-color:#CCCCCC; line-height:30px">
  <td width="8%" align="center">S.No</td>
  <td width="12%" align="center">State</td>
  <td width="12%" align="center">District</td>
   <td width="16%" align="center">School Name</td>
  <td width="15%" align="center">NumberOf Units</td>
  <td width="9%">Request date</td>
  <td width="21%" align="center"></td>
  </tr>
  <?php 
  $i=1;
  while($row=@mysql_fetch_array($sel)) 
  {
  $date=date('d-M-Y h:i a',strtotime($row['date']));
  $scl=executework("select * from sample_reg where id='".$row['user_id']."'");
  $rscl=mysql_fetch_array($scl);
    $get_state=executework("select * from location where id='".$row['state']."'");
  $srow=@mysql_fetch_array($get_state);
  $get_dist=executework("select * from location where id='".$row['district']."'");
  $drow=@mysql_fetch_array($get_dist);

  ?>
      <tr>
      <td align="center"><?php echo $i; ?></td>
	  <td align="center"><?php echo $srow['name'];?></td>
	  <td align="center"><?php echo $drow['name'];?></td>
      <td align="center"><?php echo $rscl['name']; ?></td>
      <td align="center"><?php echo $row['num_units']; ?></td>
      <td><?php echo $date; ?></td>
     <?php if($row['status']=='1') {?>
      <td><a style="cursor:pointer; color:#0033FF; font-size:18px;" onClick="approved_quote(<?php echo $row['id']; ?>)">Send to Manufacturing Companies</a></td>
     <?php }  else { ?>
    <!-- <td><span style="color:#2D7B3F; font-size:20px"><?php echo "Quote Sent";?></span></td> --><td width="7%" align="center"><a href="#" class="form_field" style="color:#FF0000" onClick="MM_openBrWindow('view_det.php?id=<?php echo $row['id'] ?>','Details','width=500,height=500')">View Details</a></td>
    <?php } ?>
      </tr>
  <?php $i++;
  }?>
  </table> 
  <?php } 
  else { ?>
  	<div align="center" style="color:#950255">No Records found.</div>
  <?php }
  ?>
  </form>
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
	 if(!empty($_GET['school_succ']))
	 {
	 ?><script>
	document.getElementById("modify").click();
	 </script>
	 
	 <?php } if(!empty($_GET['succ']))
	 {
	 ?><script>
	 document.getElementById("defaultOpen").click();
	 </script>
	 <?php } ?>
	 <?php }else { 
	session_destroy();
	echo "<script>window.location.href='index.php';</script>";
	 }
	 if(!empty($_GET['rstatus']))
	 {
	 ?>
	 <script>
	 document.getElementById("defaultOpen").click();
	 </script>
	 <?php }
	 if( isset($_POST['form_submit']) && $_POST['form_submit']=='Submit' )
	{
	  ?>
	 <script>
	 document.getElementById("defaultOpen").click();
	 </script>
	 <?php } 
	 if(!empty($_POST['state']))
	 {
	 ?>
	  <script>
	 document.getElementById("defaultOpen").click();
	 </script>
	 <?php } ?>
	 
</body>
</html> 

<div class="clearfix"></div>
<br>
<br>
