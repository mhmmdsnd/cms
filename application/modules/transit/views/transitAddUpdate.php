<script type="text/javascript">
$(document).ready(function(){
	$(".select2").select2();
});
</script>

<!-- START UPDATE FORM REQUEST CHILLER -->
<div class="box">
<div class="box-header with-border">
  <h3 class="box-title">Transit Transfer Order #TO532544 </h3>
</div>
<form class="form-horizontal" method="post" id="inventoryin_form" name="inventoryin_form">
<div class="box-body">
<div class="row">
<div class="col-md-4">
  <div class="box-body">
      <!-- AREA 1 -->
      <div class="form-group">
        <label>Departed</label>
         <input type="text" class="form-control" value="MDN - Medan" disabled="disabled">
      </div>
      <div class="form-group">
        <label>Category</label>
         <select class="form-control" disabled="disabled" style="width: 100%;">
          <option selected="selected">Chemical</option>
          <option>Document</option>
          <option>Parts</option>
          <option>Wheel</option>
        </select>
      </div>
      <div class="form-group">
        <label>Quantity</label>
         <input type="text" class="form-control" disabled="disabled" value="2" >
      </div>
      <div class="form-group">
        <label>Status Package</label>
         <select class="form-control" style="width: 100%;">
          <option selected="selected">Good</option>
          <option>Scratch</option>
          <option>Damage</option>
          <option>Missing</option>
        </select>
      </div>
      <div class="form-group">
        <label>Description</label>
         <textarea name="test" class="form-control">BARANG SUDAH DITERIMA DENGAN BAIK</textarea>
      </div>
      
      <!-- /.form group -->
  </div>
</div>
<!-- /.col (left) -->
<div class="col-md-4">
  <div class="box-body">
      <div class="form-group">
        <label>Destination</label>
         <input type="text" class="form-control" value="DPS - Denpasar" disabled="disabled">
      </div>
      <div class="form-group">
        <label>PIC Destination</label>
         <input type="text" class="form-control" value="Adnan" disabled="disabled">
      </div>
    </div>
</div>
<!-- /.col (right) -->
</div>
</div>
<div class="box-footer">
<input type="submit" name="action" value="Proceed" class="btn btn-primary" />
<input type="button" value="Cancel" class="btn btn-primary" onclick="document.location.replace('<?php echo base_url();?>transit');" />
</div>
</form>
</div>
<!-- END UPDATE FORM REQUEST CHILLER -->