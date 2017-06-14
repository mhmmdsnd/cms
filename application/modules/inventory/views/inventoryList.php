<link href="<?php echo base_url();?>assets/public/themes/default/css/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/public/themes/default/css/dataTables.responsive.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url();?>assets/public/themes/default/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/public/themes/default/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-inventIn').DataTable({
                responsive: true
        });
    });
</script>
<div class="row">
	<div class="col-lg-12">
    	<div class="panel panel-default">
    	<div class="panel-heading"><a href="<?php echo base_url();?>inventory">Inventory In</a> - <a href="<?php echo base_url();?>inventory/create"><img src="<?php echo base_url();?>assets/public/themes/default/images/new.png" alt="Create" border="0" title="Create" /></a></div>
		<div class="panel-body">
            <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-inventIn">
            	<thead>
					<tr>
					<th>No</th>
				    <th>Trans Number</th>
    				<th>Trans Date</th>
				    <th>Supplier</th>
					<th>Warehouse</th>
					<th>Status</th>	
					<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php for($i=0;$i<count($result);$i++) { $j = $i+1; ?>
				  <tr> 
				    <td><?php echo $j ?></td>
				    <td><?php echo $result[$i]['transnumber'] ?></td>
				    <td><?php echo $result[$i]['transdate'] ?></td>
				    <td><?php echo $result[$i]['suppliername'] ?></td>
					<td><?php echo $result[$i]['whName'] ?></td>
					<td><?php echo $result[$i]['transstatus'] ?></td>
					<td>
					<?php if ($result[$i]['transstatus'] == 1) { ?>
					<a href="<?php echo base_url();?>inventory/approval/<?php echo $result[$i]['transId'] ?>"><img src="<?php echo base_url();?>assets/public/themes/default/images/checked.png" alt="Approval" border="0" title="Approval" /></a>
					<a href="<?php echo base_url();?>inventory/reject/<?php echo $result[$i]['transId'] ?>"><img src="<?php echo base_url();?>assets/public/themes/default/images/cancel.png" alt="Reject" border="0" title="Reject" /></a>
					<?php } else { ?>
					<a href="<?php echo base_url();?>inventory/review/<?php echo $result[$i]['transId'] ?>"><img src="<?php echo base_url();?>assets/public/themes/default/images/review.png" alt="Review" border="0" title="Review" /></a> <?php } ?> 
					<?php if ($result[$i]['transstatus'] == 1) { ?> <a href="<?php echo base_url();?>inventory/update/<?php echo $result[$i]['transId'] ?>"><img src="<?php echo base_url();?>assets/public/themes/default/images/edit.png" alt="Edit" border="0" title="Edit" /></a> <a OnClick="return confirm('Are you delete this data?');" href="<?php echo base_url();?>inventoryin/delete/<?php echo $result[$i]['transId'] ?>"><img src="<?php echo base_url();?>assets/public/themes/default/images/delete.png" alt="Delete" border="0" title="Delete" /></a><?php } ?></td>
				  </tr>
				  <?php } ?>
				</tbody>
			</table>
            </div>
        </div>
        </div>
    </div>
</div>