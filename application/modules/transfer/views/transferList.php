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
  <h3 class="box-title">Create TO</h3>
  <div class="box-tools pull-right">
  	<a href="<?php echo base_url();?>transfer/create">
    <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" title="Create">
      Create TO</button></a>
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
        <td>BDG - Bandung</td>
        <td>DPS - Denpasar</td>
        <td>Sent</td>	
        <td><a href="#"><img src="<?php echo base_url();?>assets/images/review.png" alt="Received" border="0" title="Received" /></a></td>
      </tr>
      <tr>
        <td>2</td>
        <td>TO532546</td>
        <td><? echo date('d-m-Y'); ?></td>
        <td>MDN - Medan</td>
        <td>DPS - Denpasar</td>
        <td>Sent</td>	
        <td><a href="#"><img src="<?php echo base_url();?>assets/images/review.png" alt="Received" border="0" title="Received" /></a></td>
    </tr>
    <tr>
        <td>3</td>
        <td>TO532545</td>
        <td><? echo date('d-m-Y'); ?></td>
        <td>JKT - Jakarta</td>
        <td>DPS - Denpasar</td>
        <td>Sent</td>	
        <td><a href="#"><img src="<?php echo base_url();?>assets/images/review.png" alt="Received" border="0" title="Received" /></a></td>
       </tr>
    </tbody>
</table>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->