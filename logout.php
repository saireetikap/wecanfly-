<?php
ob_start();
session_start();
	include("includes/functions.php");
	session_destroy();
	echo "<script>window.location.href='index.php';</script>";
?>