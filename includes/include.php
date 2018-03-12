<?php
date_default_timezone_set('Asia/Calcutta');
function executework($srt)
{
	
	$db = mysql_connect("localhost:3306", "wecanfly_sample", "7#xwhB)ayrui") or die(mysql_error()); 
	mysql_select_db("wecanfly_sample",$db);
	return mysql_query($srt,$db);
}
function executeupdate($srt)
{
	$db = mysql_connect("localhost:3306", "wecanfly_sample", "7#xwhB)ayrui");
	mysql_select_db("wecanfly_sample",$db);
}
function formattodb($swe)
{
	$day1=substr($swe,0,2);
	$month1=substr($swe,3,2);
	$year1=substr($swe,6,4);
	$newyear=$year1."-".$month1."-".$day1;
	return $newyear;
}
function formatfromdb($swe)
{
	$day1=substr($swe,8,2);
	$month1=substr($swe,5,2);
	$year1=substr($swe,0,4);
	$newyear=$month1."/".$day1."/".$year1;
	return $newyear;
}
function redirect($url) { 

if(headers_sent()) { 

?> 
<html><head> 
<script language="javascript" type="text/javascript"> 
<!-- 
window.parent.document.location='<?php print($url);?>'; 
//--> 
</script> 
</head></html> 
<? 
exit; 

} else { 

header("Location: ".$url); 
exit; 

} 

} 
?>
