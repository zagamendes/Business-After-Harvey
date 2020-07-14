<?php

	class SlideShow
	{
		private $id=0;
		private $photo="";
		private $title="";
		private $description="";

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id=$id;

		}

		public function getPhoto(){
			return $this->photo;
		}

		public function setPhoto($photo){
			$this->photo=$photo;

		}
		public function getTitle(){
			return $this->id;
		}

		public function setTitle($title){
			$this->id=$title;

		}
		public function getDescription(){
			return $this->description;
		}

		public function setDescription($description){
			$this->description=$description;

		}
		
	}

	class SlideShowDAO{
		public static function save($photo){

			$connection = Connection::connect_db();
			

			if($photo->getId()==0){
				$stmt=$connection->prepare("INSERT INTO photos_slideshow(photo,title,description) VALUES (?,?,?)");
				$stmt->bind_param("sss",$photo->getPhoto(),$photo->getTitle(),$photo->getDescription());
			}else{
				$id=$photo->getId();
				
				$stmt=$connection->prepare("update photos_slideshow set photo=?,title=?,description=? where id=?");
				$stmt->bind_param("sssi",$photo->getPhoto(),$photo->getTitle(),$photo->getDescription(),$id);
			}
			$error=null;
			if(!$stmt->execute()){
				$error=$stmt->error;
			}
			Connection::close_db($connection);
			return $error;
		}

		public function listContent(){
			$connection = Connection::connect_db();

			$result=$connection->query("select *from photos_slideshow");
			$photos=array();
			while($content=$result->fetch_assoc()){
				$slideShow = new SlideShow();
				$slideShow->setId($content["id"]);
				$slideShow->setPhoto($content["photo"]);
				$slideShow->setTitle($content["title"]);
				$slideShow->setDescription($content["description"]);
				$photos[]=$slideShow;	
			}
			
			
			return $photos;
		}

	}