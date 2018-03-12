<?php 
ob_start();
session_start();
include_once "includes/include.php";
include_once "includes/functions.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Government Officials</title>
</head>
<style>
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
	var id='<?php echo $_GET['id']; ?>';
		$(".overlay").show();
	var datastring="quote_id="+approve_id;
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
					window.location.href="view_det.php?rstatus="+1+"&id="+id;
					$(".overlay").hide();
				}
			}
	});
}

</script>
<body>
<form name="form1" id="form1" enctype="multipart/form-data" action="" method="post">
<?php $sel=executework("select * from quote_price where stock_id='".$_GET['id']."'");
	  $row=@mysql_fetch_array($sel);
	  $sel_stock=executework("select * from approvestock_det where id='".$row['stock_id']."'");
	$row_stock=@mysql_fetch_array($sel_stock);  
	$get_sname=executework("select * from sample_reg where id='".$row_stock['user_id']."'");
	$row_sname=@mysql_fetch_array($get_sname);
?>
<table border="0" width="75%" align="center">
<tr><td align="center"><strong>School Name</strong></td>
<td><strong>:</strong></td>
<td><?php echo $row_sname['name'];?></td>
</tr>
</table>
<br /><br />
<?php 
if($_GET['rstatus']==1)
{
?>
<div align="center" style="color:#B70000">Quote Approved</div>
<?php } ?>

<?php $sel1=executework("select * from quote_price where stock_id='".$_GET['id']."'"); 
 ?>
<table border="1" width="75%" align="center" cellpadding="4" cellspacing="4">
<tr style="background-color:#CCCCCC">
<td width="14%" align="center">S.No</td>
<td width="35%" align="center">Manufacturing Company</td>
<td width="28%" align="center">Number of Units</td>
<td width="12%" align="center">Price</td>
<td width="11%"></td>
</tr>
<?php $i=1;
while($row1=@mysql_fetch_array($sel1)) {

	$get_sname1=executework("select * from sample_reg where id='".$row1['manf_id']."'");
	echo $row1['maf_id'];
	$row_sname1=@mysql_fetch_array($get_sname1);
	$get=executework("select * from approvestock_det where id='".$row1['stock_id']."'");
	//echo ("select * from approvestock_det where id='".$row1['stock_id']."'");
	$row_nunits=@mysql_fetch_array($get);
	//print_r($row_units);
	//echo $row1['status']."---";
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $row_sname1['name']; ?></td>
<td><?php echo $row_nunits['num_units']; ?></td>
<td><?php echo $row1['price']?></td>
<?php if($row_nunits['status']=='2') {?>
<td><a style="cursor:pointer" onclick="approved_quote(<?php echo $row1['id']; ?>)"><span style="color:#2312C0; font-size:18px; cursor:pointer"><?php echo "Approve"; ?></span></a></td>
<?php } else if($row_nunits['status']=='3')
 {
  ?>
<td><span style="color:#278B25; font-size:18px"> <?php if($row1['status']=='2'){ echo "Approved"; }?></span></td>
<?php } ?>
</tr>
<?php $i++; 
} ?>
</table>

</form>
</body>
</html>
