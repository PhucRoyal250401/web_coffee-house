
<?php
include "inc/header.php";
// include "inc/slider.php";
?>
<style>
	.khoimenu {
    background: url(images/background1.png);
    background-size: cover;
    color: white;
	}
</style>

<div class="khoimenu wow fadeInUp">  
 		<div class="tieudekhoimenu text-xs-center">
 			<div class="container">
 				<div class="row">
 					<div class="col-sm-8 push-sm-2">
 						<span class="tieudephu fontdancing">Our Delicious Menu Items</span>
 						<h3 class="tieudechinh fontroboto">Fresh And Healthy Food Available</h3>
 					</div>
 				</div>
 			</div>
 			
 		</div>   <!-- HET TIEUDEKHOIMENU -->
 	</div>  <!-- HET KHOI MENU -->

 	

<div class="thucdonct wow fadeInUp">
 		<div class="tieudect text-xs-center fontroboto">
			 
 			<a href="" data-monan="*">All</a>
			 <?php 
				$show_cat= $cat->show_category();
				if($show_cat){
					$i=0;
					while($result = $show_cat->fetch_assoc()){
					$i++;
			?> 
 			<a href="" data-monan="<?php echo ".".$result['catid'] ?>"><?php echo $result['catname'] ?> </a>
			 <?php
					}
				}
			?>
 		</div>
			
						
						

 		<div class="noidungct">
 			 <div class="container">
 			 	<div class="row nhieumon">

				  	<?php 
						$show_cat= $cat->show_category();
						if($show_cat){
							$i=0;
							while($result = $show_cat->fetch_assoc()){
								$i++;
								$show_prod= $product->get_product($result['catid']);
								if($show_prod ){
									$j=0;
									while($result1 = $show_prod->fetch_assoc()){
									$j++;
								
					?> 
 			 		<div class="col-xs-12 col-sm-6 col-md-4   motmon <?php echo $result['catid'] ?>">						
 			 			<div class="row">
							  
 			 				<div class="col-xs-3 col-sm-4">
 			 					<div class="anhmon">
 			 						<!-- <div class="tagnew">NEW</div> -->
 			 						<img src="admin/uploads/<?php echo $result1['product_img']?>" alt="" class="img-fluid">
 			 					</div>

 			 					
 			 				</div>
 			 				<div class="col-xs-9 col-sm-8">
 			 					<div class="tenmon">
 			 						<div class="tren">
 			 							<span class="float-xs-right"><?php echo $fm->format_currency($result1['price'])." "."VND"?></span>
 			 							<b class="ten"><?php echo $result1['product_name']?></b>
 			 						</div>
 			 						<div class="duoi">
 			 							<?php echo $fm->textShorten($result1['product_desc'],20) ?>
 			 						</div>
									  <a class="btn btn-warning wow bounce" data-wow-iteration="3" href="preview.php?proid=<?php echo $result1['product_id'] ?>" >Buy</a>
 			 					</div>
							</div>
						
	
 			 			</div> <!-- het row -->
					
 			 		</div>  <!-- het motmon -->
					
					  <?php
									}
								}
							}
						}
				?>  




 			 	</div> <!-- het row -->
 			 </div>  <!-- het container -->
 			 
 		</div>  <!-- het noidungct -->



		 
 	</div>  <!-- HET THUCDONCT -->
   <br>
   <br>
<?php
include "inc/footer.php";
?>