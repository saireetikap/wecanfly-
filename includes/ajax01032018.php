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



?>

