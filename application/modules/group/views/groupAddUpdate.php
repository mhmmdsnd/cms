<?php if ($_SERVER['PATH_INFO'] == "/group/create") { ?>
<script type="text/javascript">
$(document).ready(function(){
	$("#grpuser_form").validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			groupname: {
				required:true
			}
		},
		messages : {
			groupname : {
				required : " Insert Groupname."
			}
		},
		highlight: function (e) {
			$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
		},
		success: function (e) {
			$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
			$(e).remove();
		},
		errorPlacement: function (error, element) {
			error.insertAfter(element.parent());
		},
		submitHandler: function (form) {
		},
		invalidHandler: function (form) {
		}
	});
	$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
});
</script>
<!-- Default box -->
<div class="box box-default">
<div class="box-header with-border">
  <h3 class="box-title">Add / Update Group</h3>
</div>
<form class="form-horizontal" method="post" id="grpuser_form" name="grpuser_form">
<div class="box-body">
    <div class="form-group">
        <label class="control-label col-sm-2 no-padding-right">Group Name : </label>
        <div class="col-xs-6 col-sm-9">
            <div class="clearfix">
                <input type="text" name="groupname" id="groupname" class="form-control" />
            </div>
        </div>
    </div>
    <!-- iCheck -->
    <div class="box-header with-border">
      <h3 class="box-title">List of Module - Menu</h3>
    </div>
    <table class="table table-bordered">
    <tr>
      <th style="width: 10px">#</th>
      <th>Module - Menu</th>
      <th>Access</th>
    </tr>
    <tr>
      <td>1.</td>
      <td>Admin - Users</td>
      <td><input type="checkbox" class="minimal"></td>
    </tr>
  </table>
</div>
<div class="box-footer">
<input type="submit" name="action" value="Save" class="btn btn-primary" />
<input type="button" value="Cancel" class="btn btn-primary" onclick="document.location.replace('<?php echo base_url();?>group');" />
</div>
</form>
</div>

<?php } else { ?>
<!-- Default box -->
<div class="box">
<div class="box-header with-border">
  <h3 class="box-title">Add / Update Group</h3>
</div>
<form class="form-horizontal" method="post" id="grpuser_form" name="grpuser_form">
<input id="groupid" name="groupid" type="hidden" value="<?php echo $detail->groupId ?>" />
<div class="box-body">
    <div class="form-group">
        <label class="control-label col-sm-2 no-padding-right">Group Name : </label>
        <div class="col-xs-6 col-sm-9">
            <div class="clearfix">
                <input type="text" name="groupname" id="groupname" class="form-control" value="<?php echo $detail->groupName ?>"/>
            </div>
        </div>
    </div>
    <!-- iCheck -->
    <div class="box-header with-border">
      <h3 class="box-title">List of Module - Menu</h3>
    </div>
    <table class="table table-bordered">
    <tr>
      <th style="width: 10px">#</th>
      <th>Module - Menu</th>
      <th>Access</th>
    </tr>
    <tr>
      <td>1.</td>
      <td>Admin - Users</td>
      <td><input type="checkbox" class="minimal"></td>
    </tr>
  </table>
</div>
<div class="box-footer">
<input type="submit" name="action" value="Update" class="btn btn-primary" />
<input type="button" value="Cancel" class="btn btn-primary" onclick="document.location.replace('<?php echo base_url();?>group');" />
</div>
</form>
</div>

<?php } ?>
