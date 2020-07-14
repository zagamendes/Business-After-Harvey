<?php
	include("classes/event.php");

	$eventDAO = new EventDAO();
	$recentEvents = $eventDAO->recentEvents();
	$event = $eventDAO->listContentById($_GET["id"]);
	include("header.php");
	

	
?>
<head>
  <title>Your Website Title</title>
    <!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
  
</head>
<style type="text/css">
	.active{
		background: #C72328 !important;
	}
	.events-page{
		left: 50%;
		transform: translateX(-50%);
		position: relative;

	}
	.events-page a.active{
		color: white!important;
	}
</style>
	<link rel="stylesheet" type="text/css" href="css/events.css">
	<div class="container">


		<div class="row">


			<div class="col-sm-7">
				
					
				<div class="row">
					<div class="panel panel-default">
						<div class="panel-body">
							<h2> 
								<b><?= $event->getTitle(); ?></b>
							</h2>
							<img class="img-responsive" src="img/events/<?= $event->getPhoto()?>">
							<p style="margin-top: 10px;"> <span class="fas fa-calendar"></span> <?= date("m/d/Y",strtotime($event->getDate())) ?></p>
							<p> <span class="fas fa-clock"> </span> <?= $event->getTime() ?></p>
							<p> <span class="fas fa-building"> </span> <?= $event->getStreet() ?></p>
						
							
							<p style="border-top: 2px solid #eee; border-bottom: 2px solid #eee;">
								<?= $event->getDescription();?>
							</p>
							<div class="col-sm-6 col-xs-6"> 
								 
								<a class="btn btn-success btn-block text-uppercase font-weight-bold" href="<?= $event->getLink()?>">
									<span class="fas fa-user-plus"></span> Sign up 
								</a>

							</div>
							<div class="col-sm-6 col-xs-6"> 
								 
								<a class="btn btn-primary btn-block text-uppercase font-weight-bold" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://192.168.0.22/harvey/event?id=<?= $event->getId()?>">
									<span class="fab fa-facebook"></span> Share 
								</a>
								
							</div>
						</div>
					</div>

				</div>

				
			
				

			</div>

			<div class="col-sm-5 p-sticky">
				<div class="panel panel-primary recent-events-panel"  >
					<div class="panel-heading text-center text-uppercase text-capitalize">
						<h4>Recent Events</h4>
						<form>
							<div class="input-group">
								<input type="text" name="event-title" id="input-event-title" class="input-lg form-control" placeholder="search for events">

								<div class="input-group-btn">
									<button class="btn btn-lg btn-danger" type="submit">
										<span class="glyphicon glyphicon-search"></span>
									</button>
								</div>
							</div>
						</form>
					</div>
					<div id="recent-events">
						<?php
							foreach ($recentEvents as $recentEvent) { ?>
								<li class="list-group-item"><a href="event?id=<?= $recentEvent->getId()?>"><?= $recentEvent->getTitle()?></a></li>
						<?php } ?>
					</div>
					<div id="search-events" style="display: none; list-style: none;">
					</div>
				</div>						
					
				
			</div>

		</div>

		
 
	</div>

<?php
	include("footer.php");
?>
	 