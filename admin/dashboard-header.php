<?php
	/*session_start();
	if(!isset($_SESSION["user"])){
			header('location:../admin pages/login.php');
	}*/

	isset($_GET["error"]) ? $error = $_GET["error"] : $error = false;

	isset($_GET["status"])&&$_GET["status"]=="ok" ? $status = true : $status = false;
					
	//include_once("../parameters.php");
	$currentPage = basename($_SERVER['SCRIPT_NAME']);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Business After Harvey</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/bootstrap-notify.min.js"></script>
		<script src="../js/notification.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/fa/css/all.css">
		<link rel="stylesheet" type="text/css" href="../css/animate.css">
		<script src="../js/ckeditor/ckeditor.js"></script>
		

		
		<style type="text/css">
			.font-weight-bold{
				font-weight: bold;
			}
			
			.container{
				position: relative;
			}
			.navbar-default{
				background: #0079BE !important;
				margin-bottom: 0;

			}
			.navbar-default a{
				color: white !important;
			}
			.table-hover tr:hover{
				background: #C72328 !important;
				color: white;
			}
			.active a{
				background: #C72328 !important;
			}
			.navbar-nav a:hover{
				background-color:#C72328 !important;
				color: #fff;
				transition: all .3s;
			}
		</style>
</head>
</head>
<body>
<nav class="navbar navbar-default">
	<div class="navbar-header">
		<a href="index" class="navbar-brand">Dashboard</a>
		<button class="navbar-toggle navigation-bar burger-button" data-toggle="collapse" data-target="#navigation-bar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span> 
		</button>
	</div>
	
	<div id="navigation-bar" class="collapse navbar-collapse">
	
		<ul class="nav navbar-nav pages-list font-weight-bold">
				
								
			<li <?php if($currentPage==="events.php")echo 'class=active';?>>
				<a href="events">EVENTS</a>
			</li>
								
			<li <?php if($currentPage==="albuns.php")echo 'class=active';?>>
				<a href="albuns">GALLERY</a>
			</li>
			
			
			<li <?php if($currentPage==="about.php")echo 'class=active';?>>
				<a href="about">ABOUT</a>
			</li>
		</ul>
	
	</div>

		
		
</nav>

