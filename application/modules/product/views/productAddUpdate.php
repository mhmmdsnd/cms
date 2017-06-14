<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#product_form").validate({
		rules: {
			productCode: {
				required:true
			},
			productName: {
				required:true
			},
			prodtypeId: {
				required:true
			}
		}
	});
});
</script>
<?php if ($_SERVER['REQUEST_URI'] == "/cms/product/create") { ?>
<div class="col-lg-12">
<div class="panel panel-default">
	<div class="panel-heading">Add / Update</div>
	<div class="panel-body">
    <div class="row">
    	<div class="col-lg-6">
        <form method="post" id="product_form" name="product_form" enctype="multipart/form-data">
        <div class="form-group">
        <label>Product Code</label>
        <input id="productCode" name="productCode" type="text" maxlength="25" class="form-control" value="" />
        <label>Product Name</label>
		<input id="productName" name="productName" type="text" maxlength="60" class="form-control" value="" />
		<label>Product Type</label>
        <?php $extra = array('class' => 'form-control'); echo form_dropdown('prodtypeId',$dropdown,'',$extra); ?>
        <label>Product Desc</label>
		<textarea id="productdesc" name="productdesc" class="form-control"></textarea>
		<label>Quantity</label>
		<input id="productqty" name="productqty" type="text" maxlength="20" class="form-control" value="" /><br>
		<label>Price</label>
		<input id="productprice" name="productprice" type="text" maxlength="20" class="form-control" value="" /><br>
		<input type="submit" name="action" value="Save" class="btn btn-primary" />
		<input type="button" value="Cancel" class="btn btn-primary" onclick="document.location.replace('<?php echo base_url();?>product');" />
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
        <form method="post" id="product_form" name="product_form" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $detail->ProductId ?>" />
        <div class="form-group">
        <label>Product Code</label>
        <input id="productCode" name="productCode" type="text" maxlength="25" class="form-control" value="<?php echo $detail->ProductCode ?>" />
        <label>Product Name</label>
		<input id="productName" name="productName" type="text" maxlength="60" class="form-control" value="<?php echo $detail->ProductName ?>" />
		<label>Product Type</label>
        <?php $extra = array('class' => 'form-control'); echo form_dropdown('prodtypeId',$dropdown,$detail->ProductType,$extra); ?>
        <label>Product Desc</label>
		<textarea id="productdesc" name="productdesc" class="form-control"><?php echo $detail->ProductDesc ?></textarea>
		<label>Quantity</label>
		<input id="productqty" name="productqty" type="text" maxlength="20" disabled="disabled" class="form-control" value="<?php echo $detail->productQty ?>" /><br>
		<label>Price</label>
		<input id="productprice" name="productprice" type="text" maxlength="20" class="form-control" value="<?php echo $detail->ProductPrice ?>" /><br>
		<input type="submit" name="action" value="Update" class="btn btn-primary" />
		<input type="button" value="Cancel" class="btn btn-primary" onclick="document.location.replace('<?php echo base_url();?>product');" />
        </div>
        </form>
        </div>
    </div>
    </div>
</div>                       
</div>

<?php } ?>
