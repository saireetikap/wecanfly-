<?php
ob_start();
session_start();
include_once "include.php";

function reg_volunteers()
{
	$ins=executework("insert into sample_reg(id,name,age,gender,city,username,password,type,type_name,reg_date)values('','".$_POST['name']."','".$_POST['age']."','".$_POST['gender']."','".$_POST['city']."','".$_POST['uname']."','".$_POST['psw']."','1','volunteers','".date('Y-m-d')."')");
	redirect("volunteers.php?succ=1");
}
function reg_govt_officials()
{
$ins=executework("insert into sample_reg(id,name,username,password,city,district,type,type_name,reg_date) values('','".$_POST['name']."','".$_POST['uname']."','".$_POST['psw']."','".$_POST['city']."','".$_POST['dist']."','2','govt Officials','".date('Y-m-d')."')");
redirect("govt_officials.php?succ=1");
}
function reg_manf_cmpny()
{
$ins=executework("insert into sample_reg(id,name,username,password,type,type_name,reg_date) values('','".$_POST['name']."','".$_POST['uname']."','".$_POST['psw']."','3','manufacturing companies','".date('Y-m-d')."')");
redirect("manf_cmpny.php?succ=1");

}
function reg_school_officials()
{
$ins=executework("insert into sample_reg(id,name,username,password,city,district,type,type_name,reg_date) values('','".$_POST['name']."','".$_POST['uname']."','".$_POST['psw']."','".$_POST['city']."','".$_POST['dist']."','4','school officials','".date('Y-m-d')."')");
redirect("school_officials.php?succ=1");

}
?>