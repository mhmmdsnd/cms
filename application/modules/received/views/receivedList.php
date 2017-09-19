<script>
    $(document).ready(function() {
        $('#dataTables-transfer').DataTable({
                responsive: true
        });
    });
</script>
<!-- Default box -->
<div class="box">
<div class="box-header with-border">
  <h3 class="box-title">Received TO</h3>
  <div class="box-tools pull-right">
  </div>
</div>
<div class="box-body">
<table class="table table-striped table-bordered table-hover" id="dataTables-transfer">
    <thead>
        <tr>
        <th>No</th>
        <th>TO Number</th>
        <th>TO Date</th>
        <th>From</th>
        <th>Destination</th>
        <th>Status</th>	
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
    	<tr>
        <td>1</td>
        <td>TO532544</td>
        <td><? echo date('d-m-Y'); ?></td>
        <td>MDN - Medan</td>
        <td>DPS - Denpasar</td>
        <td>Transit</td>	
        <td><a href="<?php echo base_url();?>received/update/2"><img src="<?php echo base_url();?>assets/images/edit.png" alt="Received" border="0" title="Received" /></a></td>
        </tr>
        <tr>
        <td>2</td>
        <td>TO532546</td>
        <td><? echo date('d-m-Y'); ?></td>
        <td>MDN - Medan</td>
        <td>DPS - Denpasar</td>
        <td>Transit</td>	
        <td><a href="#"><img src="<?php echo base_url();?>assets/images/edit.png" alt="Received" border="0" title="Received" /></a></td>
        </tr>
        <tr>
        <td>3</td>
        <td>TO532545</td>
        <td><? echo date('d-m-Y'); ?></td>
        <td>JKT - Jakarta</td>
        <td>DPS - Denpasar</td>
        <td>Transit</td>	
        <td><a href="#"><img src="<?php echo base_url();?>assets/images/edit.png" alt="Received" border="0" title="Received" /></a></td>
        </tr>
    </tbody>
</table>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->