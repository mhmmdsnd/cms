<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
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
	
});
</script>
<div class="widget-box">
    <div class="widget-header widget-header-blue widget-header-flat">
        <h4 class="widget-title lighter">Add / Update Group</h4>
    </div>
<div class="widget-body">
    <div class="widget-main">
        <div id="fuelux-wizard-container">
            <div class="step-content pos-rel">
            <form class="form-horizontal" method="post" id="grpuser_form" name="grpuser_form">
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Group Name : </label>
                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <input type="text" name="groupname" id="groupname" class="col-xs-12 col-sm-6" />
                        </div>
                    </div>
                </div>
                <div class="wizard-actions">
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
<div class="widget-box">
    <div class="widget-header widget-header-blue widget-header-flat">
        <h4 class="widget-title lighter">Add / Update Group</h4>
    </div>
<div class="widget-body">
    <div class="widget-main">
        <div id="fuelux-wizard-container">
            <div class="step-content pos-rel">
            <form class="form-horizontal" method="post" id="grpuser_form" name="grpuser_form">
            <input id="groupid" name="groupid" type="hidden" value="<?php echo $detail->groupid ?>" />
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Group Name : </label>
                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <input type="text" name="groupname" id="groupname" class="col-xs-12 col-sm-6" value="<?php echo $detail->groupName ?>" />
                        </div>
                    </div>
                </div>
                <div class="wizard-actions">
                <input type="submit" name="action" value="Save" class="btn btn-primary" />
				<input type="button" value="Cancel" class="btn btn-primary" onclick="document.location.replace('<?php echo base_url();?>group');" />
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<?php } ?>
