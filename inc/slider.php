
<div class="slide">
 	<div id="slidehome" class="carousel slide slidecon" data-ride="carousel">
			<ol class="carousel-indicators">
				
				<li data-target="#slidehome" data-slide-to="0" class="active"></li>
				<?php 
					$get_slider=$product->show_slider();
					if($get_slider){
						$i=1;
						while($result=$get_slider->fetch_assoc()){
						
				?>
				<li data-target="#slidehome" data-slide-to="<?php echo $i ?>" ></li>
				<?php 
				$i++;
			}
				}
				?>
			</ol>
			<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
 							
 							<div class="chu">
 								<h2 class=" fontoswarld">Coffee </h2>
 								<p  >Coffee for a productive day  </p>
 								
 							</div>
 							<img src="images/background1.png" alt="">
 						</div>
					<?php 
						$get_slider=$product->show_slider();
						if($get_slider){
							$i=1;
							while($result=$get_slider->fetch_assoc()){
						
					?>
						<div class="carousel-item">
 							<div class="chu">
 								<h2 class=" fontoswarld"><?php echo $result['slider_name'] ?> </h2>
 								<p><?php echo $result['slider_desc'] ?>  </p>
 								
 							</div>
 							<img src="admin/uploads/<?php echo $result['slider_img'] ?>" alt="">
 						</div>

						<?php
						 $i++;
			}
				}
				?>

 						
			</div>
			<a class="left carousel-control" href="#slidehome" role="button" data-slide="prev">
				<span class="icon-prev" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#slidehome" role="button" data-slide="next">
				<span class="icon-next" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
 	</div> <!-- het slide  -->