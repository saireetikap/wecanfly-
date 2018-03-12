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
 $data="~<ul style='margin-bottom:0px'>";
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



?>

