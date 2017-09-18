<script type="text/javascript">
$(document).ready(function(){
	$(".select2").select2();
});
</script>
<!-- START CREATE FORM INVENTORY IN -->
<?php if ($_SERVER['PATH_INFO'] == "/transfer/create") { ?>
<div class="box">
<div class="box-header with-border">
  <h3 class="box-title">Create Transfer Order</h3>
</div>
<form class="form-horizontal" method="post" id="inventoryin_form" name="inventoryin_form">
<div class="box-body">
<div class="row">
<div class="col-md-4">
  <div class="box-body">
      <!-- AREA 1 -->
      <div class="form-group">
        <label>Departed</label>
         <select class="form-control" style="width: 100%;">
          <option selected="selected">JKT - Jakarta</option>
          <option>SUB - Surabaya</option>
          <option>MDN - Medan</option>
          <option>MKS - Makassar</option>
          <option>DPS - Denpasar</option>
        </select>
      </div>
      <div class="form-group">
      <label>Transit</label>
        <select class="form-control select2" multiple="multiple" data-placeholder="Select Transit" style="width: 100%;">
          <option>JKT - Jakarta</option>
          <option>SUB - Surabaya</option>
          <option>MDN - Medan</option>
          <option>MKS - Makassar</option>
          <option>DPS - Denpasar</option>
        </select>
        
      </div>
      <div class="form-group">
        <label>Category</label>
         <select class="form-control" style="width: 100%;">
          <option selected="selected">Chemical</option>
          <option>Document</option>
          <option>Parts</option>
          <option>Wheel</option>
        </select>
      </div>
      <div class="form-group">
        <label>Quantity</label>
         <input type="text" class="form-control">
      </div>
      <div class="form-group">
        <label>Description</label>
         <textarea name="test" class="form-control"></textarea>
      </div>
      
      <!-- /.form group -->
  </div>
</div>
<!-- /.col (left) -->
<div class="col-md-4">
  <div class="box-body">
      <div class="form-group">
        <label>Destination</label>
         <select class="form-control" style="width: 100%;">
          <option>JKT - Jakarta</option>
          <option>SUB - Surabaya</option>
          <option selected="selected">MDN - Medan</option>
          <option>MKS - Makassar</option>
          <option>DPS - Denpasar</option>
        </select>
      </div>
      <div class="form-group">
        <label>PIC Destination</label>
         <input type="text" class="form-control">
      </div>
    </div>
</div>
<!-- /.col (right) -->
</div>
</div>
<div class="box-footer">
<input type="submit" name="action" value="Save" class="btn btn-primary" />
<input type="button" value="Cancel" class="btn btn-primary" onclick="document.location.replace('<?php echo base_url();?>transfer');" />
</div>
</form>
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