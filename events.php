<?php
	
	include("header.php");
	include("classes/event.php");
	$numRows = mysqli_query(Connection::connect_db(),"SELECT *from event");
	$total = ($numRows->num_rows)/2;

	$event = new EventDAO();
	if(isset($_GET["pagina"])){
		$inicio = $_GET["pagina"];
	}else{
		$inicio = 1;
	}
	$inicio -= 1;
	$paginaAtual = $inicio;
	$inicio = $inicio*2;


	$recentEvents = $event->recentEvents();
	$events = $event->listContent($inicio,2);
?>
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
				<?php foreach ($events as $event) { ?>
					
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

				
			<?php } ?>	
				

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
								<li class="list-group-item"><a href="gallery"><?= $recentEvent->getTitle()?></a></li>
						<?php } ?>
					</div>
					<div id="search-events" style="display: none; list-style: none;">
					</div>
				</div>						
					
				
			</div>

		</div>

		<div class="row">
			<ul class="pagination events-page">
				<?php
					for($i=0;$i<$total;$i++){ ?>
						<li>
							<a href="events?pagina=<?= $i+1?>" <?php if($i==$paginaAtual) echo "class='active'"?>>
							<?=$i+1?>
							</a>
						</li>
				
			<?php	} ?>
				
			</ul>
		</div>
 
	</div>

<?php
	include("footer.php");
?>
	 