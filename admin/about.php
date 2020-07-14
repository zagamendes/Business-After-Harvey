<?php
	/*session_start();
	if(!isset($_SESSION["user"])){
			header('location:../admin pages/login.php');
	}*/

	
	include_once("dashboard-header.php");
	include_once("../classes/photo.php");
	include_once("../classes/about.php");
	$contentAbout = AboutDAO::listContent();
	$photoDAO = new PhotoDAO();
	$photosAbout = $photoDAO->listContent("photos_about");
?>


	<div class="container">
		<?php
			include("notification.php");
		?>
		<div class="row">
			<div class="col-sm-6">
				<form action="processes/about" method="post">
					<input type="hidden" name="id" value="<?= $contentAbout->getId();?>">
				 	<textarea name="about" class="form-control">
						<?= $contentAbout->getContent(); ?>
				 	</textarea>
				 	<button class="btn btn-success form-control font-weight-bold text-uppercase" style="margin-bottom: 20px;">Save <span class="fas fa-check-circle"></span></button>
			 	</form>
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
									<img style="padding: 0px;" src="../img/about/<?=$photo->getPhoto();?>">
														 
								</div>
					<?php 	}else{ ?>
								
								<div class="item">
									<img style="padding: 0px;" src="../img/about/<?=$photo->getPhoto();?>">
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
			<div class="col-sm-12">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th class="text-uppercase"><span class="fas fa-image"></span> Photo</th>
							<th class="text-uppercase text-center" ><span class="fas fa-edit"></span> Change</th>
							<th class="text-uppercase "><span class="fas fa-trash"></span> Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($photosAbout as $photo) { ?>
		
			
						<tr>
							<td>
								<img src="../img/<?= $photo->getFolder();?>/<?=$photo->getPhoto()?>" style="width: 100px;" class="img-responsive">
							</td>
							<td class="text-center">
								<form method="post" action="processes/photo" enctype="multipart/form-data">
									<label class="btn btn-primary text-uppercase font-weight-bold">
										<span class="fas fa-image"></span> Change Picture 
										<input type="file" name="photo" required style="position: absolute;width: 0;">
									</label>
									<input type="hidden" name="page" value="about">	
									<input type="hidden" name="id" value="<?= $photo->getId();?>">
									<input type="hidden" name="folder" value="<?= $photo->getFolder();?>">

									<input type="hidden" name="table" value="photos_about">
									<input type="hidden" name="currentPhoto" value="<?=$photo->getPhoto();?>">
									<button type="submit" name="update" value="Save Photo" class="btn btn-success text-uppercase font-weight-bold"><span class="fas fa-check"></span> Save</button>
									
								</form>
							</td>

							<td>
								<a class="btn btn-danger text-uppercase font-weight-bold" onclick="return confirm('are you sure that you want to delete this?');" href="processes/delete?id=<?=$photo->getId();?>&table=photos_about&photo=<?=$photo->getPhoto();?>&page=about&folder=<?=$photo->getFolder();?>">
								<span class="fas fa-trash"></span> Delete 
								</a>
							</td>
						</tr> 
			
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div> <!--CONTAINER -->
		<?php
			include_once("footer.php");
		?>
</body>
 <script>
	
    CKEDITOR.replace( 'about',{
    	language:"en"
    	
    } );
 
</script>
</html>
