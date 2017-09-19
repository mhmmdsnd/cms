<script type="text/javascript">
$(document).ready(function(){
	$("#category_form").validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			categoryName: {
				required:true
			}
		},
		messages : {
			categoryName: {
				required:"Insert Category Name."
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
			form.submit();
		},
		invalidHandler: function (form) {
		}
	});
});
</script>
<?php if ($_SERVER['PATH_INFO'] == "/category/create") { ?>
<!-- Default box -->
<div class="box">
<div class="box-header with-border">
  <h3 class="box-title">Add / Update Category</h3>
</div>
<form class="form-horizontal" method="post" id="category_form" name="category_form">
<div class="box-body">
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Category Name : </label>
        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
                <input type="text" name="categoryName" id="categoryName" class="col-xs-12 col-sm-6" />
            </div>
        </div>
    </div>
</div>
<div class="box-footer">
<input type="submit" name="action" value="Save" class="btn btn-primary" />
<input type="button" value="Cancel" class="btn btn-primary" onclick="document.location.replace('<?php echo base_url();?>category');" />
</div>
</form>
</div>

<?php } else { ?>
<!-- Default box -->
<div class="box">
<div class="box-header with-border">
  <h3 class="box-title">Add / Update Category</h3>
</div>
<form class="form-horizontal" method="post" id="category_form" name="category_form">
<input type="hidden" name="id" value="<?php echo $detail->id?>" />
<div class="box-body">
<div class="form-group">
    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Category Name : </label>
    <div class="col-xs-12 col-sm-9">
        <div class="clearfix">
            <input type="text" name="categoryName" id="categoryName" class="col-xs-12 col-sm-6" value="<?php echo $detail->name ?>"/>
        </div>
    </div>
</div>
</div>
<div class="box-footer">
<input type="submit" name="action" value="Update" class="btn btn-primary" />
<input type="button" value="Cancel" class="btn btn-primary" onclick="document.location.replace('<?php echo base_url();?>category');" />
</div>
</form>
</div>
<?php } ?>