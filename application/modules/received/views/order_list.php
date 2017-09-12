<div class="row">
<?php for($j=0;$j<count($listproduct);$j++) { ?>
<div class="col-sm-4 col-lg-4 col-md-4">
	<div class="thumbnail">
		<img src="assets/prod_image/<? echo $listproduct[$j]['productPict']?>" alt="">
		<div class="caption">
			<h4 class="pull-right">Rp. <? echo $listproduct[$j]['productPrice'] ?></h4>
			<h4><a href="order/detail/<? echo $listproduct[$j]['productId']?>"><? echo $listproduct[$j]['productCode'] ?></a>
			</h4>
			<p><? echo $listproduct[$j]['productName'] ?></p>
		</div>
		<div class="ratings">
			<p class="pull-right"><? echo $listproduct[$j]['productView'] ?> View</p>
			<p>
				Sisa Stock : <? echo $listproduct[$j]['stokIn'] ?>
			</p>
		</div>
	</div>
</div>
<? } ?>         
</div>