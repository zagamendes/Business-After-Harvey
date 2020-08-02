<?php
isset($_GET["error"]) ? $error = $_GET["error"] : $error = false;

isset($_GET["status"]) ? $status = $_GET["status"] : $status = "";




if ($status == "ok") { ?>
	<script type="text/javascript">
		Notification.success("Operation realized with success!");
	</script>
<?php
}
if ($status == "error") { ?>
	<script type="text/javascript">
		Notification.erro("<?= $_GET["
    error "] ?>");
	</script>
<?php }

if ($status == "sent") { ?>
	<script type="text/javascript">
		Notification.erro("<?= $_GET["
    error "] ?>");
	</script>
<?php } ?>