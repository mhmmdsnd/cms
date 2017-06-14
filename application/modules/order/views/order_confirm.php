<link rel="stylesheet" href="<? echo base_url(); ?>assets/css/style-other.css" type="text/css"/>
<div class="cl">&nbsp;</div>
<!-- Content -->
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
        <td><strong class="price">Rp. <? echo $detail->orderPrice ?></strong></td>
      </tr>
       <tr>
        <td><strong>Order Qty : </strong></td>
        <td><strong><? echo $detail->orderQty ?> pcs</strong></td>
      </tr>
      <tr>
        <td><strong>Total : </strong></td>
        <td><strong class="price">Rp. <? echo ($detail->orderPrice * $detail->orderQty)?></strong></td>
      </tr>
    </table>
    </div>
    <div class="col-md-7">
    <!-- Product Detail -->
    <table>
     <tr>
        <td width="70%"><label>Name</label></td>
        <td><? echo $detail->orderName ?></td>
      </tr>
      <tr>
        <td><label>Email</label></td>
        <td><? echo $detail->orderEmail ?></td>
      </tr>
      <tr>
        <td><label>Phone</label></td>
        <td><? echo $detail->orderPhone ?></td>
      </tr>
      <tr>
        <td valign="top" ><label>Delivery Address</label></td>
        <td><? echo $detail->orderAddress ?></td>
      </tr>
      <tr>
        <td colspan="2" ><input type="button" onclick="window.location.replace('<? echo base_url(); ?>');" value="Done" class="orderButton square green"></td>
      </tr>
     </table>
    <!-- End Product Detail -->	
    </div> 