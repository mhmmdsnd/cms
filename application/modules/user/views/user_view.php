<link href="<?php echo base_url();?>assets/css/datatables.responsive.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-user').DataTable({
                responsive: true
        });
    });
    </script>
<div class="row">
	<div class="col-lg-12">
    	<div class="panel panel-default">
    	<div class="panel-heading"><a href="<?php echo base_url();?>user">User</a> - <a href="<?php echo base_url();?>user/create"><img src="<?php echo base_url();?>assets/images/new.png" alt="Create" border="0" title="Create" /></a></div>
		<div class="panel-body">
            <div class="dataTable_wrapper">
            	<table class="table table-striped table-bordered table-hover" id="dataTables-user">
            	<thead>
					<tr>
					<th>No</th>
					<th>Loginname</th>
					<th>Last Login Date</th>
					<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $urut=1; foreach ($result->result_array() as $list) { ?>
					<tr>
					<td><?php echo $urut++ ?></td>
				    <td><?php echo $list['loginname'] ?></td>
				    <td><?php echo $list['lastlogindate'] ?></td>
				    <td><a href="<?php echo base_url();?>user/update/<?php echo $list['id'] ?>"><img src="<?php echo base_url();?>assets/images/edit.png" alt="Edit" border="0" title="Edit" /></a> <a OnClick="return confirm('Are you delete this data?');" href="<?php echo base_url();?>user/delete/<?php echo $list['id'] ?>"><img src="<?php echo base_url();?>assets/images/delete.png" alt="Delete" border="0" title="Delete" /></a></td>							
					</tr>
				<?php } ?>
				</tbody>
            	</table>
            </div>
        </div>
		</div>
	</div>
</div>