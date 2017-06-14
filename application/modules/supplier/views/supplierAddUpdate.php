<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#supplier_form").validate({
		rules: {
			code: {
				required:true
			},
			name: {
				required:true
			}
		}
	});
});
</script>
<?php if ($_SERVER['REQUEST_URI'] == "/cms/supplier/create") { ?>
<div class="col-lg-12">
<div class="panel panel-default">
	<div class="panel-heading">Add / Update</div>
	<div class="panel-body">
    <div class="row">
    	<div class="col-lg-6">
        <form method="post" id="supplier_form" name="supplier_form" enctype="multipart/form-data">
        <div class="form-group">
        <label>Supplier Code</label>
		<input id="code" name="code" type="text" maxlength="60" class="form-control" value="" />
		<label>Supplier Name</label>
		<input id="name" name="name" type="text" maxlength="60" class="form-control" value="" />
		<label>Address</label>
		<textarea id="address" name="address" class="form-control"></textarea>
		<label>No Telp</label>
		<input id="notelp" name="notelp" type="text" maxlength="20" class="form-control" value="" /><br>
		<input type="submit" name="action" value="Save" class="btn btn-primary" />
		<input type="button" value="Cancel" class="btn btn-primary" onclick="document.location.replace('<?php echo base_url();?>supplier');" />
        </div>
        </form>
        </div>
    </div>
    </div>
</div>                       
</div>

<?php } else { ?>

<div class="col-lg-12">
<div class="panel panel-default">
	<div class="panel-heading">Add / Update</div>
	<div class="panel-body">
    <div class="row">
    	<div class="col-lg-6">
        <form method="post" id="supplier_form" name="supplier_form" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $detail->id ?>" />
        <div class="form-group">
        <label>Supplier Code</label>
		<input id="code" name="code" readonly="readonly" type="text" maxlength="60" class="form-control" value="<?php echo $detail->code ?>" />
		<label>Supplier Name</label>
		<input id="name" name="name" type="text" maxlength="60" class="form-control" value="<?php echo $detail->name ?>" />
		<label>Address</label>
		<textarea id="address" name="address" class="form-control"><?php echo $detail->address ?></textarea>
		<label>No Telp</label>
		<input id="notelp" name="notelp" type="text" maxlength="20" class="form-control" value="<?php echo $detail->notelp ?>" /><br>
		<input type="submit" name="action" value="Update" class="btn btn-primary" />
		<input type="button" value="Cancel" class="btn btn-primary" onclick="document.location.replace('<?php echo base_url();?>supplier');" />
        </div>
        </form>
        </div>
    </div>
    </div>
</div>                       
</div>

<?php } ?>
