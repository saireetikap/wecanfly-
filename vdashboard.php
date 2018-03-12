<?php 
ob_start();
session_start();
include "includes/include.php";
include "includes/functions.php";
//include "header.php";
if(!empty($_SESSION['sample_id']) && $_SESSION['sample_type']=='1')
{
?>
<!DOCTYPE HTML>
<html>
<head>
<title>We can fly</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Cruise Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- fonts -->
<link href="//fonts.googleapis.com/css?family=Cinzel:400,700,900" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<!-- /fonts -->
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/gallery.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/jQuery.lightninBox.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/aos.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- /css -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

--><!-- js -->
<script src="js/modernizr.min.js"></script>
<!-- /js -->
<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #035395;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: #fff;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
	border-bottom:1px solid #ccc;
	font-size:12px;
}

.dropdown-content a:hover {background-color: #f1f1f1;
color:#000}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
.popover{
width:500px;

}

</style>
</head>
<body>

<!-- navigation -->
<div class="navbar-wrapper" style="background:#fff;">
    <div class="container" >
		<nav class="navbar navbar-inverse navbar-static-top" data-spy="affix" data-offset-top="0">
			<div class="container">
			<span style="padding-left:20px"><img style="width:15%;" src="images/logo2.png" ></span>
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div id="navbar" class="navbar-collapse collapse" style="float:right;">
					<ul class="nav navbar-nav cl-effect-7">
						<!--<li class="active">
                        	<a style="font-size:20px; padding:10px 30px; border:1px solid #9999; color:#fff; border-radius:0px; margin-right:20px; margin-top:10px; width:150px;" href="contact.html" class="btn btn-outline btn-lg" >Register</a></li>-->
						<?php 
  if($_SESSION['sample_id']=="") {
  ?>
				
						<li><a style="font-size:15px; background-color:#950255;  border:1px solid #9999; color:#fff; border-radius:0px; margin-right:60px;margin-top:10px;width:100px;" href="login.php" class="btn btn-outline btn-lg" ><font color="#fff">Login</font></a></li>
						<?php } else { ?>
												<li><a style="font-size:15px; background-color:#950255;  border:1px solid #9999; color:#fff; border-radius:0px; margin-right:60px;margin-top:10px;width:100px;" href="logout.php" class="btn btn-outline btn-lg" ><font color="#fff">Logout</font></a></li>
<?php } ?>
						
					</ul>
				</div>
			</div>
        </nav>
	</div>
</div><br><br><br><br>
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
    width: 25%;
    padding: 8px 10px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
.storylist
{
   background-color: #ffffff;
    border: 1px solid #888888;
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
    color: hsl(0, 0%, 14%);
    font-family: "RobotoDraft","Roboto",sans-serif;
    font-size: 16px;
    font-weight: 400;
    height: auto;
    margin: 0;
    outline: 0 none;
    padding: 5px;
    text-align: left;
    width: 25%;
    z-index: 9999;
}
ul 
{
 list-style:none;
}
.small-sidebar {
    width: 28%;
}
.right-sidebar {
border:none;
padding-top:100px;
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
    width: 25%;
    padding: 8px 10px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
  function get_story_names(name)
  { //
	 if( (name!="") && (name!=" ") )
 	 {
		 datastring="story_name="+name;
		 $.ajax({
	 	            type: "POST",
					url: "includes/ajax.php",
					data: datastring,
					cache: false,
					success: function(html)
					{ 
						//alert(html);
						$("#storylist").show();
						con=html.split('~');
						$("#storylist").html(con[1]);
						return false;
					}
				 });
		}
		else 
		{
			 $("#storylist").html('');
			 $("#storylist").css("display", "None");
		 }
	}
	function update_sid(id)
{
	 $("#stitle_id").val(id);
	 var title=$("#"+id).html();
	 $("#sc_title").val(title);
	 $("#storylist").css("display", "none");
	$("#form1").submit();
	 //alert("Submit");
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.min.css" />
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>

$(function() {
var date=new Date();
        $( "#date").datepicker({
            dateFormat : 'd-mm-yy',
            changeMonth : true,
            changeYear : true,
            yearRange: '-100:+22',
			minDate: '0'
//            maxDate: '-1d'
        });
    });
function valid_check()
{
	var gen=$("select[name=school_name]").val();
	if(($("#form1 #sc_title").val()==""))
	{
		 $("#form1 #error_form1").html("Please Select City");
		 $("#form1 #sc_title").focus();
	  	 return false;
	}
	else if(gen=="")
	{
		 $("#form1 #error_form1").html("Please Select Type");
		 $("#form1 #type").focus();
	  	 return false;
	}
	else if(($("#form1 #date").val()==""))
	{
		 
		 $("#form1 #error_form1").html("Please Enter Date");
		 $("#form1 #date").focus();
	  	 return false;
	}
	
}
</script>
</head>
<body>
<?php 
if(!empty($_POST['form_submit']))
{
	volunteers_schedule();
}
?>
<br /><br />
<div class="tab">
  <button class="tablinks" onClick="openCity(event, 'Schedule')" id="defaultOpen">Schedule</button>
  <button class="tablinks" onClick="openCity(event, 'Browse')" id="browse_data">Browse</button>
    <button class="tablinks" onClick="openCity(event, 'View')">View</button>
    <button class="tablinks" onClick="window.location.href='logout.php'">Logout</button>
</div>
<div id="Schedule" class="tabcontent">
  <h3 style="color:#950255; padding-left:100px">Schedule</h3>
  <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">
  <div id="error_form1" style="color:#FF0000" align="center"></div>
  <?php 
  if($_GET['succ']==1)
  	{?>
	<div  style="color:#950255; padding-left:350px">Submitted Successfully.</div>
	<?php } ?>
  <table border="0" align="center" width="100%">
  <tr>
  <td> <div align="right">City</div></td>
  <td><strong>:</strong></td>
  <td>
  <input type="text" name="sc_title" id="sc_title" autocomplete="off" onKeyUp="get_story_names(this.value);" value="<?php echo $_POST['sc_title'];?>" style="margin-bottom:0px" placeholder="City" >
               </td></tr>
			   <tr>
			   <td colspan="2">&nbsp;</td>
			   <td> <div id="storylist" class="storylist" style="display:none" ></div>
                <input type="hidden" name="stitle_id" id="stitle_id" value="<?php echo $_POST['stitle_id']; ?>"></td>
			   </tr>
	<tr>
	<td><div align="right">School Name</div></td>
	<td><strong>:</strong></td>
	<?php $sel=executework("select * from sample_govt_officials where id='".$_POST['stitle_id']."'");
	?>
	<td><select name="school_name" id="school_name">
	<option value="">Select</option>
	<?php 
	while($row=@mysql_fetch_array($sel))
	{
	?>
	<option value="<?php echo $row['id']; ?>"><?php echo  $row['school_name'];?></option>
	<?php } ?>
	</select></td>
	</tr>
	<tr>
	<td><div align="right">Date
	  </div></td>
	<td><strong>:</strong></td>
	<td><input type="text" class="textarea" name="date" id="date" maxlength="50" value="<?php echo $_POST['date']; ?>" ></td>
	</tr>
	<tr>
	<td colspan="3" style="padding-left:350px"><input type="submit" name="form_submit" id="form_submit" value="Submit" onClick="return valid_check();"/></td>
	</tr>
  </table>
  
  </form>
</div>

<div id="Browse" class="tabcontent">
  <h3 style="color:#950255; padding-left:100px">Student Report</h3>

<form name="form3" id="form3" enctype="multipart/form-data" action="" method="post">

<table border="0" align="center" width="100%">

<tr>
<td width="39%"><div align="right">City</div></td>
<td width="4%"><div align="center"><strong>:</strong></div></td>
<td width="57%"><select name="city" id="city" onChange="form3.submit();">
	<option value="">Select</option>
	<?php $sel=executework("select * from sample_govt_officials group by city");
		while($row_city=@mysql_fetch_array($sel))
		{
	?>
	<option value="<?php echo $row_city['city'];?>" <?php if($_POST['city']==$row_city['city']) { ?> selected="selected" <?php } ?>><?php echo $row_city['city']?></option>
	<?php } ?>
</select></td>
</tr>
<tr>
<td><div align="right">School Name</div></td>
<td><div align="center"><strong>:</strong></div></td>
<td><select name="sname" id="sname">
	<option value="">Select</option>
	<?php $sel1=executework("select * from sample_govt_officials where city='".$_POST['city']."' group by school_name");
		while($row_sname=@mysql_fetch_array($sel1))
		{
	?>
	<option value="<?php echo $row_sname['school_name'];?>" <?php if($_POST['sname']==$row_sname['school_name']) { ?> selected="selected" <?php } ?>><?php echo $row_sname['school_name']?></option>
	<?php } ?>
</select></td>
</tr>

<tr>
<td colspan="3" style="padding-left:400px;"><input type="submit" name="form_submit1" id="form_submit1" value="Submit"></td>
</tr>
</table>

<?php 
if( isset($_POST['form_submit1']) && $_POST['form_submit1']=='Submit' )
{
	$con=" where city='".$_POST['city']."' and school_name='".$_POST['sname']."' and ( gender='Female' or  gender='F' or gender='f' or gender='female' )";
	//$con=" where city='".$_POST['city']."' and school_name='".$_POST['sname']."' and gender LIKE('%".'Female'."%')";
  $sel=executework("select * from sample_govt_officials ".$con." order by id desc ");
  $cnt=@mysql_num_rows($sel);
	if($cnt>0)
	{
?>
<table border="1" width="75%" align="center" cellpadding="4" cellspacing="4">
<tr style="background-color:#CCCCCC">
<td>S.No</td>
<td>Student Name</td>
<td>Age</td>
<td>School Name</td>
<td>Address</td>

</tr>
<?php 
$i=1;
while($row=@mysql_fetch_array($sel)) {
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $row['student_name'] ?></td>
<td><?php echo $row['age']; ?></td>
<td><?php echo $row['school_name'] ?></td>
<td><?php echo $row['address']?></td>
</tr>
<?php $i++;
} }?>
</table>
<?php } 
else {
echo "No Records Found";
}
 ?>
</form>
</div>

<div id="View" class="tabcontent">
  <h3 style="color:#950255; padding-left:100px">Schedule Report</h3>
  <br><br>
  <form name="form2" id="form2" enctype="text/plain" method="post" action="">
  <?php 
  $sel=executework("select * from volunteers_dashboard where user_id='".$_SESSION['sample_id']."'");
  $cnt=@mysql_num_rows($sel);
  if($cnt>0)
  {
  ?>
  <table border="1" cellpadding="2" cellspacing="2" width="70%" align="center">
  <tr style="background-color:#CCCCCC">
  <td width="19%" align="center">S.No</td>
  <td width="25%" align="center">City</td>
  <td width="28%" align="center">School Name</td>
  <td width="28%" align="center">Schedule Date</td>
  </tr>
  <?php 
  $i=1;
  while($row=@mysql_fetch_array($sel)) {
  $date=date('d/m/Y',strtotime($row['date']));
  $sel1=executework("select * from  sample_govt_officials where id='".$row['city']."' order by id desc");
  $row1=@mysql_fetch_array($sel1);
  $get=executework("select * from sample_govt_officials where school_name='".$row1['school_name']."' and ( gender='Female' or  gender='F' or gender='f' or gender='female' ) and city='".$row1['city']."' ");
  $count=@mysql_num_rows($get)
  ?>
  <tr>
  <td align="center"><?php echo $i; ?></td>
  <td align="center"><?php echo $row1['city']; ?></td>
  <td align="center"><?php echo $row1['school_name']."-".$count; ?></td>
  <td align="center"><?php echo $date; ?></td>
  </tr>
  <?php $i++;
  }?>
  </table>
  <?php } else {?>
  <div align="center" style="color:#0000AE">No Records Found.</div>
  <?php } ?>
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
if(!empty($_POST['city']))
{
?>
<script>
document.getElementById("browse_data").click();
</script>
 <?php } 
 if( isset($_POST['form_submit1']) && $_POST['form_submit1']=='Submit' ) { ?>
<script>
document.getElementById("browse_data").click();
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
 
</body>
</html> 
<div class="clearfix"></div>
<br>
<br>

