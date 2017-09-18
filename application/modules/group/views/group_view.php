<script>
$(function() {
	$('#dataTables-group').DataTable({
		"responsive": true
	});
});
</script>
<!-- Default box -->
<div class="box">
<div class="box-header with-border">
  <h3 class="box-title">Authorized</h3>
  <div class="box-tools pull-right">
  	<a href="<?php echo base_url();?>group/create">
    <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" title="Create">
      Add New Authorized</button></a>
  </div>
</div>
<div class="box-body">
<table class="table table-striped table-bordered table-hover" id="dataTables-group">
<thead>
    <tr>
    <th>No</th>
    <th>Authorized Name</th>
    <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php $urut=1; foreach ($result->result_array() as $list) { ?>
    <tr>
        <td><?php echo $urut++ ?></td>
        <td><?php echo $list['groupName'] ?></td>
        <td><a href="<?php echo base_url();?>group/update/<?php echo $list['groupId'] ?>"><img src="<?php echo base_url();?>assets/images/edit.png" alt="Edit" border="0" title="Edit" /></a> <a OnClick="return confirm('Are you delete this data?');" href="<?php echo base_url();?>group/delete/<?php echo $list['groupId'] ?>"><img src="<?php echo base_url();?>assets/images/delete.png" alt="Delete" border="0" title="Delete" /></a></td>
    </tr>
    <?php } ?>
</tbody>
</table>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
