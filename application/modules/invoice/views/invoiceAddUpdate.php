<script src="<? echo base_url(); ?>assets/js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datepicker3.min.css" />
<script type="text/javascript">
$(document).ready(function()
{
	$( "#invoice_form" ).validate({
	 rules:{
		 code:{required:true},
		 productCode:{required:true},
		 orderPhone:{number:true},
		 invoiceqty:{number:true}
		 }
 	});
	$("#deliveryDate").datepicker({
		autoclose: true,
		todayHighlight: true
	});
	$("#code").autocomplete({
      minLength: 1,
      source:
        function(req, add ){
          $.ajax({
            url: "<?php echo base_url(); ?>customer/lookup",
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
			$("#invoiceprice").val(ui.item.productPrice);
			$("#stok").val(ui.item.stok);

		}
	});
});
function cek_stok(invoiceqty)
{
	qty = parseFloat(invoice_form.invoiceqty.value);
	stok = parseFloat(invoice_form.stok.value);
	var maxvalue = document.getElementById(invoiceqty);
	if(qty > stok) 
	{
		javascript:alert('Quantity Item Out of Order\nAvailable Delivered are '+stok+' piece(s)\nQty akan direset menjadi default 1');
		maxvalue.value = 1;
	}
}
function totalOrder(qty,price)
{
	var total;
	price = parseInt(price.value);
	total = parseInt(qty.value) * parseInt(price);
	if(isNaN(total)) total = 0;
	return total;
}
</script>
<?php if ($_SERVER['REQUEST_URI'] == "/cms/invoice/create") { ?>
<div class="col-lg-12">
<div class="panel panel-default">
	<div class="panel-heading">Add Invoice</div>
	<div class="panel-body">
    <div class="row">
    	<div class="col-lg-6">
        <form method="post" id="invoice_form" name="invoice_form" enctype="multipart/form-data">
        <div class="form-group">
        <label>Delivery Date</label>
        <input id="deliveryDate" name="deliveryDate" type="text" maxlength="25" readonly="readonly" class="form-control" value="" data-date-format="yyyy-mm-dd" />
        <label>Customer Id</label>
        <input id="id" name="id" type="hidden"/><input id="code" name="code" type="text" maxlength="20" class="form-control" value="" />
        <input id="name" name="name" type="text" maxlength="20" disabled="disabled" readonly="readonly" class="form-control" value="" /><br>
		<label>Address</label>
        <textarea id="address" name="address" disabled="disabled" class="form-control"></textarea>
		<label>Product Id</label>
        <input id="productId" name="productId" type="hidden"/><input id="productCode" name="productCode" type="text" maxlength="20" class="form-control" value="" />
        <input id="productName" name="productName" type="text" maxlength="20" disabled="disabled" readonly="readonly" class="form-control" value="" /><br>
		<label>Quantity</label>
		<input id="stok" name="stok" type="hidden" class="form-control"/><br>
		<input id="invoiceqty" name="invoiceqty" type="text" maxlength="20" class="form-control" onkeyup="cek_stok('invoiceqty')" value="" /><br>
		<label>Price</label>
		<input id="invoiceprice" name="invoiceprice" type="text" maxlength="20" class="form-control" value="" /><br>
		<input type="submit" name="action" value="Save" class="btn btn-primary" />
		<input type="button" value="Cancel" class="btn btn-primary" onclick="document.location.replace('<?php echo base_url();?>invoice');" />
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
	<div class="panel-heading">Update Invoice</div>
	<div class="panel-body">
    <div class="row">
    	<div class="col-lg-6">
        <form method="post" id="req_form" name="req_form" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<? echo $detail->buyId ?>" />
        <div class="form-group">
        <label>invoice Date</label>
        <input id="invoiceDate" name="invoiceDate" type="text" maxlength="25" disabled="disabled" readonly="readonly" class="form-control" value="<? echo $detail->buyDate ?>"  data-date-format="yyyy-mm-dd" />
        <label>invoice Desc</label>
		<textarea id="invoicedesc" name="invoicedesc" class="form-control" disabled="disabled"><? echo $detail->buyDescription ?></textarea>
		<label>Product Name</label>
		<input id="productId" name="productId" type="hidden" value="<? echo $detail->buyItemId ?>"/>
        <input id="productCode" name="productCode" type="text" maxlength="20" disabled="disabled" readonly="readonly" class="form-control" value="<? echo $detail->ProductCode ?>" />
        <input id="productName" name="productName" type="text" maxlength="60" disabled="disabled" readonly="readonly" class="form-control" value="<? echo $detail->ProductName ?>" />
		<label>Quantity</label>
		<input id="invoiceqty" name="invoiceqty" type="text" maxlength="20" disabled="disabled" readonly="readonly" class="form-control" value="<? echo $detail->buyQty ?>" /><br>
		<label>Price</label>
		<input id="invoiceprice" name="invoiceprice" type="text" maxlength="20" disabled="disabled" readonly="readonly" class="form-control" value="<? echo $detail->buyPrice ?>" /><br>
		<!--<input type="submit" name="action" value="Update" class="btn btn-primary" /> -->
		<input type="button" value="Cancel" class="btn btn-primary" onclick="document.location.replace('<?php echo base_url();?>invoice');" />
        </div>
        </form>
        </div>
    </div>
    </div>
</div>                       
</div>

<?php } ?>
