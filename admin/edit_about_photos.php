<?php
	/*session_start();
 	if(!isset($_SESSION["user"])){
      header('location:../admin pages/login.php');
  	}*/
	include_once("parameters.php");
	if(isset($_GET["status"])){
		$status=$_GET["status"];
	}else{
		$status="null";
	}
?>



<html>
    <head>
        <title>Warren Winston</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon"  href="img/WarrenWinston-logo-clr.png">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
     
        
    </head>
    <body>
    	<div class="container">
    		<?php 
    			if($status=="deleted"){?>
    				<div class="alert alert-success alert-dismissible fade in">
    					<strong>success!</strong> Photo Deleted
    					<a href="#" class="close" data-dismiss="alert" >&times;</a>	
    				</div>
    		<?php				
    			}

    			?>

    		<?php 
    			if($status=="saved"){?>
    				<div class="alert alert-success alert-dismissible fade in">
    					<strong>success!</strong> Photo updated 
    					<a href="#" class="close" data-dismiss="alert" >&times;</a>	
    				</div>
    		<?php				
    			}

    			?>

    	<?php   if($status=="error"){ ?>
    				<div class="alert alert-danger alert-dismissible fade in">
    					<strong>ERROR!</strong> Error to delete Photo try again later.
    					<a href="#" class="close" data-dismiss="alert" >&times;</a>	
    				</div>
    <?php	} ?>


    <?php   if($status=="error1"){ ?>
    				<div class="alert alert-danger alert-dismissible fade in">
    					<strong>ERROR!</strong> Error to update Photo try again later.
    					<a href="#" class="close" data-dismiss="alert" >&times;</a>	
    				</div>
    <?php	} ?>
    
   					
	<table class="table table-hover">
			<thead>
				<tr>
					<th>Photo</th>
					<th>Edit <span class="glyphicon glyphicon-pencil"></span></th>
					<th>Delete <span class="glyphicon glyphicon-trash"></span></th>
				</tr>
			</thead>
			<tbody>
	<?php foreach ($photosAbout as $photo1) { ?>
		
			
				<tr>
					<td><img src="img/about/<?=$photo1->getPhoto()?>" style="width: 100px;" class="img-responsive"></td>
					<td>
						<form method="post" action="save photo.php" enctype="multipart/form-data">
							<input type="file" name="photo">
            				<input type="hidden" name="id" value="<?= $photo1->getId();?>">
            				<input type="hidden" name="table" value="photos_about">
                            <input type="hidden" name="folder" value="about">
                            <input type="hidden" name="page" value="edit_about_photos">
            				<input type="hidden" name="oldphoto" value="<?=$photo1->getPhoto();?>">
            				<input type="submit" name="update" value="Save Photo" class="btn btn-success ">
						
						</form>
					</td>
					<td><a onclick="return confirm('are you sure that you want to delete this?');" href="delete.php?id=<?=$photo1->getId();?>&table=photos_about&photo=<?=$photo1->getPhoto();?>&page=edit_about_photos&folder=about">
						Delete <span class="glyphicon glyphicon-trash"></span>
						</a>
					</td>
				</tr> 
			
<?php } ?>
	</tbody>
		</table>

</div>
</body>