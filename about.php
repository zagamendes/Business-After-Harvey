<?php
	/*session_start();
	if(!isset($_SESSION["user"])){
			header('location:../admin pages/login.php');
	}*/

	
	include_once("header.php");
	include_once("classes/photo.php");
	include_once("classes/about.php");
	$contentAbout = AboutDAO::listContent();
	$photoDAO = new PhotoDAO();
	$photosAbout = $photoDAO->listContent("photos_about");
?>
	<link rel="stylesheet" type="text/css" href="css/about.css">

	<div class="container">
		<?php
			include("admin/notification.php");
		?>
		<div class="row">

			<div class="col-sm-6">
				<?= $contentAbout->getContent(); ?>
			</div>

			<div class="col-sm-6">
				<div id="myCarousel" class="carousel slide teste" data-ride="carousel">
					
					<!-- Indicators -->
					<ol class="carousel-indicators">
					<?php
						$ativo=2;
						$Indicators=1;
								
						foreach ($photosAbout as $photo) { 
							
							if($ativo==2){
								$ativo=1;
					?>
								<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<?php 	}else{  ?>
																
								<li data-target="#myCarousel" data-slide-to="<?=$Indicators?>"></li>

						<?php 	$Indicators++; ?>

					<?php	} ?> <!-- ELSE -->

				<?php 	} ?> <!-- FOR EACH -->

														
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<?php 
						$active=2;
						foreach ($photosAbout as $photo) { 
							if($active==2){
								$active=1;
							?>
								<div class="item active">
									<img style="padding: 0px;" src="img/about/<?=$photo->getPhoto();?>">
														 
								</div>
					<?php 	}else{ ?>
								
								<div class="item">
									<img style="padding: 0px;" src="img/about/<?=$photo->getPhoto();?>">
								</div>

					<?php 	} ?>

				<?php 	} ?> <!-- FOR EACH -->

					</div><!--carousel inner-->

					<!-- Left and right controls -->
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
							<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
							<span class="sr-only">Next</span>
					</a>
				</div><!--carousel-->
			</div> <!-- COL-SM-6 -->
		</div> <!-- ROW -->
		<div class="row">
			<button class="btn btn-primary btn-lg font-weight-bold text-uppercase" id="btn-contact" data-toggle="modal" data-target="#myModal">CONTACT US <span class="fas fa-envelope"></span></button>
		</div>


		<div class="modal fade" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
        				<center><h2 class="modal-title">CONTACT US</h2></center>
 
					</div>
					<form>

						<div class="modal-body">
							<label >What is your name?*</label>
							<input placeholder="Name*" required="" type="text" class="form-control">
							<label>What is your email?*</label>
							<input type="email" name="" required="" class="form-control" placeholder="youremail@something.com*">
							<label>What is on your mind? Let us know*</label>
							<textarea class="form-control" required="" placeholder="Message*" rows="5"></textarea>
						</div>
						<div class="modal-footer">
							<button name="" class="btn btn-primary text-uppercase font-weight-bold" value="Send">
								Send  <span class="fas fa-paper-plane"></span>
							</button>
							<button type="button" class="btn btn-danger text-uppercase font-weight-bold" value="Send" data-dismiss="modal">
								close  <span class="fas fa-times"></span>
							</button>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
		
	</div> <!--CONTAINER -->
		<?php
			include_once("footer.php");
		?>

