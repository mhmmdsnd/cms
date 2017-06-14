<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.ui.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css" />
<script type="text/javascript">
$(document).ready(function()
{
	$("#code").autocomplete({
      minLength: 1,
      source:
        function(req, add ){
          $.ajax({
            url: "<?php echo base_url(); ?>supplier/lookup",
            dataType: 'json',
            type: 'POST',
            data: req,
            success: function(data){
              if(data.response =='true'){
			  	add(data.message);
              }
            }
          });
        },
		select:function (event,ui) {
			$("#id").val(ui.item.id);
			$("#code").val(ui.item.code);
			$("#name").val(ui.item.name);
			$("#address").val(ui.item.address);
		}
	});
	$("#productCode").autocomplete({
      minLength: 1,
      source:
        function(req, add ){
          $.ajax({
            url: "<?php echo base_url(); ?>product/lookup",
            dataType: 'json',
            type: 'POST',
            data: req,
            success: function(data){
              if(data.response =='true'){
			  	add(data.message);
              }
            }
          });
        },
		select:function (event,ui) {
			$("#productId").val(ui.item.id);
			$("#productName").val(ui.item.productName);
		}
	});
});
</script>
<?php if ($_SERVER['REQUEST_URI'] == "/cms/purchase/create") { ?>
<div class="col-lg-12">
<div class="panel panel-default">
	<div class="panel-heading">Add Purchase</div>
	<div class="panel-body">
    <div class="row">
    	<div class="col-lg-6">
        <form method="post" id="purchase_form" name="purchase_form" enctype="multipart/form-data">
        <div class="form-group">
        <label>Supplier Id</label>
        <input id="id" name="id" type="hidden"/><input id="code" name="code" type="text" maxlength="20" class="form-control" value="" />
        <input id="name" name="name" type="text" maxlength="20" disabled="disabled" readonly="readonly" class="form-control" value="" /><br>
		<label>Address</label>
		<textarea id="address" name="address" class="form-control" disabled="disabled"></textarea><br>
		<label>Purchase Desc</label>
		<textarea id="purchasedesc" name="purchasedesc" class="form-control"></textarea>
		<label>Product Id</label>
        <input id="productId" name="productId" type="hidden"/><input id="productCode" name="productCode" type="text" maxlength="20" class="form-control" value="" />
        <input id="productName" name="productName" type="text" maxlength="20" disabled="disabled" readonly="readonly" class="form-control" value="" /><br>
		<label>Quantity</label>
		<input id="purchaseqty" name="purchaseqty" type="text" maxlength="20" class="form-control" value="" /><br>
		<label>Price</label>
		<input id="purchaseprice" name="purchaseprice" type="text" maxlength="20" class="form-control" value="" /><br>
		<input type="submit" name="action" value="Save" class="btn btn-primary" />
		<input type="button" value="Cancel" class="btn btn-primary" onclick="document.location.replace('<?php echo base_url();?>purchase');" />
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
	<div class="panel-heading">Update Purchase</div>
	<div class="panel-body">
    <div class="row">
    	<div class="col-lg-6">
        <form method="post" id="req_form" name="req_form" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<? echo $detail->buyId ?>" />
        <div class="form-group">
        <label>Supplier Id</label>
        <input id="id" name="id" type="hidden" value="<? echo $detail->supplier_id ?>"/><input id="code" name="code" disabled="disabled" readonly="readonly" type="text" maxlength="20" class="form-control" value="<? echo $detail->code ?>" />
        <input id="name" name="name" type="text" maxlength="20" disabled="disabled" readonly="readonly" class="form-control" value="<? echo $detail->name ?>" /><br>
		<label>Address</label>
		<textarea id="address" name="address" class="form-control" disabled="disabled"><? echo $detail->address ?></textarea><br>
		<label>Purchase Desc</label>
		<textarea id="purchasedesc" name="purchasedesc" class="form-control" disabled="disabled"><? echo $detail->buyDescription ?></textarea>
		<label>Product Name</label>
		<input id="productId" name="productId" type="hidden" value="<? echo $detail->buyItemId ?>"/>
        <input id="productCode" name="productCode" type="text" maxlength="20" disabled="disabled" readonly="readonly" class="form-control" value="<? echo $detail->ProductCode ?>" />
        <input id="productName" name="productName" type="text" maxlength="60" disabled="disabled" readonly="readonly" class="form-control" value="<? echo $detail->ProductName ?>" />
		<label>Quantity</label>
		<input id="purchaseqty" name="purchaseqty" type="text" maxlength="20" disabled="disabled" readonly="readonly" class="form-control" value="<? echo $detail->buyQty ?>" /><br>
		<label>Price</label>
		<input id="purchaseprice" name="purchaseprice" type="text" maxlength="20" disabled="disabled" readonly="readonly" class="form-control" value="<? echo $detail->buyPrice ?>" /><br>
		<!--<input type="submit" name="action" value="Update" class="btn btn-primary" /> -->
		<input type="button" value="Cancel" class="btn btn-primary" onclick="document.location.replace('<?php echo base_url();?>purchase');" />
        </div>
        </form>
        </div>
    </div>
    </div>
</div>                       
</div>

<?php } ?>
