<?php

$extensionList = array("jpg", "jpeg", "png");

include_once("../../classes/event.php");

$eventDAO = new EventDAO();
$event = new Event();

$status["ok"] = false;
$status["message"] = "Photo is Required!";

//some code
$form = $_POST;


$event->setId($form["id"]);

$event->setTitle($form["title"]);

$event->setDescription($form["description"]);

$event->setLink($form["link"]);

$event->setDate($form["date"]);

$event->setStreet($form["street"]);

$event->setTime($form["time"]);

$event->setZipcode($form["zipcode"]);

$event->setNumber($form["number"]);

if (empty($_FILES["photo"]["name"]) && $event->getId() != "0") {
	$event->setPhoto($form["currentPhoto"]);
} else if (empty($_FILES["photo"]["name"]) && $event->getId() == "0") {
	header("location:../event?status=error&error=Photo Is Required!");
	die();
} else {
	if (!isRightExtension($_FILES['photo']['name'], $extensionList)) {
		$status["message"] = "File with format invalid!";

		header("location:../event?status=error&error=Photo With Format Invalid!");
		die();
	}

	$event->setChangedPicture();

	$newName = $_FILES["photo"]["name"];


	$event->setPhoto($newName);
	$event->setCurrentPhoto($form["currentPhoto"]);
}


$error = $eventDAO->save($event);
if ($error == null) {
	$status["ok"] = true;
	$status["message"] = "saved";
	move_uploaded_file($_FILES["photo"]["tmp_name"], "../../img/events/" . $newName);

	header("location:../event?status=ok");
	die();
} else {
	$status["ok"] = false;
	$status["message"] = $error;
	header("location:../event?status=error&error" . $error);
	die();
}

echo json_encode($status);
die();

function isRightExtension($file, $extensionList)
{
	$extensao = pathinfo(strtolower($file), PATHINFO_EXTENSION);
	return in_array($extensao, $extensionList);
}