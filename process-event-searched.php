<?php
include("classes/event.php");

$eventDAO = new EventDAO();
$inputJSON = file_get_contents('php://input');
$title = json_decode($inputJSON);

$events = $eventDAO->searchEventsByTitle($title->title);

/*foreach ($events as $i => $value) {
		$array[$i]["title"]=$value->getTitle();
		$array[$i]["id"]=$value->getId();
		
	}*/


echo json_encode($events);