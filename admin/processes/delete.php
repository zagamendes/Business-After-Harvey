<?php
	include_once("../../classes/connection.php");

	$connection = Connection::connect_db();
	
	$id=$_GET["id"];
	$page=$_GET["page"];
	$table=$_GET["table"];
	$photo=$_GET["photo"];
	$folder=$_GET["folder"];
	$title=$_GET["title"];
	if($page=="events"){
		
		$error=$connection->query("delete from $table where id=$id");
		if($error){
			unlink("../../img/events/".$photo);
			header("location:../".$page."?status=ok");	
		}else{
			$error = $connection->error;
			Connection::close_db($connection);
			header("location:../".$page."?status=error&error=".$error);
		}	
	}else if($page=="albuns"){
		

		$error=$connection->query("delete from $table where folder='$folder'");

		
		if($error){
			$dir = dir("../../img/".$folder);

			while($arquivo = $dir->read()){

				if(($arquivo != '.') && ($arquivo != '..')){
					unlink("../../img/".$folder."/".$arquivo);
				}
			}
			
			rmdir("../../img/".$folder);
			Connection::close_db($connection);
			header("location:../".$page."?status=ok");	
		}else{
			$error=$connection->error;
			Connection::close_db($connection);
			header("location:../".$page."?status=error&error=".$error);
		}	

	}else{
		$error=$connection->query("delete from $table where id=$id");
		if($error){
			unlink("../../img/".$folder."/".$photo);
			Connection::close_db($connection);
			header("location:../".$page."?title=".$title."&status=ok");	
		}else{
			$error = $connection->error;
			header("location:../".$page."?status=error&error=".$error);
		}
	}
