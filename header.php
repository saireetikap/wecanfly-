<!DOCTYPE HTML>
<html>
<head>
<title>We can Fly!</title>
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

<a href="#0" class="cd-top">Top</a>
<!-- /back to top -->
<!-- js files -->
<!-- js files -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/grayscale.js"></script>
<script src='js/aos.js'></script>
<script src="js/index.js"></script>
<!-- js for back to top -->
<script src="js/top.js"></script>
<!-- /js for back to top -->
<!-- js for about lightbox -->
<script src="js/jQuery.lightninBox.js"></script>
<script type="text/javascript">
	$(".lightninBox").lightninBox();
</script>
<!-- /js for about lightbox -->
<!-- js for gallery -->
<script src="js/jquery.picEyes.js"></script>
<script>
$(function(){
	//picturesEyes($('li'));
	$('ul.demo li').picEyes();
});
</script>
<!-- /js for gallery -->
<!-- js for banner -->
<script src="js/jquery.vide.js"></script>
<!-- /js for banner -->
<!-- /js files -->
</body>
</html>