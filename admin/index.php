<?php
include("dashboard-header.php");

?>
<style type="text/css">
.row {
    margin-bottom: 20px;
}

.col-sm-6 {
    height: 100px;
}

.label-dashboard {

    height: 100px;
    padding-top: 40px;
    background: #e2ba1f;
    color: white;
}

.label-dashboard:hover {
    transition: all .3s;
    background: #c72328;
    color: white;
}

.col-sm-6 button {
    padding-top: 10px !important;
    color: white;
}

.label-dashboard:focus {
    color: white;
    outline: none;
}
</style>




<div class="container">

    <?php
	include("notification.php");
	?>

    <div class="row" style="margin-top: 20px;">

        <div class="col-sm-6">
            <a class="btn  btn-lg btn-block text-uppercase font-weight-bold label-dashboard" href="event">
                <span class="fas fa-plus"></span> Add a new Event
            </a>
        </div>

        <div class="col-sm-6">
            <button class="btn btn-lg btn-block text-uppercase font-weight-bold label-dashboard" data-toggle="modal"
                data-target="#album">
                <span class="fas fa-images"></span> Add a New Album
            </button>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-6">
            <button class="btn btn-lg btn-block text-uppercase font-weight-bold label-dashboard" data-toggle="modal"
                data-target="#home">
                <span class="fas fa-images"></span> Add photos to home page
            </button>
        </div>

        <div class="col-sm-6">
            <button class="btn btn-lg btn-block text-uppercase font-weight-bold label-dashboard" data-toggle="modal"
                data-target="#about">
                <span class="fas fa-images"></span> Add photos to about page
            </button>
        </div>
    </div>



    <div class="modal fade" id="album">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Album Register</h3>
                    <div class="modal-body">

                        <form method="post" action="processes/photo" enctype="multipart/form-data">
                            <input type="hidden" name="table" value="photos_gallery">
                            <div class="form-group">
                                <label class="text-uppercase">Ttitle:</label>
                                <input type="text" required name="title" class="form-control"
                                    placeholder="Name of the Event">
                            </div>
                            <div class="form-group">
                                <label class="btn  btn-primary font-weight-bold btn-block text-uppercase">select photos
                                    <span class="fas fa-images"></span>
                                    <input type="file" style="position: absolute;z-index: -1; width: 0;" required
                                        name="photosDash[]" multiple class="form-control">
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase">Description:</label>
                                <textarea required name="description" class="form-control" id="album-description"
                                    maxlength="30" required rows="4">
								</textarea>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <button name="dashboard"
                                        class="btn btn-success btn-block btn-lg text-uppercase font-weight-bold">
                                        <span class="fas fa-check-circle"></span> Save
                                    </button>
                                </div>

                                <div class="col-sm-6">
                                    <button type="button"
                                        class="btn btn-danger btn-block btn-lg  text-uppercase font-weight-bold"
                                        data-dismiss="modal">
                                        <span class="fas fa-times"></span> Close
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="about">
        <form method="post" action="processes/photo" enctype="multipart/form-data">
            <input type="hidden" name="table" value="photos_about">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title font-weight-bold text-capitalize">About page photos </h3>
                    </div>
                    <div class="modal-body">
                        <label class="btn btn-primary btn-lg btn-block font-weight-bold text-uppercase">
                            <span class="fas fa-images"></span> select pictures
                            <input type="file" name="photos[]" multiple
                                style="position: absolute; z-index: -1; width: 0">
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-lg text-uppercase font-weight-bold"><span
                                class="fas fa-check-circle"></span> Save</button>
                        <button class="btn btn-danger text-uppercase btn-lg font-weight-bold" data-dismiss="modal"><span
                                class="fas fa-times"></span> Close</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="home">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title font-weight-bold text-capitalize">About home photos </h3>
                </div>
                <div class="modal-body">
                    <form method="post" action="processes/photo" enctype="multipart/form-data">
                        <input type="hidden" name="table" value="photos_slideshow">
                        <div class="form-group">
                            <label class="text-uppercase">Ttitle:</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="text-uppercase">Short Description:</label>
                            <textarea name="description" class="form-control" rows="3">
							</textarea>
                        </div>

                        <div class="form-group">
                            <label class="btn  btn-primary font-weight-bold btn-block text-uppercase">select photo <span
                                    class="fas fa-images"></span>
                                <input type="file" style="position: absolute;z-index: -1; width: 0;" required
                                    name="photo" class="form-control">
                            </label>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <button name="dashboard"
                                    class="btn btn-success btn-block btn-lg text-uppercase font-weight-bold">
                                    <span class="fas fa-check-circle"></span> Save
                                </button>
                            </div>

                            <div class="col-sm-6">
                                <button type="button"
                                    class="btn btn-danger btn-block btn-lg  text-uppercase font-weight-bold"
                                    data-dismiss="modal">
                                    <span class="fas fa-times"></span> Close
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
CKEDITOR.replace('description', {
    language: "en",
    extraPlugins: 'wordcount',
    wordcount: {
        showCharCount: true,
        maxCharCount: 360
    }
});
</script>

<?php
include('footer.php');
?>