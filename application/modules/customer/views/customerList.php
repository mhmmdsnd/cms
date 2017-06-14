<link href="<?php echo base_url();?>assets/css/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/dataTables.responsive.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-customer').DataTable({
                responsive: true
        });
    });
</script>
<div class="row">
	<div class="col-lg-12">
    	<div class="panel panel-default">
    	<div class="panel-heading"><a href="<?php echo base_url();?>customer">Customer</a> - <a href="<?php echo base_url();?>customer/create"><img src="<?php echo base_url();?>assets/images/new.png" alt="Create" border="0" title="Create" /></a></div>
		<div class="panel-body">
            <div class="dataTable_wrapper">
            	<table class="table table-striped table-bordered table-hover" id="dataTables-customer">
            	<thead>
					<tr>
					<th>No</th>
				    <th>Customer Code</th>
				    <th>Customer Name</th>
				    <th>Address</th>
                    <th>No Telp</th>
				    <th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php for($i=0;$i<count($result);$i++) { $j=$i+1; ?>
					  <tr> 
					    <td><?php echo $j; ?></td>
					    <td><?php echo $result[$i]['code'] ?></td>
					    <td><?php echo $result[$i]['name'] ?></td>
					    <td><?php echo $result[$i]['address'] ?></td>
					    <td><?php echo $result[$i]['notelp'] ?></td>
                        <td><a href="<?php echo base_url();?>customer/update/<?php echo $result[$i]['id'] ?>"><img src="<?php echo base_url();?>assets/images/edit.png" alt="Edit" border="0" title="Edit" /></a></a> <a OnClick="return confirm('Are you delete this data?');" href="<?php echo base_url();?>customer/delete/<?php echo $result[$i]['id'] ?>"><img src="<?php echo base_url();?>assets/images/delete.png" alt="Delete" border="0" title="Delete" /></a></td>
					  </tr>
					  <?php } ?>
				</tbody>
            	</table>
            </div>
        </div>
		</div>
	</div>
</div>