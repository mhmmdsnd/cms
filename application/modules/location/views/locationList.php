<script>
    $(document).ready(function() {
        $('#dataTables-location').DataTable({
                responsive: true
        });
    });
</script>
<!-- Default box -->
<div class="box">
<div class="box-header with-border">
  <h3 class="box-title">Location</h3>
  <div class="box-tools pull-right">
  	<a href="<?php echo base_url();?>location/create">
    <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" title="Create">
      Add New Location</button></a>
  </div>
</div>
<div class="box-body">
<table class="table table-striped table-bordered table-hover" id="dataTables-location">
<thead>
    <tr>
    <th>No</th>
    <th>Location Code</th>
    <th>Location Name</th>
    <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php $urut=1; foreach ($result->result_array() as $list) { ?>
      <tr> 
        <td><?php echo $urut++; ?></td>
        <td><?php echo $list['kode'] ?></td>
        <td><?php echo $list['nama'] ?></td>
        <td><a href="<?php echo base_url();?>location/update/<?php echo $list['id'] ?>"><img src="<?php echo base_url();?>assets/images/edit.png" alt="Edit" border="0" title="Edit" /></a><a OnClick="return confirm('Are you delete this data?');" href="<?php echo base_url();?>location/delete/<?php echo $list['id'] ?>"><img src="<?php echo base_url();?>assets/images/delete.png" alt="Delete" border="0" title="Delete" /></a></td>
      </tr>
      <?php } ?>
</tbody>
</table>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->