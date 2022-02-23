
<?php
include "inc/header.php";
//  include "inc/slider.php"; 	
?>

<?php
	if(isset($_POST['contact_submit'])){
		$contact=$cus->insert_contact();
	}
?>

<style>
	.khoimenu {
    background: url(images/thanks.jpg);
    background-size: cover;
    color: white;
	}
</style>
<div class="gioithieudaubep  wow fadeInUp daubepcontact">
 		<div class="container">
 			<div class="row">
 				<div class="col-sm-4">
 					<img src="" alt="" class="img-fluid">
 				</div>
 				<div class="col-sm-7 push-sm-1 ">
 					 <div class="khoi2dong"> 						
 						<span class="fontdancing">Send A Message </span>
 						<h2 class="fontoswarld">Leave A Message Here</h2>
 						 
 					</div>
 					<div class="khoiform">
					 <?php
						if(isset($contact)){
							echo $contact;
						}

					?>
 						
						 <form action="" method="POST">
 							<div class="col-sm-12 ">
 							<p>	<input type="text" class="form-control" placeholder="Name..." name="tennguoicontact"></p>
 							</div>
 							<div class="col-sm-12">
							 <p><input type="text" class="form-control" placeholder="Phone..." name="phonecontact"></p>
 							</div>
 							<div class="col-sm-12">
							 <p><input type="text" class="form-control" placeholder="Email..."name="emailcontact"></p>
 							</div>
							 
 							<div class="col-sm-12">
							 <p><input type="text" class="form-control" placeholder="Website" name="websitecontact"></p>
 							</div>
 							<div class="col-sm-12">
 							<p><textarea name="contact_desc" class="form-control " placeholder="Your Need and Description" style="resize:none" rows="6" ></textarea></p>	
 							</div>
 							<div class="col-sm-12">
 							<p>	 <input type="submit" name="contact_submit" class="btn btn-block btn-success" Value="Send us a message"></p>	
 							</div>
						</form> 
 						
 					</div>
 				</div>
 			</div>
 		</div>
 	</div><!--  HET GIOI THIEU DAU BEP	 -->
	 <br>
	 <br>
	 

<div class="khoimenu wow fadeInUp bannerkieu2dong">  
 		<div class="tieudekhoimenu text-xs-center">
 			<div class="container">
 				<div class="row">
 					<div class="col-sm-8 push-sm-2">
 						<!-- <span class="tieudephu fontdancing">Thanks For Visit Us</span> -->
 					</div>
 				</div>
 			</div>
 			
 		</div>   <!-- HET TIEUDEKHOIMENU -->
 	</div>  <!-- HET KHOI MENU -->




<?php
include "inc/footer.php";
?>