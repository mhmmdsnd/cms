<!-- Product Detail -->
<div class="products">
   <div class="proddetail">
		<div class="proddetail-content">
        <table width="100%" border="0" cellspacing="1">
          <tr>
            <td width="40%" rowspan="5"><? if($detail->ProductPict !='') {?><img src="<? echo base_url(); ?>assets/images/noimg.gif"/><? } else {?>
            <img src="{$realurl}html/media/prod_img/{$detailprod.productPict}" alt="" height="200" />{/if}<? } ?></td>
            <td width="60%" valign="top"><h3><? echo $detail->ProductName ?></h3></td>
          </tr>
          <tr>
            <td valign="top"><em><? echo $detail->ProductDesc ?></em></td>
          </tr>
          <tr>
            <td valign="top"><strong class="price">Price : Rp. <? echo $detail->ProductPrice ?></strong></td>
          </tr>
           <tr>
            <td valign="top"><strong>Stock : <? echo $detail->stokIn ?> pcs</strong></td>
          </tr>
          <tr>
            <td valign="bottom"><a href="#" onclick="window.location.replace('<? echo base_url(); ?>order/create/<? echo $detail->ProductId ?>');" class="orderButton square green">Beli Sekarang</a></td>
          </tr>
           <tr>
            <td valign="top" colspan="2">&nbsp;</td>
          </tr>
        </table>
        </div>
 		</div>
</div>
<!-- End Product Detail -->	