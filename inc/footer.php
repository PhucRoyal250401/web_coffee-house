
	<div class="footertop">
		<div class="container">
			<div class="row">
				<div class="col-sm-3 cotf1 mb-2 wow fadeInUp" data-wow-delay="0s">
					<a href="index.php"><img src="images/logo10.png" alt="" class="logof" style="width:123px;height:123px"></a>
					<p>Behind every successful person is a substantial amount of coffee</p>
					<div class="motdong">
						<i class="fa fa-paper-plane-o"></i>
						<span class="textmd">Address :<?php echo $pg->getaddress()?></span>
					</div>
					<div class="motdong">
						<i class="fa fa-phone"></i>
						<span class="textmd">Phone : <?php echo $pg->getphone();?></span>
					</div>
					<div class="motdong">
						<i class="fa fa-envelope-o"></i>
						<span class="textmd">Email :  <?php echo $pg->getemail();?></span>
					</div>
					

				</div>  <!-- HET COTF1 -->
				<div class="col-sm-2 push-sm-1 cotf2 mb-2  wow fadeInUp" data-wow-delay="0.1s">
					<h2 class="tdft">Information</h2>
					<ul>
						<li><a href="about.php">About company </a></li>
						<li><a href="thucdon.php">Menu </a></li>
						
					</ul>
				</div>  <!-- HET COTF2 -->
				<div class="col-sm-3  cotf3 mb-2 wow  fadeInUp" data-wow-delay="0.2s">
					<h2 class="tdft">Information </h2>
					<ul>
						<li><a href="index.php">Our Blog </a></li>
						<li><a href="contact.php">Contact us  </a></li>
						
					</ul>
				</div> 
				<div class="col-sm-3  cotf4 wow  fadeInUp" data-wow-delay="0.3s">
					<h2 class="tdft">Openning hours </h2>
					<div class="openning1">
						<div class="phai float-xs-right"> <?php echo $pg->getopening();?></div>
						<div class="trai">Mon — Sun</div>
					</div>
				</div>  <!-- HET COTF4 -->
				
			</div>
		</div>
	</div>  <!-- HET FOOTERTOP -->

