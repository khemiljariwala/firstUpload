 <?php

 require('conn.php');

 ?>


 <?php 

                      $qry = "SELECT slider_img_1, slider_text_1, slider_img_2, slider_text_2, slider_img_3, slider_text_3 FROM website_details";

                      $q = mysqli_query($conn, $qry);

                      while($row = mysqli_fetch_array($q))

                      	
                      {
                      ?>
<!-- slide-section - start
		================================================== -->
		<section id="slide-section" class="slide-section clearfix">
			<div id="main-carousel1" class="main-carousel1 owl-carousel owl-theme">

				<div class="item" style="background-image: url(slider_thumbnail/<?php echo $row['slider_img_1']; ?>);">
					<div class="overlay-black">
						<div class="container">
							<div class="slider-item-content">

								<pre>
									







								</pre>

								<span class="medium-text"><?php echo $row['slider_text_1']; ?></span>  
								<!--	<h1 class="big-text">Event Planner</h1>  -->   
								<small class="small-text">every event should be perfect</small>

								<div class="link-groups">
									<pre>
										
									</pre>
								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="item" style="background-image: url(slider_thumbnail/<?php echo $row['slider_img_2']; ?>);">
					<div class="overlay-black">
						<div class="container">
							<div class="slider-item-content">

								<pre>
									







								</pre>

								<span class="medium-text"><?php echo $row['slider_text_2']; ?></span>
								<!--	<h1 class="big-text">Event Planner</h1>      --->
								<small class="small-text">every event should be perfect</small>

								<div class="link-groups">
									<pre>
										
									</pre>
								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="item" style="background-image: url(slider_thumbnail/<?php echo $row['slider_img_3']; ?>);">

					<div class="overlay-black">
						<div class="container">
							<div class="slider-item-content">

								<pre>
									







								</pre>
								<span class="medium-text"><?php echo $row['slider_text_3']; ?></span>
								<!--	<h1 class="big-text">Event Planner</h1>     -->
								<small class="small-text">every event should be perfect</small>

								<div class="link-groups">
									<pre>
										
									</pre>
								</div>

							</div>
						</div>
					</div>
				</div>

			</div>
		</section>
		<!-- slide-section - end
		================================================== -->

		             <?php
                      }
                      ?>