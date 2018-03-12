<?php
ob_start();
session_start();
include_once "include.php";
// Login Conformation
function login_conf()
{
$sel=executework("select * from sample_reg where username='".$_POST['uname']."' and psw='".md5($_POST['psw'])."' and type='".$_POST['type']."'");
	$cnt=@mysql_num_rows($sel);
	if($cnt>0)
	{
		$row=@mysql_fetch_array($sel);
				$_SESSION['sample_user']=$_POST['uname'];
				$_SESSION['session_user']=session_id();
				$_SESSION['sample_name']=$row['name'];
				$_SESSION['sample_id']=$row['id'];
				$_SESSION['sample_type']=$_POST['type'];
				$_SESSION['sample_type_name']=$row['type_name'];
		if($_POST['type']==1)
		{
			redirect("vdashboard.php");
		}
		else if($_POST['type']==2) {
		redirect("dashboard.php");
		}
	}
	else
	{
		redirect("login.php?fail=1");
	}
}
// Registration 
function reg_volunteers()
{
	$ins=executework("insert into sample_reg(id,name,age,gender,city,username,password,psw,type,type_name,reg_date,status)values('','".$_POST['name']."','".$_POST['age']."','".$_POST['gender']."','".$_POST['city']."','".$_POST['uname']."','".$_POST['psw']."','".md5($_POST['psw'])."','1','volunteers','".date('Y-m-d H:i:s','0')."','0')");
	$ins_id=@mysql_insert_id();
	//echo $ins_id;
	$cnt=count($ins_id);
	if($cnt>0)
	{
		redirect("volunteers.php?succ=1");
	}
	else
	{
		redirect("volunteers.php?fail=1");
	}
}
function reg_govt_officials()
{
$ins=executework("insert into sample_reg(id,name,username,password,psw,city,district,type,type_name,reg_date,status) values('','".$_POST['name']."','".$_POST['uname']."','".$_POST['psw']."','".md5($_POST['psw'])."','".$_POST['city']."','".$_POST['dist']."','2','govt Officials','".date('Y-m-d H:i:s')."','0')");
$ins_id=@mysql_insert_id();
	//echo $ins_id;
	$cnt=count($ins_id);
	if($cnt>0)
	{
		redirect("govt_officials.php?succ=1");
	}
	else
	{
		redirect("govt_officials.php?fail=1");
	}
}
function reg_manf_cmpny()
{
$ins=executework("insert into sample_reg(id,name,username,password,psw,type,type_name,reg_date,status) values('','".$_POST['name']."','".$_POST['uname']."','".$_POST['psw']."','".md5($_POST['psw'])."','3','manufacturing companies','".date('Y-m-d H:i:s')."','0')");
$ins_id=@mysql_insert_id();
	//echo $ins_id;
	$cnt=count($ins_id);
	if($cnt>0)
	{
		redirect("manf_cmpny.php?succ=1");
	}
	else
	{
		redirect("manf_cmpny.php?fail=1");
	}
}
function reg_school_officials()
{
$ins=executework("insert into sample_reg(id,name,username,password,psw,city,district,type,type_name,reg_date,status) values('','".$_POST['name']."','".$_POST['uname']."','".$_POST['psw']."','".md5($_POST['psw'])."','".$_POST['city']."','".$_POST['dist']."','4','school officials','".date('Y-m-d H:i:s')."','0')");
redirect("school_officials.php?succ=1");
$ins_id=@mysql_insert_id();
	//echo $ins_id;
	$cnt=count($ins_id);
	if($cnt>0)
	{
		redirect("school_officials.php?succ=1");
	}
	else
	{
		redirect("school_officials.php?fail=1");
	}

}
// upload file
function upload_govtofficials()
{
	if(($_FILES['file']['name'])!="")
		{
				$target_path="upload_files/";
				$nam1=basename($_FILES['file']['name']);
				$len1=strlen($nam1);
				$pos1=strrpos($nam1,'.');
				$sub1=substr($nam1,$pos1,$len1);
				$mapimg1=$nam1;
				 $target_pathsm1=$target_path.$mapimg1;
				  if(file_exists($target_pathsm1))
				 {
					 unlink($target_pathsm1);
				 }
				 move_uploaded_file($_FILES['file']['tmp_name'],$target_pathsm1);
				 	$i=0;	
	$file = fopen("upload_files/".$mapimg1,"r");
$i=0;
if($file !== FALSE) {
$ins=executework("insert into sample_userdet(id,user_id,createdon,status)values('','".$_SESSION['sample_id']."','".date('Y-m-d H:i:s')."','1')");
			$ins_id=@mysql_insert_id();
 while(! feof($file)) {
  $col = fgetcsv($file, '', ",");
  $lines[]=$col;
	if($col[0]!="")
	{
		if($i >0)
		{
		if($col[1]!="")
		{
			$col[1]=$col[1];
		}
		else
		{
			$col[1]=0;
		}
			
			$ins=executework("insert into sample_govt_officials(id,userdet_id,student_name,age,gender,school_name,city,district,state,address,aadhar) values('','".$ins_id."','".$col[0]."','".$col[1]."','".$col[2]."','".$col[3]."','".$col[4]."','".$col[5]."','".$col[6]."','".$col[7]."','".$col[8]."')");
	}

   }

	$i++;

}

}



fclose($file);

	header("location:dashboard.php?succ=1");

}	
}
function upload_school_details()
{
		if(!empty($_POST['school_name']))
		{
				if(($_FILES['file']['name'])!="")
				{
						$target_path="upload_files/";
						$nam1=basename($_FILES['file']['name']);
						$len1=strlen($nam1);
						$pos1=strrpos($nam1,'.');
						$sub1=substr($nam1,$pos1,$len1);
						$mapimg1=$nam1;
						 $target_pathsm1=$target_path.$mapimg1;
						  if(file_exists($target_pathsm1))
						 {
							 unlink($target_pathsm1);
						 }
						 move_uploaded_file($_FILES['file']['tmp_name'],$target_pathsm1);
							$i=0;	
			$file = fopen("upload_files/".$mapimg1,"r");
		$i=0;
		if($file !== FALSE) {
		$ins=executework("insert into sample_userdet(id,user_id,createdon,status)values('','".$_SESSION['sample_id']."','".date('Y-m-d H:i:s')."','1')");
					$ins_id=@mysql_insert_id();
		 while(! feof($file)) {
		  $col = fgetcsv($file, '', ",");
		  $lines[]=$col;
			if($col[0]!="")
			{
				if($i >0)
				{
				if($col[1]!="")
				{
					$col[1]=$col[1];
				}
				else
				{
					$col[1]=0;
				}
					
					$ins=executework("insert into sample_govt_officials(id,userdet_id,student_name,age,gender,school_name,city,district,state,address,aadhar) values('','".$ins_id."','".$col[0]."','".$col[1]."','".$col[2]."','".$col[3]."','".$col[4]."','".$col[5]."','".$col[6]."','".$col[7]."','".$col[8]."')");
			}
		
		   }
		
			$i++;
		
		}
		
		}
				fclose($file);
				
					header("location:dashboard.php?school_succ=1");
				}	
		}
}
function volunteers_schedule()
{
	$date=$_POST['date'];
	$date1=date('Y-m-d', strtotime($date));
	$ins=executework("insert into volunteers_dashboard(id,user_id,city,school_name,date,createdon) values('','".$_SESSION['user_id']."','".$_POST['stitle_id']."','".$date."','".date('Y-m-d')."')");
	redirect("vdashboard.php?succ=1");
}
?>