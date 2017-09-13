<script>
    $(document).ready(function() {
        $('#dataTables-transfer').DataTable({
                responsive: true
        });
    });
</script>
<!-- Default box -->
<div class="box">
<div class="box-header with-border">
  <h3 class="box-title">Create TO</h3>
  <div class="box-tools pull-right">
  	<a href="<?php echo base_url();?>transfer/create">
    <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" title="Create">
      Create TO</button></a>
  </div>
</div>
<div class="box-body">
<table class="table table-striped table-bordered table-hover" id="dataTables-transfer">
    <thead>
        <tr>
        <th>No</th>
        <th>TO Number</th>
        <th>TO Date</th>
        <th>From</th>
        <th>Destination</th>
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
<!-- /.box-body -->
</div>
<!-- /.box -->