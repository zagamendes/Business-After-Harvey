<?php

include("connection.php");
class Event
{
	private $id = 0;
	private $photo;
	private $title = "";
	private $description = "";
	private $date = "";
	private $link = "";
	private $changedPicture = false;
	private $currentPhoto = "";
	private $street = "";
	private $number = "";
	private $time = "";
	private $zipcode = "";



	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getCurrentPhoto()
	{
		return $this->currentPhoto;
	}

	public function setCurrentPhoto($currentPhoto)
	{
		$this->currentPhoto = $currentPhoto;
	}

	public function getChangedPicture()
	{
		return $this->changedPicture;
	}

	public function setChangedPicture()
	{
		$this->changedPicture = true;
	}

	public function getPhoto()
	{
		return $this->photo;
	}

	public function setPhoto($photo)
	{
		$this->photo = $photo;
	}
	public function getTitle()
	{
		return $this->title;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}
	public function getDescription()
	{
		return $this->description;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function getDate()
	{
		return $this->date;
	}

	public function setDate($date)
	{
		$this->date = $date;
	}

	public function getLink()
	{
		return $this->link;
	}

	public function setLink($link)
	{
		$this->link = $link;
	}

	public function setStreet($street)
	{
		$this->street = $street;
	}

	public function getStreet()
	{
		return $this->street;
	}

	public function setTime($time)
	{
		$this->time = $time;
	}

	public function getTime()
	{
		return $this->time;
	}

	public function setNumber($number)
	{
		$this->number = $number;
	}

	public function getNumber()
	{
		return $this->number;
	}

	public function setZipcode($zipcode)
	{
		$this->zipcode = $zipcode;
	}

	public function getZipcode()
	{
		return $this->zipcode;
	}

	public static function setValues($values)
	{
		$event = new Event();
		$event->setId($values["id"]);
		$event->setPhoto($values["photo"]);
		$event->setTitle($values["title"]);
		$event->setDescription($values["description"]);
		$event->setLink($values["link"]);
		$event->setDate($values["date"]);
		$event->setStreet($values["street"]);
		$event->setZipcode($values["zipcode"]);
		$event->setNumber($values["number"]);
		$event->setTime($values["time"]);
		return $event;
	}
}

class EventDAO
{


	public function save($event)
	{

		$connection = Connection::connect_db();
		$title = $event->getTitle();
		$photo = $event->getPhoto();
		$description = $event->getDescription();
		$date = $event->getDate();
		$link = $event->getLink();
		$changedPicture = $event->getChangedPicture();
		$currentPhoto = $event->getCurrentPhoto();
		$street = $event->getStreet();
		$number = $event->getNumber();
		$time = $event->getTime();
		$zipcode = $event->getZipcode();

		if ($event->getId() == 0) {

			$stmt = $connection->prepare("insert into event(photo,title,description,date,link,street,number,zipcode,time) values(?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("ssssssiis", $photo, $title, $description, $date, $link, $street, $number, $zipcode, $time);
		} else {

			$id = $event->getId();

			if ($event->getChangedPicture()) {

				unlink("../../img/events/" . $event->getCurrentPhoto());
			}
			$stmt = $connection->prepare("update event set photo=?,title=?,description=?,date=?,link=?,zipcode=?,street=?,number=?,time=? where id=?");
			$stmt->bind_param("sssssisssi", $photo, $title, $description, $date, $link, $zipcode, $street, $number, $time, $id);
		}

		$error = null;
		if (!$stmt->execute()) {
			$error = $stmt->error;
		}

		Connection::close_db($connection);

		return $error;
	}

	public function listContent($inicio, $qtdPorPagina)
	{
		$connection = Connection::connect_db();
		$result = $connection->query("SELECT *from event order by date limit $inicio, $qtdPorPagina");
		$events = array();
		while ($content = $result->fetch_assoc()) {

			$events[] = Event::setValues($content);
		}

		Connection::close_db($connection);
		return $events;
	}
	public static function listContentById($id)
	{
		$db = new Connection();
		$connection = $db->connect_db();
		$result = $connection->query("select *from event where id= $id");
		$content = mysqli_fetch_assoc($result);
		return Event::setValues($content);
	}

	public function recentEvents()
	{
		$connection = Connection::connect_db();
		$result = $connection->query("SELECT * from event order by id desc limit 3");
		$events = array();
		while ($content = $result->fetch_assoc()) {

			$events[] = Event::setValues($content);
		}
		Connection::close_db($connection);
		return $events;
	}

	public function searchEventsByTitle($title)
	{
		$connection = Connection::connect_db();
		$result = $connection->query("SELECT * from event where title like '%$title%' ");
		$events = array();
		while ($content = $result->fetch_assoc()) {

			$events[] = $content;
		}
		Connection::close_db($connection);
		return $events;
	}
}
