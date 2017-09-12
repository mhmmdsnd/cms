<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#location_form").validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			locationCode: {
				required:true
			},
			locationName: {
				required:true
			}
		},
		messages : {
			locationCode: {
				required:"Insert Location Code."
			},
			locationName: {
				required:"Insert Location Name."
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
<?php if ($_SERVER['PATH_INFO'] == "/location/create") { ?>
<div class="widget-box">
    <div class="widget-header widget-header-blue widget-header-flat">
        <h4 class="widget-title lighter">Add / Update Location</h4>
    </div>
<div class="widget-body">
    <div class="widget-main">
        <div id="fuelux-wizard-container">
            <div class="step-content pos-rel">
            <form class="form-horizontal" method="post" id="location_form" name="location_form">
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Location Code : </label>
                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <input type="text" name="locationCode" id="locationCode" class="col-xs-12 col-sm-6" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Location Name : </label>
                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <input type="text" name="locationName" id="locationName" class="col-xs-12 col-sm-6" />
                        </div>
                    </div>
                </div>
                <div class="wizard-actions">
                <input type="submit" name="action" value="Save" class="btn btn-primary" />
				<input type="button" value="Cancel" class="btn btn-primary" onclick="document.location.replace('<?php echo base_url();?>location');" />
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
        <h4 class="widget-title lighter">Add / Update Location</h4>
    </div>
<div class="widget-body">
    <div class="widget-main">
        <div id="fuelux-wizard-container">
            <div class="step-content pos-rel">
            <form class="form-horizontal" method="post" id="location_form" name="location_form">
            <input type="hidden" name="id" value="<?php echo $detail->id?>" />
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Location Code : </label>
                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <input type="text" name="locationCode" id="locationCode" class="col-xs-12 col-sm-6" value="<?php echo $detail->code ?>" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Location Name : </label>
                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <input type="text" name="locationName" id="locationName" class="col-xs-12 col-sm-6" value="<?php echo $detail->name ?>"/>
                        </div>
                    </div>
                </div>
                <div class="wizard-actions">
                <input type="submit" name="action" value="Update" class="btn btn-primary" />
				<input type="button" value="Cancel" class="btn btn-primary" onclick="document.location.replace('<?php echo base_url();?>location');" />
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php } ?>
