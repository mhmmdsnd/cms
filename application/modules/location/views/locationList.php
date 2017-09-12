<link href="<?php echo base_url();?>assets/css/datatables.responsive.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-location').DataTable({
                responsive: true
        });
    });
</script>
<div class="row">
	<div class="col-lg-12">
    	<div class="panel panel-default">
    	<div class="panel-heading"><a href="<?php echo base_url();?>location">Location</a> - <a href="<?php echo base_url();?>location/create"><img src="<?php echo base_url();?>assets/images/new.png" alt="Create" border="0" title="Create" /></a></div>
		<div class="panel-body">
            <div class="dataTable_wrapper">
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
					    <td><?php echo $list['code'] ?></td>
					    <td><?php echo $list['name'] ?></td>
					    <td><a href="<?php echo base_url();?>location/update/<?php echo $list['id'] ?>"><img src="<?php echo base_url();?>assets/images/edit.png" alt="Edit" border="0" title="Edit" /></a></a> <a OnClick="return confirm('Are you delete this data?');" href="<?php echo base_url();?>location/delete/<?php echo $list['id'] ?>"><img src="<?php echo base_url();?>assets/images/delete.png" alt="Delete" border="0" title="Delete" /></a></td>
					  </tr>
					  <?php } ?>
				</tbody>
            	</table>
            </div>
        </div>
		</div>
	</div>
</div>