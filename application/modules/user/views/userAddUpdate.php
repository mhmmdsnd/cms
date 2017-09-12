<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<?php if ($_SERVER['PATH_INFO'] == "/user/create") { ?>
<script type="text/javascript">
$(document).ready(function(){
	$("#user_form").validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			loginname: {
				required:true
			},
			groupId: {
				required:true
			},
			lokasiId: {
				required:true
			},
			password : {
				required:true,
				minlength:6
			},
			repassword : {
				required: true,
				equalTo: "#password"
			}
		},
		messages : {
			loginname : {
				required : " Insert Loginname."
			},groupId : {
				required : " Please select group."
			},lokasiId : {
				required : " Please select location."
			},password : {
				required : " Insert Password.",
				minlength : " Password is too short."
			},
			repassword : {
				required : " Repeat Password.",
				equalTo : " Password is not match."
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
        <h4 class="widget-title lighter">Add / Update User</h4>
    </div>
<div class="widget-body">
    <div class="widget-main">
        <div id="fuelux-wizard-container">
            <div class="step-content pos-rel">
            <form class="form-horizontal" method="post" id="user_form" name="user_form">
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">First Name : </label>
                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <input type="text" name="firstname" id="firstname" class="col-xs-12 col-sm-6" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Last Name : </label>
                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <input type="text" name="lastname" id="lastname" class="col-xs-12 col-sm-6" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Login Name : </label>
                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <input type="text" name="loginname" id="loginname" class="col-xs-12 col-sm-6" />
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">User Group : </label>
                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <?php $extra = array('class' => 'input-medium'); echo form_dropdown("groupId",$getgroup,'',$extra) ?><br />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Location / Site : </label>
                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                       		<?php $extra = array('class' => 'input-medium'); echo form_dropdown("lokasiId",$getlokasi,'',$extra) ?><br />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Password : </label>
                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <input type="password" name="password" id="password" class="col-xs-12 col-sm-6" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Confirm Password : </label>
                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <input type="password" name="repassword" id="repassword" class="col-xs-12 col-sm-6" />
                        </div>
                    </div>
                </div>
                <div class="wizard-actions">
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
<script type="text/javascript">
$(document).ready(function(){
	$("#user_form").validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			loginname: {
				required:true
			},
			groupId: {
				required:true
			},
			lokasiId: {
				required:true
			},
			repassword : {
				equalTo: "#password"
			}
		},
		messages : {
			loginname : {
				required : " Insert Loginname."
			},groupId : {
				required : " Please select group."
			},lokasiId : {
				required : " Please select location."
			},repassword : {
				equalTo : " Password is not match."
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
        <h4 class="widget-title lighter">Add / Update User</h4>
    </div>
<div class="widget-body">
    <div class="widget-main">
        <div id="fuelux-wizard-container">
            <div class="step-content pos-rel">
            <form class="form-horizontal" method="post" id="user_form" name="user_form">
                    <input type="hidden" name="id" value="<?php echo $detail->id ?>" />
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">First Name : </label>
                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <input type="text" name="firstname" id="firstname" class="col-xs-12 col-sm-6" value="<?php echo $detail->firstname ?>"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Last Name : </label>
                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <input type="text" name="lastname" id="lastname" class="col-xs-12 col-sm-6" value="<?php echo $detail->lastname ?>"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Login Name : </label>
                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <input type="text" name="loginname" id="loginname" class="col-xs-12 col-sm-6" value="<?php echo $detail->loginname ?>" />
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">User Group : </label>
                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <?php $extra = array('class' => 'input-medium'); echo form_dropdown("groupId",$getgroup,$detail->groupId,$extra) ?><br />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Location / Site : </label>
                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                       		<?php $extra = array('class' => 'input-medium'); echo form_dropdown("lokasiId",$getlokasi,$detail->locationId,$extra) ?><br />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Password : </label>
                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <input type="password" name="password" id="password" class="col-xs-12 col-sm-6" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Confirm Password : </label>
                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <input type="password" name="repassword" id="repassword" class="col-xs-12 col-sm-6" />
                        </div>
                    </div>
                </div>
                <div class="wizard-actions">
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
