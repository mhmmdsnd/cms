<script type="text/javascript" src="<?php echo base_url(); ?>assets/public/themes/default/js/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/public/themes/default/js/jquery.validate.js"></script>
<link href="<?php echo base_url(); ?>assets/public/themes/default/css/jquery-ui.css" rel="stylesheet" type="text/css" >
<script type="text/javascript">
$(document).ready(function(){
	$("#supplierCode").autocomplete({
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
			$("#supplierId").val(ui.item.supplierId);
			$("#supplierName").val(ui.item.supplierName);
			$("#supplierAddress").val(ui.item.supplierAddress);
		}
	});
	$("#whCode").autocomplete({
	      minLength: 1,
	      source:
	        function(req, add ){
	          $.ajax({
	            url: "<?php echo base_url(); ?>warehouse/lookup",
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
				$("#whId").val(ui.item.id);
				$("#whName").val(ui.item.whName);
			}
	    });	
});
</script>
<!-- START CREATE FORM INVENTORY IN -->
<?php if ($_SERVER['REQUEST_URI'] == "/inventory/create") { ?>
<script type="text/javascript">
$(document).ready(function(){
	var i=0;
	$("#add_row").click(function(){
     $('#addr'+i).html("<td><input id='itemId"+i+"' name='itemId"+i+"' type='hidden' /><input id='itemCode"+i+"' name='itemCode"+i+"' type='text' class='form-control' /></td><td><input id='itemName"+i+"' name='itemName"+i+"' type='text' readonly class='form-control' /> </td><td><input id='qty"+i+"' name='qty"+i+"' type='text' class='form-control' onchange='inventoryin_form.total"+i+".value=hitung(this.value,inventoryin_form.price"+i+".value);' /></td><td><input id='price"+i+"' name='price"+i+"' type='text' class='form-control' value='100000' /></td><td><input id='total"+i+"' name='total"+i+"' type='text' value='0' readonly class='form-control calc' /></td>");
     $('#tblProduk').append('<tr id="addr'+(i+1)+'"></tr>');    
     	var $tblitem = $("#tblProduk tbody tr");
	     $tblitem.each(function (index) {
	    	var $tblitm = $(this);
	    	//autocomplete i
	    	$tblitm.find("#itemCode"+i).autocomplete({
 			minLength: 1,
 		    source:
 		      function(req, add ){
 		        $.ajax({
 		          url: "<?php echo base_url(); ?>item/lookup",
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
 	 			$tblitm.find("#itemId"+(i-1)).val(ui.item.id);
 	 			$tblitm.find("#itemName"+(i-1)).val(ui.item.itemName);
 	 			$tblitm.find("#price"+(i-1)).val(ui.item.itempriceBuy);
 			}
 			});
	    	//sum values
	    	$("#price"+i+", #total"+i).prop('readonly', true);
			var gTotal = 0;
			$tblitm.find('#qty'+i).on('change', function (){
				$('input.calc').each(function(){
					var sum = +this.value || 0;
					gTotal += sum;
				});
				$("#gtotal").val(gTotal.toFixed(2));
			});
     	});
     i++;
 	});
});
function hitung (qty,price)
{
	subTotal = parseInt(qty, 10) * parseFloat(price);
	if (!isNaN(subTotal)) {
		return subTotal.toFixed(2);
	}
}
</script>
<div class="col-lg-12">
<div class="panel panel-default">
	<div class="panel-heading">Add / Update</div>
	<div class="panel-body">
    <div class="row">
    	<form method="post" id="inventoryin_form" name="inventoryin_form">
        <div class="col-lg-6">
        <div class="form-group">
        <label>Supplier Name</label>
        <input type="hidden" name="supplierId" id="supplierId"/><input type="text" id="supplierCode" name="supplierCode" class="form-control" />
  		<input type="text" id="supplierName" name="supplierName" readonly class="form-control" />
        <label>Address</label>
        <textarea id="supplierAddress" name="supplierAddress" readonly class="form-control" cols="40" rows="3"></textarea>
        <label>Warehouse</label>
        <input id="whId" name="whId" type="hidden"/><input type="text" id="whCode" name="whCode" class="form-control" />
  		<input type="text" id="whName" name="whName" readonly class="form-control" />
        </div>
        </div>
        <div class="col-lg-6">
        <div class="form-group">
        <label>Date</label>
        <input id="transDate" name="transDate" type="text" readonly class="form-control" value="<?php echo date('Y-m-d') ?>" />
        <label>Description</label>
        <textarea rows="2" name="transDescription" class="form-control" ></textarea>
        <label>Grand Total</label>
        <input id="gtotal" name="gtotal" type="text" maxlength="10" readonly class="form-control" value="0" />
        </div>
        </div>
        <div class="col-lg-10">
        <div class="table-responsive table-bordered">
		<table class="table" id="tblProduk">
			<thead>
				<tr>
				<th>Item Code</th>
				<th>Item Name</th>
				<th>Qty</th>
				<th>Price</th>
				<th>Total</th>
			  	</tr>
		  	</thead>
	  	<tbody>
	  	  <tr id="addr0"></tr>
        
	  	</tbody>
	  	</table>
		</div><br>
		<input type="button" id="add_row" class="btn btn-default pull-left" value="Add Row">&nbsp;
		<input type="submit" name="action" value="Save" class="btn btn-primary" />
		<input type="button" value="Cancel" class="btn btn-primary" onclick="document.location.replace('<?php echo base_url();?>inventory');" />
        </div>
        </form>
     </div>
     </div>
     </div>
</div>

<!-- END CREATE FORM REQUEST CHILLER -->
<?php } else { ?>
<!-- START UPDATE FORM REQUEST CHILLER -->
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">Add / Update</div>
<div class="panel-body">
	<div class="row">
	<form method="post" id="request_form" name="request_form">
	<input type="hidden" name="id" value="<?php echo $detail->transId ?>" />
	<div class="col-lg-6">
        <div class="form-group">
        <label>Trans Number</label>
        <input id="transNumber" name="transNumber" type="text" readonly class="form-control" value="<?php echo $detail->transNumber ?>" />
        <label>Supplier Name</label>
        <input type="hidden" name="supplierId" id="supplierId" value="<?php echo $detail->supplierId ?>" /><input type="text" id="supplierCode" name="supplierCode" class="form-control" />
  		<input type="text" id="supplierName" name="supplierName" readonly class="form-control" />
        <label>Address</label>
        <textarea id="supplierAddress" name="supplierAddress" readonly class="form-control" cols="40" rows="3"></textarea>
        <label>Warehouse</label>
        <input id="whId" name="whId" type="hidden" value="<?php echo $detail->warehouseId ?>"/><input type="text" id="whCode" name="whCode" class="form-control" />
  		<input type="text" id="whName" name="whName" readonly class="form-control" />
        </div>
        </div>
        <div class="col-lg-6">
        <div class="form-group">
        <label>Date</label>
        <input id="transDate" name="transDate" type="text" readonly class="form-control" value="<?php echo $detail->transDate ?>" />
        <label>Description</label>
        <textarea rows="2" name="transDescription" class="form-control" ><?php echo $detail->transDescription ?></textarea>
        <label>Grand Total</label>
        <input id="gtotal" name="gtotal" type="text" maxlength="10" readonly class="form-control" value="<?php echo $detail->transGTotal ?>" />
        </div>
        </div>
	</form>
	</div>
</div>
</div>
</div>
<!-- END UPDATE FORM REQUEST CHILLER -->
<?php } ?>