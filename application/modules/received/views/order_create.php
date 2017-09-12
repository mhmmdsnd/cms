<script src="<? echo base_url(); ?>assets/js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
 $( "#orderform" ).validate({
	 rules:{
		 orderPhone:{number:true}
	 }
 });
});
function cek_stok(order,stokIn,chg)
{
	qty = parseFloat(order.value);
	stok = parseFloat(stokIn.value);
	var vmax = document.getElementById(chg);
	if(qty > stok) 
	{
		javascript:alert('Quantity Item Out of Order\nOrder Available are '+stok+' piece(s)');
		vmax.value = stok;
	}
}
function totalOrder(qty,price)
{
	var total;
	price = parseInt(price.value);
	total = parseInt(qty.value) * parseInt(price);
	if(isNaN(total)) total = 0;
	return total;
}
</script>
<link rel="stylesheet" href="<? echo base_url(); ?>assets/css/style-other.css" type="text/css"/>
<div class="cl">&nbsp;</div>
<!-- Content -->
<form id="orderform" method="post">
    <div class="col-md-7">
    <!-- Product Detail -->
    <table width="100%" border="0" cellspacing="1">
      <tr>
        <td width="40%" rowspan="5"><? if($detail->ProductPict !='') {?><img src="<? echo base_url(); ?>assets/images/noimg.gif"/><? } else {?>
        <img src="{$realurl}html/media/prod_img/{$detailprod.productPict}" alt="" height="200" />{/if}<? } ?></td>
        <td width="60%" valign="top"><h3><? echo $detail->ProductName ?></h3></td>
      </tr>
      <tr>
        <td valign="top"><em><? echo $detail->ProductDesc ?></em></td>
      </tr>
    </table>
    <!-- End Product Detail -->	
    </div>
    <div class="col-md-5">
    <table width="100%" border="0" cellspacing="1">
      <tr>
        <td width="70%"><strong class="price">Price : </strong></td>
        <td><input type="hidden" id="orderPrice" name="orderPrice" value="<? echo $detail->ProductPrice ?>"><strong class="price">Rp. <? echo $detail->ProductPrice ?></strong></td>
      </tr>
       <tr>
        <td><strong>Stok : </strong></td>
        <td><strong><? echo $detail->stokIn ?> pcs</strong></td>
      </tr>
       <tr>
        <td><strong>Order Qty : </strong></td>
        <td><input type="hidden" id="stokIn" name="stokIn" value="<? echo $detail->stokIn ?>">
        <input type="text" id="orderQty" name="orderQty" class="form-control" size="30" value="1" onkeyup="cek_stok(this,orderform.stokIn,'orderQty');orderform.subtotal.value=totalOrder(this,orderform.orderPrice);"></td>
      </tr>
      <tr>
        <td><strong>Total : </strong></td>
        <td><input type="text" id="subtotal" value="0" name="subtotal" readonly="readonly" class="form-control" size="30"></td>
      </tr>
    </table>
    </div>
    <div class="col-md-7">
    <!-- Product Detail -->
    <table>
     <tr>
        <td width="27%"><label>Name</label></td>
        <td><input type="text" name="orderName" readonly class="form-control" size="30" value="<? echo $orderdetail['loginname']; ?>"></td>
      </tr>
      <tr>
        <td><label>Email</label></td>
        <td><input type="text" name="orderEmail" readonly class="form-control" size="30" value="<? echo $orderdetail['memberEmail']; ?>"></td>
      </tr>
      <tr>
        <td><label>Phone</label></td>
        <td><input type="text" name="orderPhone" readonly class="form-control"  size="30" value="<? echo $orderdetail['memberPhone']; ?>"></td>
      </tr>
     <tr>
        <td valign="top" ><label>Delivery Address</label></td>
        <td><textarea name="orderAddress" cols="50" readonly class="form-control" rows="5" ><? echo $orderdetail['memberAddress']; ?></textarea></td>
      </tr>
      <tr>
        <td colspan="2" ><input type="submit" name="send_order" id="send_order" value="Process" class="orderButton square green"></td>
      </tr>
     </table>
    <!-- End Product Detail -->	
    </div> 
</form>