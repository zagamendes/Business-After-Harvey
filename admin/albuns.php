<?php
include("dashboard-header.php");
include_once("../classes/photo.php");
isset($_GET["pagina"]) ? $inicio = $_GET["pagina"] * 6 : $inicio = 0;
$photoDAO = new PhotoDAO();
$photosAlbuns = $photoDAO->listAlbumCover("photos_gallery", $inicio);
?>
<div class="container" style="position: relative;">
    <?php
    include_once("notification.php");
    ?>




    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-uppercase">Event</th>
                <th class="text-uppercase">Photo</th>
                <th class="text-uppercase">Edit </th>
                <th class="text-uppercase">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($photosAlbuns as $photo) { ?>


            <tr>
                <td><?= $photo->getTitle() ?></td>
                <td><img src="../img/<?= $photo->getFolder(); ?>/<?= $photo->getPhoto() ?>" style="width: 100px;"
                        class="img-responsive"></td>
                <td>
                    <a class="btn btn-primary font-weight-bold text-uppercase"
                        href="album?title=<?= $photo->getTitle(); ?>"><span class="fas fa-edit"></span> Edit</a>
                </td>
                <td><a class="btn btn-danger text-uppercase font-weight-bold"
                        onclick="return confirm('are you sure that you want to delete this?');"
                        href="processes/delete?id=<?= $photo->getId(); ?>&table=photos_gallery&page=albuns&folder=<?= $photo->getFolder() ?>&title=<?= $photo->getTitle() ?>&photo=<?= $photo->getPhoto() ?>">
                        <span class="fas fa-trash"></span> Delete
                    </a>
                </td>
            </tr>

            <?php } ?>
        </tbody>
    </table>

</div>
</body>