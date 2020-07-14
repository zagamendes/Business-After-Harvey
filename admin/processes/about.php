<?php
	
	include_once("../../classes/about.php");

	$content_aboutDAO = new AboutDAO();
	$content_about = new About();

	if(isset($_POST["id"])){
		$content_about->setId($_POST["id"]);
	}

	if(isset($_POST["about"])){
		$content_about->setContent($_POST["about"]);
	}

	$error=$content_aboutDAO->save($content_about);
	if($error==null){
		header("location:../about?status=ok");
	}else{
		header("location:../about?status=error&error=".$error);
	}

	
?>