<?php
echo"as";
include("header.php");
include("classes/connection.php");
include("classes/slideshow.php");
$slideshowDAO = new SlideShowDAO();
$photos = $slideshowDAO->listContent();
?>
<style type="text/css">
.item {
    max-height: 500px;
}

#myCarousel {
    margin-bottom: 20px;
}
</style>
<div class="container">
	<h2>dssa</h2>
    <div id="myCarousel" class="carousel slide teste" data-ride="carousel">

        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php
			$ativo = 2;
			$Indicators = 1;

			foreach ($photos as $photo) {

				if ($ativo == 2) {
					$ativo = 1;
			?>
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>

            <?php 	} else {  ?>

            <li data-target="#myCarousel" data-slide-to="<?= $Indicators ?>"></li>

            <?php $Indicators++; ?>

            <?php	} ?>
            <!-- ELSE -->

            <?php 	} ?>
            <!-- FOR EACH -->


        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php
			$active = 2;
			foreach ($photos as $photo) {
				if ($active == 2) {
					$active = 1;
			?>
            <div class="item active">
                <img style="padding: 0px;" src="img/home/<?= $photo->getPhoto(); ?>" class="img-responsive">
                <div class="carousel-caption">
                    <h3><?= $photo->getTitle() ?></h3>
                    <p><?= $photo->getDescription() ?></p>
                </div>

            </div>
            <?php 	} else { ?>

            <div class="item">
                <img style="padding: 0px;" src="img/home/<?= $photo->getPhoto(); ?>">
                <div class="carousel-caption">
                    <h3><?= $photo->getTitle() ?></h3>
                    <p><?= $photo->getDescription() ?></p>
                </div>
            </div>

            <?php 	} ?>

            <?php 	} ?>
            <!-- FOR EACH -->

        </div>
        <!--carousel inner-->

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--carousel-->
</div>

<?php
include("footer.php");
?>
