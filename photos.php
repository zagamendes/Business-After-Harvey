<?php
include_once("classes/photo.php");

if (isset($_GET["title"])) {
  $title = $_GET["title"];
} else {
  $title = "";
}

$photoDAO = new PhotoDAO();
$photos = $photoDAO->listAllContentByTitle($title);

include_once("header.php");
?>


<script type="text/javascript">
  $(document).ready(function() {
    $("#gallery").gallerie();

  });
</script>

<style>
  .col-sm-4 {
    max-height: 300px;
    overflow: hidden;
    margin-bottom: 30px;
  }

  body {
    background-color: #eee;
  }
</style>

<div class="container">
  <div id="gallery">
    <div class="row">
      <?php foreach ($photos as $photo) { ?>
        <div class="col-sm-4">

          <a href="img/<?= $photo->getFolder() ?>/<?= $photo->getPhoto() ?>">
            <img class="img-responsive img-thumbnail" src="img/<?= $photo->getFolder() ?>/<?= $photo->getPhoto() ?>">
          </a>
        </div>

      <?php } ?>


    </div>
  </div>
</div>

<?php
include_once("footer.php");
?>