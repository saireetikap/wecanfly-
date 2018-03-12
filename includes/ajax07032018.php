<?php
include "include.php";
include "functions.php";
if((!empty($_POST['vusername'])))
{
	$sel=executework("select * from sample_reg where username='".$_POST['vusername']."' and type='1'");
	$row=@mysql_num_rows($sel);
	if($row>0)
	{
	echo "~1";
	}
}
if((!empty($_POST['gusername'])))
{
	$sel=executework("select * from sample_reg where username='".$_POST['gusername']."' and type='2'");
	$row=@mysql_num_rows($sel);
	if($row>0)
	{
	echo "~1";
	}
}
if((!empty($_POST['musername'])))
{
	$sel=executework("select * from sample_reg where username='".$_POST['musername']."' and type='3'");
	$row=@mysql_num_rows($sel);
	if($row>0)
	{
	echo "~1";
	}
}

if((!empty($_POST['username'])))
{
	$sel=executework("select * from sample_reg where username='".$_POST['username']."' and type='4'");
	$row=@mysql_num_rows($sel);
	if($row>0)
	{
	echo "~1";
	}
}

if(!empty($_POST['story_name']))
{
 $sel=executework("select * from sample_govt_officials where( city Like ('".$_POST['story_name']."') or city Like ('%".$_POST['story_name']."') or city Like ('".$_POST['story_name']."%') or city Like ('%".$_POST['story_name']."%') ) group by city");
// echo ("select * from sample_govt_officials where( city Like ('".$_POST['story_name']."') or city Like ('%".$_POST['story_name']."') or city Like ('".$_POST['story_name']."%') or city Like ('%".$_POST['story_name']."%') )");
 $data="";
 if(@mysql_num_rows($sel)>0)
 { 
 /* $data="~<ul>";  */
 $data="~<ul style='margin:0px; padding:0px'>";
   while($row=mysql_fetch_array($sel))
   {
    $data.="<li id=$row[id] onclick=update_sid('".$row[id]."'); >$row[city]</li>";
	/*$data.="<option id=$row[id] onclick=update_sid('".$row[id]."'); >$row[title]</option>";*/
   }
   $data.="</ul>";
 }
 else 
 {
   $data="~";
 } 
 echo $data;
}

if( (!empty($_POST['approve_id'])) && (!empty($_POST['govt_id'])) )
{
	$sel=executework("select * from approvestock_det where id='".$_POST['approve_id']."' and status='1'");
	$cnt=@mysql_num_rows($sel);
	if($cnt>0)
	{
	$updt=executework("update approvestock_det set status='2',govt_id='".$_POST['govt_id']."',quote_date='".date('Y-m-d H:i:s')."'  where id='".$_POST['approve_id']."' and status='1'");
	echo "~1";
	}
	else
	{	
		echo "~0";
	}
}

if(!empty($_POST['quote_id']))
{
	$sel=executework("select * from quote_price where id='".$_POST['quote_id']."'");
	$cnt=@mysql_num_rows($sel);
	$row=@mysql_fetch_array($sel);
	if($cnt>0)
	{
		$updt=executework("update quote_price set status='2' where id='".$_POST['quote_id']."'");
	}	
	$sel1=executework("select * from approvestock_det where id='".$row['stock_id']."'");
	$cnt1=@mysql_num_rows($sel1);
	if($cnt1>0)
	{
		$updt1=executework("update approvestock_det set status='3',manf_id='".$row['manf_id']."',price='".$row['price']."',quote_id='".$_POST['quote_id']."',approve_date='".date('Y-m-d H:i:s')."' where id='".$row['stock_id']."'");
	}
	echo "~1";
}

if(!empty($_POST['confirm_quote']))
{
	$sel=executework("select * from approvestock_det where id='".$_POST['confirm_quote']."' ");
	$cnt=@mysql_num_rows($sel);
	if($cnt>0)
	{
		$updt=executework("update approvestock_det set status='4' where id='".$_POST['confirm_quote']."'");
		echo "~1";
	}
}
?>

