<script>
    $(document).ready(function() {
        $('#dataTables-transit').DataTable({
                responsive: true
        });
    });
</script>
<!-- Default box -->
<div class="box">
<div class="box-header with-border">
  <h3 class="box-title">Transit TO</h3>
  <div class="box-tools pull-right">
  </div>
</div>
<div class="box-body">
<table class="table table-striped table-bordered table-hover" id="dataTables-transit">
    <thead>
        <tr>
        <th>No</th>
        <th>TO Number</th>
        <th>TO Date</th>
        <th>From</th>
        <th>Destination</th>
        <?php for($i=0;$i<5;$i++) { $j=$i+1; ?>
        <th>Transit ke <? echo $j ?></th>
        <? } ?>
        <th>Status</th>	
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
    	<tr>
        <td>1</td>
        <td>TO532544</td>
        <td><? echo date('d-m-Y'); ?></td>
        <td>BDG - Bandung</td>
        <td>DPS - Denpasar</td>
        <?php for($i=0;$i<5;$i++) { $j=$i+1; ?>
        <td><? if($j <= 3) { ?>
			Sudah ditransit<br />
        	Penerima : Adam
			<? } ?></td>
        <? } ?>
        <td>Transit</td>	
        <td><a href="<?php echo base_url();?>transit/update/2"><img src="<?php echo base_url();?>assets/images/edit.png" alt="Received" border="0" title="Received" /></a></td>
        </tr>
        <tr>
        <td>2</td>
        <td>TO532546</td>
        <td><? echo date('d-m-Y'); ?></td>
        <td>MDN - Medan</td>
        <td>DPS - Denpasar</td>
        <?php for($i=0;$i<5;$i++) { $j=$i+1; ?>
        <td><? if($j <= 1) { ?>
			Sudah ditransit<br />
        	Penerima : Anggi
			<? } ?></td>
        <? } ?><td>Transit</td>	
        <td><a href="#"><img src="<?php echo base_url();?>assets/images/edit.png" alt="Received" border="0" title="Received" /></a></td>
        </tr>
        <tr>
        <td>3</td>
        <td>TO532545</td>
        <td><? echo date('d-m-Y'); ?></td>
        <td>JKT - Jakarta</td>
        <td>DPS - Denpasar</td>
        <?php for($i=0;$i<5;$i++) { $j=$i+1; ?>
        <td><? if($j <= 2) { ?>
			Sudah ditransit<br />
        	Penerima : Joni
			<? } ?></td>
        <? } ?><td>Transit</td>	
        <td><a href="#"><img src="<?php echo base_url();?>assets/images/edit.png" alt="Received" border="0" title="Received" /></a></td>
        </tr>
    </tbody>
</table>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->