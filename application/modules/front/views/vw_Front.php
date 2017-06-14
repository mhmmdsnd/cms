<div class="row carousel-holder">
<div class="col-md-12">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <? for($i=0;$i<count($top5);$i++) { ?>
            <div class="item <? if($i==0) {echo 'active'; } ?>">
                <img class="slide-image" src="<?php echo base_url();?>assets/prod_image/<? echo $top5[$i]['productPict'] ?>" alt=""><br />
                <p><? echo $top5[$i]['productName'] ?></p>
            </div>
            <? } ?>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>
</div>
<div class="row">
<?php for($j=0;$j<count($prodlist);$j++) { ?>
<div class="col-sm-4 col-lg-4 col-md-4">
	<div class="thumbnail">
		<?
            if($prodlist[$j]['productPict']!='') {
                $img = explode(".", $prodlist[$j]['productPict']);
                $thb = $img[0] . "_thumb." . $img[1];
            }
		?>
		<img src="assets/prod_image/<? echo $thb; ?>" alt="">
		<div class="caption">
			<h4 class="pull-right">Rp. <? echo $prodlist[$j]['productPrice'] ?></h4>
			<h4><a href="order/detail/<? echo $prodlist[$j]['productId']?>"><? echo $prodlist[$j]['productCode'] ?></a>
			</h4>
			<p><? echo $prodlist[$j]['productName'] ?></p>
		</div>
		<div class="ratings">
			<p class="pull-right"><? echo $prodlist[$j]['productView'] ?> View</p>
			<p>
				Sisa Stock : <? echo $prodlist[$j]['stokIn'] ?>
			</p>
		</div>
	</div>
</div>
<? } ?>         
</div>