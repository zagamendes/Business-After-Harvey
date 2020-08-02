<?php
include_once("classes/photo.php");
$connection = Connection::connect_db();
$totalPaginas = $connection->query("select *from photos_gallery group by folder");
Connection::close_db($connection);

$totalPaginas = ceil($totalPaginas->num_rows / 3);
if (isset($_GET['pagina'])) {
	$inicio = $_GET['pagina'];
} else {
	$inicio = 1;
}
$inicio = $inicio - 1;
$paginaAtual = $inicio;
$inicio = $inicio * 3;
$photosAlbuns = PhotoDAO::listAlbumCover("photos_gallery", $inicio);
?>

<?php
include("header.php");
?>
<div class="container">

    <div class="row" style="text-align: center; color:#c92427; font-family:Montserrat;">
        <h1>GALLERIES OF PICTURES FROM OUR EVENTS</h1>
    </div>
    <div class="row">
        <?php

		foreach ($photosAlbuns as $photo) { ?>

        <div class="col-sm-4">

            <div class="content thumbnail" style="text-align: center; height: 450px;" id="<?= $photo->getTitle() ?>">

                <div style="width: 100%; height: 200px; overflow: hidden;">
                    <a href="photos?title=<?= $photo->getTitle() ?>">
                        <img src="img/<?= $photo->getFolder() ?>/<?= $photo->getPhoto() ?>" class="img-responsive">
                    </a>
                </div>

                <div class="caption">
                    <h3 style="color:#0079BE;"><?= $photo->getTitle() ?></h3>
                    <p><?= $photo->getDescription() ?></p>
                </div>
            </div>
        </div>
        <?php   }  ?>

    </div>


    <div class="row">

        <center>

            <ul class="pagination">

                <?php for ($i = 0; $i < $totalPaginas; $i++) { ?>

                <li <?php if ($paginaAtual == $i) echo "class='active'" ?>><a
                        href="gallery?pagina=<?= $i + 1 ?>"><?= $i + 1 ?></a></li>

                <?php } ?>
            </ul>
        </center>
    </div>



</div>
<?php
include_once("footer.php");
?>