
<?php
include "inc/header.php";
include "inc/slider.php";
?>

 	<div class="badichvu">
 		<div class="container ">
 			<div class="row">
			 <?php 
					$get_blog=$pg->show_blog();
					if($get_blog){
						
						while($result=$get_blog->fetch_assoc()){
						
				?>
 				<div class="col-sm-4 wow flipInY">
 					<img src="admin/uploads/<?php echo $result['blog_img'] ?>" alt="" class="img-fluid">
 					<h3><a href="<?php echo $result['link'] ?>"><?php echo $result['title']?></a></h3>
 					<p><?php echo $result['blog_desc']?></p>
 					<a href="<?php echo $result['link'] ?>" class="readmore">Read More</a>
 				</div>
				
				 <?php 
				 }
			}	
			?>			
 			</div> <!-- het row -->
 		</div> <!--  het container -->
 	</div>  <!-- het badichvu -->
  


  	<div class="slidemonan  wow fadeInUp">
 		<div class="container">
 			<div class="row">
 				<div class="col-sm-12">
 					<h4> Our New Dishes</h4>
 				</div>
 			</div>

 			<div class="row">
 			<div class="col-sm-12">
 						<div id="slidemonanduoi" data-interval="3000" class="carousel slide" data-ride="carousel">


 							<div class="carousel-inner" role="listbox">
 								<div class="carousel-item active">
 									
								 <div class="row">

									 <?php 
											$show_pro_new= $product->get_product_new();
											if($show_pro_new){
												$i=0;
												while($result2 = $show_pro_new->fetch_assoc()){
													$i++;
									?> 

 										<div class="sanpham">
 											<img src="admin/uploads/<?php echo $result2['product_img']?>" alt="" class="anhspslide" >
 											<div class="tensp">
 												<div class="gia float-xs-right"><?php echo $fm->format_currency($result2['price'])." "."VND"?></div>
 												<div class="ten"><?php echo $result2['product_name']?></div>
 											</div>
 											<div class="tencongthuc">
											 <?php echo $fm->textShorten($result2['product_desc'],7) ?>
 											</div>
											 <a class="btn btn-warning wow bounce" data-wow-iteration="3" href="preview.php?proid=<?php echo $result2['product_id'] ?>" >Buy</a> 
 										</div> <!-- SAN PHAM -->
										 
										

 									<?php
												}
											}
											?>	

							</div> <!-- het row -->	

 									


 								</div>  <!-- HET CAROUSEL ITEM -->
 								 
 							</div>
 						</div>
 				</div> <!-- het colsm12 cu monan -->
 			</div>  <!-- HET ROW -->
 		</div> <!-- HET CONTAINER -->

 	</div>  <!-- HET SLIDE MON AN -->




	<div class="khoidatban text-xs-center wow fadeInUp" data-wow-delay="0s">
		<div class="container">

		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="thongtindatban fontroboto">
					<h2 class="fontroboto">Make A Reservation</h2>
					<p class="tt ">Booking a table has never been so easy with free   instant online restaurant reservations, booking now!!</p>
					<p class="giodb">Monday to Sunday   <span class="vang"> <?php echo $pg->getopening();?> </span> 
					<div class="dtdb fontoswarld">	<?php echo $pg->getphone();?></div>
				</div>
			</div>
			

		</div> <!-- het row -->
			
		</div><!--  het container -->
		
	</div>  <!-- HET DAT BAN -->



<?php
include "inc/footer.php";
?>