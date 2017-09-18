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
  	<a href="<?php echo base_url();?>transfer/create">
    <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" title="Create">
      Received TO</button></a>
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
    
    </tbody>
</table>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->