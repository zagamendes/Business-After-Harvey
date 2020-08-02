<?php
include("dashboard-header.php");
include_once("../classes/event.php");
if (isset($_GET["id"])) {
	$id = $_GET["id"];
} else {
	$id = 0;
}

$events = new EventDAO();

$event = $events->listContentById($id);



?>
<link rel="stylesheet" type="text/css" href="css/insert-event.css">

<script src="js/events-register-event.js"></script>

<div class="container">
	<?php
	include_once("notification.php");
	?>

	<legend>
		<h2>Register Of Events</h2>
	</legend>

	<form id="teste" method="post" action="processes/event" enctype="multipart/form-data">

		<div class="row">

			<div class="col-sm-6">
				<div class="form-group">
					<label>Title:</label>
					<div class="input-group">
						<span class="input-group-addon"><span class="fas fa-heading"></span></span>
						<input required type="text" id="title" placeholder="Event Title" name="title" class="form-control" value="<?= $event->getTitle() ?>">
						<span data-key="title"></span>

					</div>
				</div>
			</div>
			<input type="hidden" name="id" id="id" value="<?= $id ?>">

			<div class="col-sm-6">
				<div class="form-group">
					<label>Link to Sign up:</label>

					<div class="input-group">
						<span class="input-group-addon "><span class="fas fa-link"></span></span>
						<input required type="text" id="link" name="link" placeholder="https://somelink.com" value="<?= $event->getLink() ?>" class="form-control">
						<span data-key="link"></span>
					</div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group">
					<label>Picture: <span id="photo-required" class="text-danger" style="display: none;">Photo is
							Required</span></label>
					<label class="btn btn-info form-control font-weight-bold text-uppercase">
						<span class="fas fa-image"></span> Picture/Flyer of the Event
						<input type="file" name="photo" id="photo" style="position: absolute;width: 0; z-index: -1;">
						<input type="hidden" name="currentPhoto" value="<?= $event->getPhoto() ?>">
					</label>
				</div>
			</div>

			<div class="col-sm-4 col-xs-6">
				<div class="form-group">
					<label for="date">Date of the Event:</label>
					<div class="input-group">
						<span class="input-group-addon"><span class="fas fa-calendar-alt"></span></span>
						<input required id="date" type="date" name="date" value="<?= $event->getDate() ?>" class="form-control">
						<span data-key="date"></span>
					</div>
				</div>
			</div>

			<div class="col-sm-4 col-xs-6">
				<div class="form-group">
					<label for="time">Time:</label>
					<div class="input-group">
						<span class="input-group-addon"><span class="far fa-clock"></span></span>
						<input required id="time" type="time" name="time" value="<?= $event->getTime() ?>" class="form-control">
						<span data-key="date"></span>
					</div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group">
					<label>Number:</label>
					<div style="position: relative;">
						<input required placeholder="121" id="number" type="tel" name="number" value="<?= $event->getNumber() ?>" class="form-control">
						<span data-key="number"></span>
					</div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group">
					<label>Street:</label>
					<div class="input-group">
						<span class="input-group-addon"><span class="fas fa-building"></span></span>
						<input required type="text" id="street" placeholder="Example st" name="street" value="<?= $event->getStreet() ?>" class="form-control">
						<span data-key="street"></span>
					</div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group">
					<label>Zip Code:</label>
					<div class="input-group">
						<span class="input-group-addon"><span class="fas fa-map-marker-alt"></span></span>
						<input required type="tel" id="zipcode" name="zipcode" value="<?= $event->getZipcode() ?>" class="form-control">
						<span data-key="zipcode"></span>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">

					<label>Description: <span class="text-danger" style="display: none;" id="description-required">Description Required</span></label>
					<textarea name="description" id="description" class="form-control" rows="8" required>
								<?= $event->getDescription() ?>
							</textarea>
				</div>
			</div>
		</div>

		<div class="row" style="margin-bottom: 20px;">

			<div class="col-sm-6 col-xs-6">

				<button class="btn btn-success btn-block btn-lg font-weight-bold text-uppercase">
					<span class="fas fa-check-circle"></span> Save
				</button>

			</div>

			<div class="col-sm-6 col-xs-6">

				<a href="insertEvent" class="btn btn-primary  btn-block btn-lg font-weight-bold text-uppercase">
					<span class="fas fa-plus"></span> New
				</a>

			</div>

		</div>

	</form>

</div>
<script>
	CKEDITOR.replace('description');
</script>
<?php
include("footer.php");
?>