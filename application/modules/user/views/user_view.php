<script>
$(document).ready(function() {
	$('#dataTables-user').DataTable({
			responsive: true
	});
});
</script>
<!-- Default box -->
<div class="box">
<div class="box-header with-border">
  <h3 class="box-title">User</h3>
  <div class="box-tools pull-right">
  	<a href="<?php echo base_url();?>user/create">
    <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" title="Create">
      Add New User</button></a>
  </div>
</div>
<div class="box-body">
<table class="table table-striped table-bordered table-hover" id="dataTables-user">
<thead>
    <tr>
    <th>No</th>
    <th>Loginname</th>
    <th>Authorized</th>
    <th>Location</th>
    <th>Last Login Date</th>
    <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php $urut=1; foreach ($result->result_array() as $list) { ?>
    <tr>
    <td><?php echo $urut++ ?></td>
    <td><?php echo $list['loginname'] ?></td>
    <td><?php echo $list['groupName'] ?></td>
    <td><?php echo $list['nama'] ?></td>
    <td><?php echo $list['lastlogindate'] ?></td>
    <td><a href="<?php echo base_url();?>user/update/<?php echo $list['id'] ?>"><img src="<?php echo base_url();?>assets/images/edit.png" alt="Edit" border="0" title="Edit" /></a> <a OnClick="return confirm('Are you delete this data?');" href="<?php echo base_url();?>user/delete/<?php echo $list['id'] ?>"><img src="<?php echo base_url();?>assets/images/delete.png" alt="Delete" border="0" title="Delete" /></a></td>							
    </tr>
<?php } ?>
</tbody>
</table>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->