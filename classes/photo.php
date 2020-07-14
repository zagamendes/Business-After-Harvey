<?php
	
	include_once("connection.php");


	class Photo{
		private $id=0;
		private $table="";
		private $photo="";
		private $oldphoto="";
		private $folder="";
		private $description="";
		private $title="";
		public function getId(){
			return $this->id;

		}

		public function setId($id){
			$this->id=$id;
		}

		public function getTitle(){
			return $this->title;

		}

		public function setTitle($title){
			$this->title=$title;
		}

		public function getDescription(){
			return $this->description;

		}

		public function setDescription($description){
			$this->description=$description;
		}

		public function getFolder(){
			return $this->folder;

		}

		public function setFolder($folder){
			$this->folder=$folder;
		}

		public function getTable(){
			return $this->table;
		}
		
		public function setTable($table){
			$this->table=$table;
		}

		public function getPhoto(){
			return $this->photo;
		}

		public function setPhoto($photo){
			$this->photo=$photo;
		}

		public function getOldPhoto(){
			return $this->oldphoto;
		}

		public function setOldPhoto($photo){
			$this->oldphoto=$photo;
		}
	}

	class PhotoController{
		private static $extensionList = array("jpg","jpeg","png");

		public static function isRightExtension($file,$page){

			$extension = pathinfo(strtolower($file),PATHINFO_EXTENSION);

			if(in_array($extension, self::$extensionList)){
				return true;
			}else{
				header("location:../".$page."?status=error&error=File with format invalid! <strong> Only JPG, JPEG and PNG</strong> Are Allowed");
			die();
			}
		}

		 
	}
	class PhotoDAO{
		//ADDS ONLY ONE PICTURE
		public static function save($photo){
			$connection = Connection::connect_db();
			
			if($photo->getId()==0){
				$table=$photo->getTable();
				$stmt=$connection->prepare("insert into $table (photo) values(?)");
				$stmt->bind_param("s",$photo->getPhoto());
				
			}else{
				$table=$photo->getTable();
				$id=$photo->getId();
				$oldphoto=$photo->getOldPhoto();
				$stmt=$connection->prepare("update $table set photo = ? where id=?");
				$stmt->bind_param("si",$photo->getPhoto(),$id);
				$folder="../../img/".$photo->getFolder();

				unlink($folder."/".$oldphoto);
			}
			$error = null;
			if(!$stmt->execute()){
				$error=$stmt->error;
				
			}
			Connection::close_db($connection);
			return $error;
		}

		public static function addAlbum($album){

			$total=count($album['photos']["name"]);

			$connection = Connection::connect_db();

			$title = $album['title'];
			$description = $album['description'];
			$folder="../../img/".$title;


			for($i=0;$i<$total;$i++){


				$name = $album['photos']["name"][$i];
				print_r($name);
				$sql = "INSERT INTO photos_gallery (title,description,photo,folder) VALUES ('$title','$description','$name','$title')";
					
				$erro = $connection->query($sql);
						
				if(!$erro){
					header("Location:index?status=error&status=".$connection->error);
					break;
				}

				move_uploaded_file($album['photos']["tmp_name"][$i],$folder."/".$name);
					
			}

			Connection::close_db($connection);
			header("location:../index?status=ok");

		}

		public static function updateAlbum($album){

			$connection = Connection::connect_db();
			
			if($album["photos"]["size"][0]==0){
				$title = $album['title'];
				$description = $album['description'];
				$folder = $album['folder'];
				$sql="UPDATE photos_gallery set title='$title', description='$description' where folder='$folder'";

				if($connection->query($sql)){
					Connection::close_db($connection);
					header("Location:../album?status=ok&title=".$title);
				}else{
					$erro = $connection->error;
					Connection::close_db($connection);
					header("location:../albuns?status=erro&error=".$erro);
				}

			}else{

				foreach ($album['photos']["name"] as $photo) {

					PhotoController::isRightExtension($photo);
					
				}
				$title = $album['title'];
				$description = $album['description'];
				$folder = $album["folder"];

				$sql="UPDATE photos_gallery set title='$title', description='$description' where folder='$folder'";
				$erro = $connection->query($sql);
				if(!$erro){
					$erro = $connection->error;
					Connection::close_db($connection);
					header("location:../albuns?status=erro&error=".$erro);
				}
				$total = count($album["photos"]["name"]);
				for($i=0;$i<$total;$i++){

					$name = $album['photos']["name"][$i];
					print_r($name);

					$sql = "INSERT into photos_gallery (title,description,photo,folder) values('$title','$description','$name','$folder')";
					$erro = $connection->query($sql);
						
					if(!$erro){
						$erro = $connection->error;
						Connection::close_db($connection);
						header("location:../albuns?status=erro&error=".$erro);
					}

					move_uploaded_file($album["photos"]["tmp_name"][$i],"../../img/".$album["folder"]."/".$album["photos"]["name"][$i]);
						
				}
				Connection::close_db($connection);
				
				header("Location:../album?status=ok&title=".$title);
			}

		}

		public static function addPictures($table,$photos){
			
			$connection = Connection::connect_db();
			
			$total=count($photos["name"]);
			for($i=0;$i<$total;$i++){
				
				$newName=$photos["name"][$i];
				
				$sql="INSERT INTO $table (photo) values('$newName')";
				$erro = $connection->query($sql);
				if(!$erro){
					$erro = $connection->error;
					Connection::close_db($connection);
					header("Location:../index?status=error&error=".$erro);
					break;
					die();
				}
				move_uploaded_file($photos["tmp_name"][$i],"../../img/".explode("_", $table)[1]."/".$newName);

			}
			Connection::close_db($connection);	
			header("Location:../index?status=ok");
		}

		public function listContent($tabela){

			$connection = Connection::connect_db();

			$result=$connection->query("select *from $tabela");
			$photos=array();
			while($content=$result->fetch_assoc()){
				$photo = new photo();
				$photo->setId($content["id"]);
				$photo->setPhoto($content["photo"]);
				$photo->setFolder($content["folder"]);
				$photos[]=$photo;	
			}
			
			Connection::close_db($connection);
			return $photos;
		}

		public static function listAlbumCover($tabela,$inicio){
			
			$connection = Connection::connect_db();

			$result=$connection->query("select *from $tabela group by folder limit $inicio,3");
			$photos=array();
			while($content=$result->fetch_assoc()){
				$photo = new photo();
				$photo->setId($content["id"]);
				$photo->setPhoto($content["photo"]);
				$photo->setTitle($content["title"]);
				$photo->setFolder($content["folder"]);
				$photo->setDescription($content["description"]);

				$photos[]=$photo;	
			}
			
			
			return $photos;
		}

		public function listAllContentByTitle($title){
			
			$connection = Connection::connect_db();

			$result=$connection->query("SELECT *from photos_gallery where title='$title'");
			$photos=array();
			while($content=$result->fetch_assoc()){
				$photo = new photo();
				$photo->setId($content["id"]);
				$photo->setPhoto($content["photo"]);
				$photo->setTitle($content["title"]);
				$photo->setFolder($content["folder"]);
				$photo->setDescription($content["description"]);

				$photos[]=$photo;	
			}
			Connection::close_db($connection);
			return $photos;
		}

		public function listContentByTitle($title){

			$connection = Connection::connect_db();

			$result=$connection->query("select *from photos_gallery where title='$title'");
			$content=mysqli_fetch_assoc($result);

			$photo = new photo();
			$photo->setId($content["id"]);
			$photo->setPhoto($content["photo"]);
			$photo->setTitle($content["title"]);
			$photo->setFolder($content["folder"]);
			$photo->setDescription($content["description"]);

			Connection::close_db($connection);
			return $photo;

		}

		

		
	}
?>