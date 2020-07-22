<?php
	$currentPage = basename($_SERVER['SCRIPT_NAME']);
	


	
?>
<!DOCTYPE html>
<html lang="en-us">
	<head>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="icon"  href="img/logo 1.jpg">
		<link rel="image_src" href="img/logo 1.jpg">

		<script src="js/jquery.min.js" ></script>
		<script src="js/bootstrap.min.js" ></script>
		<script src="js/events-events.js"></script>
		<link rel="stylesheet" type="text/css" href="css/header.css">
		<link rel="stylesheet" type="text/css" href="css/fa/css/all.css">

		<meta name="robots" content="index">
		<meta name="author" content="Izaac Mendes">
		<meta name="description" content="website assigned to help market to rebuild itself after the Harvey Hurricane">
		<meta property="og:type"  content="website" />


		<?php 
			
			if(isset($_GET["id"])){
				

				$eventDAO = new EventDAO();
				$event = $eventDAO->listContentById($_GET["id"]); 
				$recentEvents = $eventDAO->recentEvents(); 
		?>

				<meta property="og:url"   content="https://business-after-harvey.000webhostapp.com/event?id=<?= $event->getId()?>" />
				<meta property="og:description" content="<?= $event->getDescription()?>" />
				<meta property="og:image" content="img/<?= $event->getPhoto()?>" />
				<meta property="og:title" content="<?= $event->getTitle()?>" />


<?php		}else{ ?>
				<meta property="og:title" content="Business After Harvey" />
				<meta property="og:url"   content="https://business-after-harvey.000webhostapp.com/" />
				<meta property="og:description" content="website assigned to help market to rebuild itself after the Harvey Hurricane" />
				<meta property="og:image" content="img/logo 1.jpg" />
				<title>Business After Harvey</title>
<?php		}  ?>
		
		


	</head>
	<body>
		<nav class="navbar navbar-default">
				<div class="navbar-header">
					<img src="img/logo 1.jpg" class="img-responsive logo">
			
					<button class="navbar-toggle navigation-bar burger-button" data-toggle="collapse" data-target="#navigation-bar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> 
					</button>
			
				</div>
				
				<div id="navigation-bar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav pages-list font-weight-bold">
						<li <?php if($currentPage==="index.php")echo 'class=active';?>>
							<a href="index">HOME</a>
						</li>
							
						<li <?php if($currentPage==="resources.php")echo 'class=active';?>>
							<a href="resources">RESOURCES</a>
						</li>
							
						<li <?php if($currentPage==="events.php")echo 'class=active';?>>
							<a href="events">EVENTS</a>
						</li>
						
						<li <?php if($currentPage==="gallery.php")echo 'class=active';?>>
							<a href="gallery" class="">GALLERY</a>
						</li>
						<li <?php if($currentPage==="about.php")echo 'class=active';?>>
							<a href="about">ABOUT</a>
						</li>
					</ul>
				</div>
		</nav>