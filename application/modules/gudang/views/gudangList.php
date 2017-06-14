<link href="<?php echo base_url();?>assets/css/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/dataTables.responsive.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-product').DataTable({
                responsive: true
        });
    });
</script>
<div class="row">
	<div class="col-lg-12">
    	<div class="panel panel-default">
    	<div class="panel-heading"><a href="<?php echo base_url();?>product">Product</a> - <a href="<?php echo base_url();?>product/create"><img src="<?php echo base_url();?>assets/images/new.png" alt="Create" border="0" title="Create" /></a></div>
		<div class="panel-body">
            <div class="dataTable_wrapper">
            	<table class="table table-striped table-bordered table-hover" id="dataTables-product">
            	<thead>
					<tr>
					<th>No</th>
				    <th>Product Code</th>
				    <th>Product Name</th>
				    <th>Product Type</th>
                    <th>Total Stok</th>
				    <th>Delivered Product</th>
				    <th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php for($i=0;$i<count($result);$i++) { $j=$i+1; ?>
					  <tr> 
					    <td><?php echo $j; ?></td>
					    <td><?php echo $result[$i]['productCode'] ?></td>
					    <td><?php echo $result[$i]['productName'] ?></td>
					    <td><?php echo $result[$i]['prodtypeName'] ?></td>
                        <td><?php echo ($result[$i]['stokIn']) ?></td>
                        <td><?php echo $result[$i]['stokIn'] ?></td>
					    <td><a href="<?php echo base_url();?>product/update/<?php echo $result[$i]['productId'] ?>"><img src="<?php echo base_url();?>assets/images/edit.png" alt="Edit" border="0" title="Edit" /></a></a> <a OnClick="return confirm('Are you delete this data?');" href="<?php echo base_url();?>product/delete/<?php echo $result[$i]['productId'] ?>"><img src="<?php echo base_url();?>assets/images/delete.png" alt="Delete" border="0" title="Delete" /></a></td>
					  </tr>
					  <?php } ?>
				</tbody>
            	</table>
            </div>
        </div>
		</div>
	</div>
</div>