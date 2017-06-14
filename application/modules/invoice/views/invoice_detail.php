<div class="col-lg-12">
<div class="panel panel-default">
	<!-- START ORDER DETAIL-->
    <div class="panel-heading">Order Detail</div>
	<div class="panel-body">
    <div class="row">
	<div class="col-lg-6">
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
	<tr> 
      <td width="30%">Ticket Number#</td>
      <td>:</td>
      <td><? echo $detail->ticketId ?></td>
    </tr>
    <tr> 
	<td>Customer Code</td>
	<td>:</td>
	<td><? echo $detail->code ?></td>
      </tr>
  <tr>
    <td>Customer Name</td>
    <td>:</td>
    <td><? echo $detail->name ?></td>
  </tr>
   <tr> 
      <td>Order Date</td>
      <td>:</td>
      <td><? echo $detail->created_at ?></td>
    </tr>
    <tr> 
      <td>Order Address </td>
      <td>:</td>
      <td><? echo $detail->address ?></td>
    </tr>
	</table>
    </div>	
    </div>
	</div>
    <!-- END ORDER DETAIL-->
    <!-- START PRODUCT DETAIL-->
    <div class="panel-heading">Product Order Detail</div>
	<div class="panel-body">
    <div class="row">
	<div class="col-lg-6">
	<table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr> 
			<td width="40%" class="header_table">Product Name</td>
			<td width="20%" class="header_table">Order Qty</td>
			<td width="20%" class="header_table">Product Price</td>
			<td width="20%" class="header_table">Total</td>
	  </tr>
	  <tr> 
			<td><? echo $detail->ProductName ?></td>
			<td><? echo $detail->orderQty ?></td>
			<td class="white_x ratakanan">Rp. <? echo  $detail->orderPrice ?></td>
			<td class="white_x ratakanan">Rp. <? echo ($detail->orderPrice * $detail->orderQty) ?></td>
	  </tr>
      <tr>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td class="white_x ratakanan">Grand Total</td>
	    <td class="white_x ratakanan">Rp. <? echo ($detail->orderPrice * $detail->orderQty) ?></td>
	    </tr>
      </table>
    </div>
    </div>
    </div>
    <!-- END PRODUCT DETAIL-->
    <!-- START CONFIRMATION-->
    <!--<div class="panel-heading">Confirmation Detail</div> -->
	<div class="panel-body">
    <div class="row">
	<div class="col-lg-6">
    <!--<table width="100%" border="0" cellpadding="0" cellspacing="1">
        <tr>
          <td width="19%">Email Confirm</td>
          <td width="1%">:</td>
          <td width="80%">&nbsp;</td>
        </tr>
        <tr>
          <td>Nama Pemilik Rekening</td>
          <td>:</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Pembayaran dari Bank</td>
          <td>:</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Nominal Transfer</td>
          <td>:</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Tanggal Transfer</td>
          <td>:</td>
          <td>&nbsp;</td>
        </tr>
      </table> --><br />
      <div class="form-group">
      <form method="post" name="proses">
      <input type="button" value="Back" class="btn btn-primary" onclick="window.location.replace('<?php echo base_url(); ?>invoice');" />
      <input type="button" value="Print" class="btn btn-primary" />
      <? if($detail->isProcess == 0) { ?><input name="approve" type="submit" class="btn btn-primary" id="action" onclick="return confirm('Are you sure want to process?');" value="Approve"/>
      <input name="cancel" type="submit" class="btn btn-primary" onclick="return confirm('Are you sure want to process?');" value="Cancel"/><? } ?>
      </form>
      </div>
    </div>
    </div>
    </div>
    <!-- END CONFIRMATION-->
</div>
</div>