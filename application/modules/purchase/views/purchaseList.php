<link href="<?php echo base_url();?>assets/css/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/dataTables.responsive.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-purchase').DataTable({
                responsive: true
        });
    });
</script>
<div class="row">
	<div class="col-lg-12">
    	<div class="panel panel-default">
    	<div class="panel-heading"><a href="<?php echo base_url();?>purchase">Inventory In</a> - <a href="<?php echo base_url();?>purchase/create"><img src="<?php echo base_url();?>assets/images/new.png" alt="Create" border="0" title="Create" /></a></div>
		<div class="panel-body">
            <div class="dataTable_wrapper">
            	<table class="table table-striped table-bordered table-hover" id="dataTables-purchase">
            	<thead>
					<tr>
					<th>No</th>
				    <th>Inventory ID#</th>
				    <th>Inventory Date</th>
                    <th>Supplier Name</th>
				    <th>Product Name</th>
				    <th>Description</th>
				    <th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php for($i=0;$i<count($result);$i++) { $j=$i+1; ?>
					  <tr> 
					    <td><?php echo $j; ?></td>
					    <td><?php echo $result[$i]['buyId'] ?></td>
					    <td><?php echo $result[$i]['buyDate'] ?></td>
                        <td><?php echo $result[$i]['name'] ?></td>
					    <td><?php echo $result[$i]['productName'] ?></td>
					    <td><?php echo $result[$i]['buyDescription'] ?></td>
					    <td>
                        <!--<? if($result[$i]['isProccess'] == 0) { ?><a onclick="return confirm('Are you sure want to process?');" href="<?php echo base_url();?>purchase/approve/<?php echo $result[$i]['buyId'] ?>"><img src="<?php echo base_url();?>assets/images/checked.png" alt="Approve" border="0" title="Approve" /></a>
                        <a onclick="return confirm('Are you sure want to process?');" href="<?php echo base_url();?>purchase/reject/<?php echo $result[$i]['buyId'] ?>"><img src="<?php echo base_url();?>assets/images/cancel.png" alt="Reject" border="0" title="Reject" /></a><? } ?>
                         --></a> <a href="<?php echo base_url();?>purchase/detail/<?php echo $result[$i]['buyId'] ?>"><img src="<?php echo base_url();?>assets/images/review.png" alt="Review" border="0" title="Review" /></a></td>
					  </tr>
					  <?php } ?>
				</tbody>
            	</table>
            </div>
        </div>
		</div>
	</div>
</div>