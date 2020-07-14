<?php

	include_once("../../classes/photo.php");
	include_once("../../classes/slideshow.php");

	

	$photoDAO = new PhotoDAO();
	$photo = new Photo();

	if(isset($_POST["update"])){
		$title = $_POST["title"];
		$page = $_POST["page"];
		$photo->setPhoto($_FILES["photo"]["name"]);

		$photo->setTable($_POST["table"]);

		
		$photo->setId($_POST["id"]);
		
		
		$photo->setFolder($_POST["folder"]);
		
		
		$photo->setOldPhoto($_POST["currentPhoto"]);
		
		$folder="../../img/".$photo->getFolder();

		PhotoController::isRightExtension($photo->getPhoto(),$page);
		

		$error=$photoDAO->save($photo);

		if($error==null){
			move_uploaded_file($_FILES["photo"]["tmp_name"],$folder."/".$photo->getPhoto());
			
			header("Location:../".$page."?status=saved&title=".$title);
		}else{
			
			header("Location:index?status=error&error=".$error);
		}

	}else{
		$table = $_POST["table"];
		
		if($table=="photos_gallery"){

			$page="index";

			$album = array();
			$album["title"]= $_POST["title"];
			$album["description"] = $_POST["description"];

			if(isset($_POST["dashboard"])){

				$album["photos"]=$_FILES["photosDash"];

				$folder="../../img/".$_POST["title"];

				foreach ($album["photos"]["name"] as $photo) {
					PhotoController::isRightExtension($photo,$page);
					
				}

				mkdir($folder);
				PhotoDAO::addAlbum($album);

			}else{
				
				$album["folder"] = $_POST["folder"];
				$album["photos"] = $_FILES["files"];
				PhotoDAO::updateAlbum($album);

			}

			
		}else if($table=="photos_slideshow"){
			$page = "index";
			$folder = "../../img/home/";
			$slideShow = new SlideShow();

			$slideShow->setPhoto($_FILES["photo"]["name"]);
			$slideShow->setTitle($_POST["title"]);
			$slideShow->setDescription($_POST["description"]);

			PhotoController::isRightExtension($slideShow->getPhoto(),$page);


			$error = SlideShowDAO::save($slideShow);

			if($error==null){
				move_uploaded_file($_FILES["photo"]["tmp_name"],$folder.$slideShow->getPhoto());
				header("Location:../index?status=ok");
			}else{
				header("Location:../index?status=error&error=".$error);
			}

		}else{
			$photos=$_FILES["photos"];
			$page="index";
			foreach ($photos["name"] as $photo) {
				PhotoController::isRightExtension($photo,$page);
			}
			PhotoDAO::addPictures($table,$photos);

		}

	}
	
	
	
	
	
	

?>