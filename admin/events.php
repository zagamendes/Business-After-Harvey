<?php
    include("dashboard-header.php");
    include_once("../classes/event.php");
    if(isset($_GET["pagina"])){
    	$inicio = $_GET["pagina"];
    }else{
    	$inicio =1;
    }
    $connection = Connection::connect_db();
    $totalPaginas = mysqli_query($connection,"select * from event");
    $totalPaginas = $totalPaginas->num_rows;
    Connection::close_db($connection);

    $inicio -=1;
    $paginaAtual = $inicio;
    $inicio = $inicio * 10;
    $totalPaginas = ceil($totalPaginas/10);
    echo $totalPaginas;

    $event = new EventDAO();
	$events = $event->listContent($inicio,10);

?>

    	<div class="container">
    		<?php 
    			include_once("notification.php");
    		?>


	<table class="table table-striped table-hover">
	<thead>
				<tr>
					<th class="text-uppercase">Photo</th>
                    <th class="text-uppercase">Title</th>
					<th class="text-center text-uppercase">Edit </th>
					<th class="text-center text-uppercase"> Delete </th>
				</tr>
			</thead>
			<tbody>
	<?php foreach ($events as $event) { ?>
		
			
				<tr>
					<td><img src="../img/events/<?=$event->getPhoto()?>" style="max-width: 320px; max-height: 160px;" class="img-responsive"></td>
                    <td><?= $event->getTitle(); ?></td>
					<td>
						<a class="btn btn-primary btn-block text-uppercase font-weight-bold" href="event?id=<?= $event->getId();?>"><span class="fas fa-edit"></span> Edit  </a>
							
					</td>
					<td><a class="btn btn-danger btn-block text-uppercase font-weight-bold" onclick="return confirm('are you sure that you want to delete this?');" href="processes/delete?id=<?=$event->getId();?>&table=event&photo=<?=$event->getPhoto();?>&page=events">
						<span class="fas fa-trash"></span> Delete 
						</a>
					</td>
				</tr> 
			
<?php } ?>
	</tbody>
		</table>
</div>
<?php
	include("footer.php");
?>