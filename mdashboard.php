<?php 
/*ob_start();
session_start();
*/include "includes/include.php";
include "includes/functions.php";
include "header.php";
if(!empty($_SESSION['sample_id']) && $_SESSION['sample_type']=='3')
{?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Manufacturing Companies</title>
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
    width: 20%;
    background-color:#930000;
    color: white;
   padding: 8px 10px;
     margin: 4px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
/*input[type=text],input[type=password], select {
    width: 25%;
    padding: 8px 10px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
*/
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
function valid_check()
{
	 if(document.form1.num_units.value=="")
		{
			 $("#form1 #error_form1").html("Please Enter NUmber Units Required");
			 $("#form1 #num_units").focus();
			 return false;
		}
		 else if(document.form1.quote.value=="")
		{	
			 $("#form1 #error_form1").html("Please Enter Quote Price");
			 $("#form1 #quote").focus();
			 return false;
		}
}
</script>
</head>
<body>
<?php 
if(!empty($_POST['submit']))
{
	rise_price();
}
?>
<br /><br />
<div class="tab">
  <button class="tablinks" onClick="openCity(event, 'Required_stock')" id="defaultOpen">Required Stock</button>
  <button class="tablinks" onClick="openCity(event, 'Approved_stock')" id="modify">Approved Stock</button>
    <button class="tablinks" onClick="window.location.href='logout.php'">Logout</button>
</div>
<div id="Required_stock" class="tabcontent">
  <h3 style="color:#950255; padding-left:100px">Required Stock Details</h3><br><br>
  <form name="form1" id="form1" enctype="multipart/form-data" method="post" action="" onSubmit="return valid_check();">
  <?php 
  if($_GET['succ']==1)
  {?>
  <div style="color:#950255; padding-left:320px">Submitted Successfully.</div>
  <?php } ?>
  <div id="error_form1" style="color:#950255;padding-left:100px"></div>
  <?php 
  $sell=executework("SELECT * FROM `approvestock_det` WHERE `status`='2' order by id desc ");
  //echo ("SELECT * FROM `approvestock_det` WHERE `status`='2' or status='3' or status='4' ");
  $cnt=@mysql_num_rows($sell);
  if($cnt>0)
  {
  ?>
  <table border="1" align="center" cellpadding="4" cellspacing="4" width="75%">
  <tr style="background-color:#CCCCCC">
  <td align="center">S.No</td>
  <td align="center">Date</td>
  <td align="center">State</td>
  <td align="center">District</td>
  <td align="center">School Name</td>
  <td align="center">Number Of Units</td>
  <td align="center">Price</td>
  </tr>
  <?php 
  $i=1; 
  $x=0;
  while($row=@mysql_fetch_array($sell))
  { 
	 $get_state=executework("select * from location where id='".$row['state']."'");
 	$srow1=@mysql_fetch_array($get_state);
  $get_dist=executework("select * from location where id='".$row['district']."'");
  $drow=@mysql_fetch_array($get_dist);
	$sel_price=executework("select * from quote_price where stock_id='".$row['id']."' and manf_id='".$_SESSION['sample_id']."' and status='1' ");
	$get_sname=executework("select * from sample_reg where id='".$row['user_id']."'");
	$srow=@mysql_fetch_array($get_sname);
	if(@mysql_fetch_array($sel_price)==0)
	{ 
	$x=1;
	//echo ("select * from quote_price where stock_id='".$row['id']."'");
	$row_price=@mysql_fetch_array($sel_price);
	$date=date('d-M-Y h:i a',strtotime($row['quote_date'])); ?>
  <tr>
  <td align="center"><?php echo $i; ?></td>
   <td align="center"><?php echo $date; ?></td>
   <td align="center"><?php echo $srow1['name'];?></td>
	  <td align="center"><?php echo $drow['name'];?></td>
  <td align="center"><?php echo $srow['name']; ?></td>
  <td align="center"><?php echo $row['num_units']; ?></td>
  <?php if(!empty($row_price['price']))
	  { ?>
  		 <td align="center"><?php echo $row_price['price']; ?></td>
  <?php }
   else {?>
  <td align="center" height="35px"><input type="text" name="price<?php echo $i; ?>" id="price<?php echo $i; ?>" value="" /></td><?php } ?>
   <?php if(empty($row_price['price'])) { ?>
  <input type="hidden" name="sub<?php echo $i; ?>" value="<?php echo $row['id']; ?>" id="sub"><?php } ?>
  </tr>
  <?php  
   $i++;
   }?>
   <input type="hidden" name="ival" id="ival" value="<?php echo $i-1; ?>">
  <?php 
 
  } if($x==1) { ?>
  
      <td colspan="7" align="center"><input type="submit" id="submit" name="submit" value="Submit"></td><?php } ?>
  </table>
  <?php } else { ?>
  <div align="center" style="color:#950255">No Records Found.</div>
  <?php } ?>
  <br>
  <br>
    <h3 style="color:#950255; padding-left:100px">Quotations Waiting for Approval</h3><br><br>
  <?php 
  $get=executework("select * from approvestock_det WHERE `status`='2' order by id desc");
  $cnt11=@mysql_num_rows($get);
  if($cnt11>0)
  {
  ?>
  <table border="1" width="75%" cellpadding="4" cellspacing="4" align="center">
  <tr style="background-color:#CCCCCC">
  <td align="center">S.No</td>
    <td width="28%" align="center">State</td>
    <td width="28%"  align="center">District</td>

  <td align="center">Number Of Units</td>
    <td align="center">School Name</td>
  <td align="center">Quote Date</td>
  <td align="center">Price</td>
  <td align="center">Date Quoted</td>
  </tr>
  <?php
  $i=1;
   while($row=@mysql_fetch_array($get))
  {
   $get_state=executework("select * from location where id='".$row['state']."'");
	// echo ("select * from location where id='".$row['state']."'");
 	$srow1=@mysql_fetch_array($get_state);
  $get_dist=executework("select * from location where id='".$row['district']."'");
  $drow=@mysql_fetch_array($get_dist);
  $date=date('d-M-Y h:i a',strtotime($row['quote_date']));
  	$sel_price=executework("select * from quote_price where stock_id='".$row['id']."' and manf_id='".$_SESSION['sample_id']."' and status='1' ");
	$prow=@mysql_fetch_array($sel_price);
	  $date1=date('d-M-Y h:i a',strtotime($prow['date']));
	 	$get_sname=executework("select * from sample_reg where id='".$row['user_id']."'");
	$srow=@mysql_fetch_array($get_sname);
 if($prow['status']=='1')
{
   ?>
  <tr>
  <td align="center"><?php echo $i;?></td>
     <td align="center"><?php echo $srow1['name'];?></td>
	  <td align="center"><?php echo $drow['name'];?></td>

  <td align="center"><?php echo $row['num_units']; ?></td>
    <td align="center"><?php echo $srow['name']; ?></td>
    <td align="center"><?php echo $date; ?></td>
	  <td align="center"><?php echo $prow['price']; ?></td>
  <td align="center"><?php echo $date1; ?></td>

  </tr>
  <?php } ?>
  <?php $i++; }?>
  </table>
  <?php } ?>
  </form>
</div>

<div id="Approved_stock" class="tabcontent">
  <h3 style="color:#950255; padding-left:100px">Approved Stock</h3><br><br>
  <form name="form2" id="form2" enctype="multipart/form-data" method="post" action="">
  <?php 
  $sel=executework("select * from approvestock_det where (status='3' or status='4') and manf_id='".$_SESSION['sample_id']."' order by id desc");
  ?>
  <table border="1" cellpadding="2" cellspacing="2" width="80%" align="center">
  <tr style="background-color:#CCCCCC">
  <td width="5%" align="center">S.No</td>
      <td width="28%"  align="center">State</td>
    <td  width="28%"  align="center">District</td>

  <td width="10%" align="center">No. of Units</td>
  <td width="28%" align="center">Quote Price</td>
  <td width="30%" align="center">Date</td>

  </tr>
  <?php 
  $i=1;
  while($row=@mysql_fetch_array($sel)) {
 $date1=date('d-M-Y h:i a',strtotime($row['approve_date']));
 
   	$sel1=executework("select * from  quote_price where id='".$row['quote_id']."' order by id desc");
 	 $row1=@mysql_fetch_array($sel1);
   	$get_state=executework("select * from location where id='".$row['state']."'");
 	$srow1=@mysql_fetch_array($get_state);
  $get_dist=executework("select * from location where id='".$row['district']."'");
  $drow=@mysql_fetch_array($get_dist);
  ?>
  <tr>
  <td align="center"><?php echo $i; ?></td>
       <td align="center"><?php echo $srow1['name'];?></td>
	  <td align="center"><?php echo $drow['name'];?></td>
	  <td align="center"><?php echo $row['num_units']; ?></td>
	  <td align="center"><?php echo $row1['price'];?></td>
	   <td align="center"><?php echo $date1;?></td>
  <td align="center"><?php if($row['status']=='4') {  echo "Approved"; }  ?></td>
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
	document.getElementById("defaultOpen").click();
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
