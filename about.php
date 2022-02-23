
<?php
include "inc/header.php";
// include "inc/slider.php";
?>

<style>
	.khoimenu {
		background: url(images/coffee100.jpg);
    background-size: cover;
    color: white;
	}
	</style>
	<div class="thongtin2about  wow fadeInUp">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="khoi2dong"> 						
 						<span class="fontdancing">COFFEE HOUSE </span>
 						<h2 class="fontoswarld" style="font-size:20px">Behind every successful person is a substantial amount of coffee</h2>
 						<p>
						 When it comes to Vietnamese coffee brands, it is definitely impossible to ignore "Coffee House" The Coffee House. The first store of The Coffee House officially opened in August 2014 in Ho Chi Minh City. Ho Chi Minh. Only 4 years later, this brand has grown to a chain of more than 100 stores across the country – an extremely impressive number. Now, The Coffee House owned nearly 200 stores.
						</p>
 					</div>
				</div>
				<div class="col-sm-5 push-sm-1">
					<img src="images/the-coffee-house2.jpg" alt="" class="img-fluid">
				</div>

			</div>
		</div>
	</div>  <!-- HET THONG TIN 2 ABOUT -->

	<div class="khoimenu wow fadeInUp bannerkieu2dong">  
 		<div class="tieudekhoimenu text-xs-center">
 			<div class="container">
 				<div class="row">
 					<div class="col-sm-8 push-sm-2">
 						<span class="tieudephu fontdancing">Deliver Happiness</span>
 						<h3 class="tieudechinh fontroboto">Best offers from bartender</h3>
 					</div>
 				</div>
 			</div>
 			
 		</div>   <!-- HET TIEUDEKHOIMENU -->
 	</div>  <!-- HET KHOI MENU -->

	<div class="badichvu badichvuabout">
 		<div class="container ">
 			<div class="row">
 				<div class="col-sm-12 text-xs-center">
 					<div class="tdtintuchome">
						<span class="fontdancing">Our Service</span>
						<!-- <h2 class="fontroboto">We Create Delicous Memory</h2> -->
					</div>
 				</div>
 				<div class="col-sm-4 wow flipInY text-xs-center">
 					<a href=""><img src="images/iconcoffee.jpg" alt="" class="img-fluid"></a>
 					<h3>Our Quanlity of Coffee </h3>
 					<!-- <p>Sed ut perspiciatis unde omnis iste natus errorsit voluptatem accusantium doloremque laudantium thes hatles tooest surf totam rem aperiam.</p> -->
 					
 				</div>
				<div class="col-sm-4 wow flipInY text-xs-center" data-wow-delay="0.2s">
 					<a href=""><img src="images/fast.jpg" alt="" class="img-fluid"></a>
 					<h3>Fast delivery</h3>

 				</div>
				<div class="col-sm-4 wow flipInY text-xs-center" data-wow-delay="0.4s">
 					<a href=""><img src="images/nv.png" alt="" class="img-fluid"></a>
 					<h3>Service Quality</h3>
 					<!-- <p>Sed ut perspiciatis unde omnis iste natus errorsit voluptatem accusantium doloremque laudantium thes hatles tooest surf totam rem aperiam.</p> -->
 					
 				</div>				
 			</div> <!-- het row -->
 		</div> <!--  het container -->
 	</div>  <!-- het badichvu -->


	 <div class="tintuchome wow   " data-wow-delay="0s">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-xs-center wow  flipInY" data-wow-delay="0s">
					<div class="tdtintuchome">
						<span class="fontdancing">Get In Touch</span>
						<h2 class="fontroboto">Our Branch Locations</h2>
					</div>
				</div>

				<?php 
					$get_location=$pg->getlocation();
					if($get_location){
						
						while($result=$get_location->fetch_assoc()){
						
				?>
				<div class="col-md-4 col-sm-6 col-xs-12 wow  flipInY">

					<div class="mottinchuan">
						<!-- <a href=""><img src="images/f1.jpg" alt=""></a> -->

						<div class="motdong">
							<i class="fa fa-paper-plane-o"></i>
							<span class="textmd">Address : <?php echo $result['address']?></span>
						</div>
						<div class="motdong">
								<i class="fa fa-phone"></i>
								<span class="textmd">Phone :  <?php echo $result['phone']?></span>
						</div>
						<div class="motdong">
								<i class="fa fa-envelope-o"></i>
								<span class="textmd">Email :  <?php echo $result['email']?></span>
						</div>
					
					 	
 
					</div>
				</div> 
				<?php 
						}
					}
					?>
				</div> 
				

			</div>
		</div>

	</div>  <!-- HET TIN TUC O TRANG HOME -->

	 <?php
include "inc/footer.php";
?>












