<script type="text/javascript" src="<?php echo base_url(); ?>assets/public/themes/default/js/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/public/themes/default/js/jquery.validate.js"></script>
<?php if ($_SERVER['REQUEST_URI'] == "/cms/group/create") { ?>
<script type="text/javascript">
$(document).ready(function(){
	$("#grpuser_form").validate({
		rules: {
			groupname: {
				required:true
			}
		},
		messages : {
			groupname : {
				required : " Insert Groupname."
			}
		}
	});
	
});
</script>
<div class="col-lg-12">
<div class="panel panel-default">
	<div class="panel-heading">Add / Update</div>
	<div class="panel-body">
    <div class="row">
    	<div class="col-lg-6">
        <form method="post" id="grpuser_form" name="grpuser_form">
		<div class="form-group">
        <label>Group Name</label>
        <input id="groupname" name="groupname" type="text" maxlength="20" class="form-control" value="" /><br>
        <input type="submit" name="action" value="Save" class="btn btn-primary" />
		<input type="button" value="Cancel" class="btn btn-primary" onclick="document.location.replace('<?php echo base_url();?>group');" />
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
        <form method="post" id="grpuser_form" name="grpuser_form">
		<div class="form-group">
        <label>Group Name</label>
        <input id="groupname" name="groupname" type="text" maxlength="20" class="form-control" value="<?php echo $detail->groupName ?>" /><br>
        <input type="submit" name="action" value="Update" class="btn btn-primary" />
		<input type="button" value="Cancel" class="btn btn-primary" onclick="document.location.replace('<?php echo base_url();?>group');" />
        </div>
        </form>
        </div>
    </div>
    </div>
</div>                       
</div>
<?php } ?>
