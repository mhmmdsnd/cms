<script>
    $(document).ready(function() {
        $('#dataTables-Category').DataTable({
                responsive: true
        });
    });
</script>
<!-- Default box -->
<div class="box">
<div class="box-header with-border">
  <h3 class="box-title">Category</h3>
  <div class="box-tools pull-right">
  	<a href="<?php echo base_url();?>category/create">
    <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" title="Create">
      Add New Category</button></a>
  </div>
</div>
<div class="box-body">
<table class="table table-striped table-bordered table-hover" id="dataTables-Category">
    <thead>
        <tr>
        <th>No</th>
        <th>Category Name</th>
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