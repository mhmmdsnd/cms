<link href="<?php echo base_url();?>assets/css/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/dataTables.responsive.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-invoice').DataTable({
                responsive: true
        });
    });
</script>
<div class="row">
	<div class="col-lg-12">
    	<div class="panel panel-default">
    	<div class="panel-heading"><a href="<?php echo base_url();?>invoice">Invoice</a> - <a href="<?php echo base_url();?>invoice/create"><img src="<?php echo base_url();?>assets/images/new.png" alt="Create" border="0" title="Create" /></a></div>
		<div class="panel-body">
            <div class="dataTable_wrapper">
            	<table class="table table-striped table-bordered table-hover" id="dataTables-invoice">
            	<thead>
					<tr>
					<th>No</th>
				    <th>Order ID#</th>
				    <th>Order Name</th>
				    <th>Order Date</th>
				    <th>Status Order</th>
				    <th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php for($i=0;$i<count($result);$i++) { $j=$i+1; ?>
					  <tr> 
					    <td><?php echo $j; ?></td>
					    <td><?php echo $result[$i]['ticketId'] ?></td>
					    <td><?php echo $result[$i]['name'] ?></td>
					    <td><?php echo $result[$i]['created_at'] ?></td>
					    <td><?php if($result[$i]['isProcess']==1) { echo "Sent"; } elseif ($result[$i]['isProcess']==2) { echo "Canceled"; } else { echo "Draft"; } ?></td>
					    <td>
                        <? if($result[$i]['isProcess'] == 0) { ?><a onclick="return confirm('Are you sure want to process?');" href="<?php echo base_url();?>invoice/approve/<?php echo $result[$i]['orderId'] ?>"><img src="<?php echo base_url();?>assets/images/checked.png" alt="Kirim" border="0" title="Approve" /></a>
                        <a onclick="return confirm('Are you sure want to process?');" href="<?php echo base_url();?>invoice/reject/<?php echo $result[$i]['orderId'] ?>"><img src="<?php echo base_url();?>assets/images/cancel.png" alt="Reject" border="0" title="Batal Kirim" /></a><? } ?>
                        </a> <a href="<?php echo base_url();?>invoice/detail/<?php echo $result[$i]['orderId'] ?>"><img src="<?php echo base_url();?>assets/images/review.png" alt="Review" border="0" title="Review" /></a></td>
					  </tr>
					  <?php } ?>
				</tbody>
            	</table>
            </div>
        </div>
		</div>
	</div>
</div>