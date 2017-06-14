<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<?php if ($_SERVER['REQUEST_URI'] == "/cms/user/create") { ?>
<script type="text/javascript">
$(document).ready(function(){
	$("#user_form").validate({
		rules: {
			loginname: {
				required:true
			},
			password : {
				required:true,
				minlength:4
			},
			repassword : {
				required: true,
				equalTo: "#password"
			}
		},
		messages : {
			loginname : {
				required : " Insert Loginname."
			},password : {
				required : " Insert Password.",
				minlength : " Password is too short."
			},
			repassword : {
				required : " Repeat Password.",
				equalTo : " Password is not match."
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
        <form method="post" id="user_form" name="user_form">
        <div class="form-group">
        <label>First Name</label>
        <input id="firstname" name="firstname" type="text" maxlength="20" class="form-control" value="" />
        <label>Last Name</label>
		<input id="lastname" name="lastname" type="text" maxlength="20" class="form-control" value="" />
		<label>Login Name</label>
		<input id="loginname" name="loginname" type="text" maxlength="20" class="form-control" value="" /><br>
		<label>Group</label>
		<?php $extra = array('class' => 'form-control'); echo form_dropdown("groupId",$getgroup,'',$extra) ?>
		<label>Password</label>
		<input id="password" name="password" type="password" maxlength="20" class="form-control" value="" /><br>
		<label>Confirm Password</label>
		<input id="repassword" name="repassword" type="password" maxlength="20" class="form-control" value="" /><br>
		<input type="submit" name="action" value="Save" class="btn btn-primary" />
		<input type="button" value="Cancel" class="btn btn-primary" onclick="document.location.replace('<?php echo base_url();?>user');" />
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
        <form method="post" id="user_form" name="user_form">
        <input type="hidden" name="id" value="<?php echo $detail->id ?>" />
        <div class="form-group">
        <label>First Name</label>
        <input id="firstname" name="firstname" type="text" maxlength="20" class="form-control" value="<?php echo $detail->firstname ?>" />
        <label>Last Name</label>
		<input id="lastname" name="lastname" type="text" maxlength="20" class="form-control" value="<?php echo $detail->lastname ?>" />
		<label>Login Name</label>
		<input id="loginname" name="loginname" type="text" maxlength="20" class="form-control" value="<?php echo $detail->loginname ?>" />
		<label>Group</label>
		<?php $extra = array('class' => 'form-control'); echo form_dropdown("groupId",$getgroup,$detail->groupId,$extra) ?>
		<label>Password</label>
		<input id="password" name="password" type="password" maxlength="20" class="form-control" value="" />
		<label>Confirm Password</label>
		<input id="repassword" name="repassword" type="password" maxlength="20" class="form-control" value="" /><br>
		<input type="submit" name="action" value="Update" class="btn btn-primary" />
		<input type="button" value="Cancel" class="btn btn-primary" onclick="document.location.replace('<?php echo base_url();?>user');" />
        </div>
        </form>
        </div>
    </div>
    </div>
</div>                       
</div>

<?php } ?>
