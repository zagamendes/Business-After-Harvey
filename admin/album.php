<?php
	include_once("dashboard-header.php");
	include_once("../classes/photo.php");
	
	if(isset($_GET["title"])){
		$title=$_GET["title"];
	}else{
		$title="";
	}

	$photoDAO = new PhotoDAO();

	$album = $photoDAO->listContentByTitle($title);
	$photos=$photoDAO->listAllContentByTitle($title);


?>

		<div class="container">

			<?php 
				include_once("notification.php");
			?>




			<legend><h3>Registration Of Albuns</h3></legend>


			<div class="row">
				<form action="processes/photo" method="post" enctype="multipart/form-data">	

					<div class="col-sm-6">
						<div class="form-group">
							<label class="text-uppercase">Name Of The Album</label>
							<input type="text" name="title" class="form-control" value="<?= $title ?>">
							<input type="hidden" name="table" value="photos_gallery">
							<input type="hidden" name="folder" value="<?= $album->getFolder();?>">
							
						</div>
					</div>

					<div class="col-sm-6">

						<div class="form-group">
							<label class="text-uppercase">Photos</label>
							<label class="btn btn-primary text-uppercase font-weight-bold form-control"><span class="fas fa-images"></span> Add Pictures 
								<input type="file" name="files[]" multiple style="position: absolute;width: 0px;">
							</label>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label>Description</label>
							<textarea name="description">
								<?= $album->getDescription(); ?>
							</textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<input type="hidden" name="id" value="<?= $album->getId()?>">
						<button type="submit" name="" class="btn btn-success form-control text-uppercase font-weight-bold"><span class="fas fa-check"></span> Save</button>
					</div>
					<div class="col-sm-6">
						<a href="" class="btn btn-primary text-uppercase form-control font-weight-bold"><span class="fas fa-plus"></span> New </a>
					</div>
				</form>
			</div>
			
			<div class="row">

				<div class="col-sm-12">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th class="text-uppercase"><span class="fas fa-image"></span> Photo</th>
								<th class="text-center text-uppercase"><span class="fas fa-edit"></span> Change</th>
								<th class="text-uppercase"><span class="fas fa-trash"></span> Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($photos as $photo) { ?>
		
			
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
										
										<input type="hidden" name="id" value="<?= $photo->getId();?>">
										<input type="hidden" name="folder" value="<?= $photo->getFolder();?>">
										<input type="hidden" name="page" value="album">
										<input type="hidden" name="title" value="<?= $photo->getTitle()?>">
										<input type="hidden" name="table" value="photos_gallery">
										<input type="hidden" name="currentPhoto" value="<?=$photo->getPhoto();?>">
										<button type="submit" name="update" value="Save Photo" class="btn btn-success text-uppercase font-weight-bold"><span class="fas fa-check"></span> Save </button>
									
									</form>
								</td>
								<td><a class="btn btn-danger text-uppercase font-weight-bold" onclick="return confirm('are you sure that you want to delete this?');" href="processes/delete?id=<?=$photo->getId();?>&table=photos_gallery&photo=<?=$photo->getPhoto();?>&page=album&folder=<?=$photo->getFolder();?>&title=<?= $photo->getTitle()?>">
									<span class="fas fa-trash"></span> Delete 
									</a>
								</td>
							</tr> 
			
							<?php } ?>
						</tbody>
					</table>
				</div>

				
			</div>
		</div>

		<?php
			include 'footer.php';
		?>
	</body>
	<script>
		CKEDITOR.replace('description');
	</script>
</html>