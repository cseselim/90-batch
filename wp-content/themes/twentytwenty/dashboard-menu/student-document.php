<style type="text/css">
	.document_form_section{
		width: 800px;
	    margin: 0 auto;
	        padding-top: calc(50% - 597px);
	}
</style>
<div class="document_form_section">
	<form class="" method="post" action="<?= get_template_directory_uri() ?>/mpdf.php">
		<div class="form-group">
		    <label for="startNumber">Start Number</label>
		    <input type="number" class="form-control" id="startNumber" name="startNumber" placeholder="Start Number">
		</div>
		<div class="form-group">
		    <label for="endNumber">End Number</label>
		    <input type="number" class="form-control" id="endNumber" name="endNumber" placeholder="End Number">
		</div>

		<div class="submitButton">
			<button type="submit" class="btn btn-primary">Primary</button>
		</div>
	</form>
</div>