<?php
	include_once("connection.php");

	class About{
		private $id=0;
		private $content="";

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id=$id;
		}

		public function getContent(){
			return $this->content;
		}

		public function setContent($content){
			$this->content=$content;
		}
	}

	class AboutDAO{
		public function save($content){
			$db = new Connection();
			$connection =$db->connect_db();

			if($content->getId()==0){
				$stmt=$connection->prepare("insert into content_about(content) values(?)");
				$stmt->bind_param("s",$content->getContent());
			}else{
				$id=$content->getId();
				$db = new Connection();
				$connection=$db->connect_db();
				$stmt=$connection->prepare("update content_about set content=? where id=?");
				$stmt->bind_param("si",$content->getContent(),$id);
			}
			$error=null;
			if(!$stmt->execute()){
				$error=$stmt->error();
			}

			return $error;

		}

		public static function listContent(){
			$connection = Connection::connect_db();
			

			$result=$connection->query("select *from content_about");
			$content=mysqli_fetch_assoc($result);

			$content_about = new About();
			$content_about->setId($content["id"]);
			$content_about->setContent($content["content"]);


			Connection::close_db($connection);
			return $content_about;

		}
	}

?>