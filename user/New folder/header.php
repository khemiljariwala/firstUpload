
		<?php
          
        	$qry = "SELECT * FROM website_details WHERE website_id = 0";

        	$q = mysqli_query($conn, $qry);

        	$row = mysqli_fetch_array($q);

        	if(!isset($_SESSION)) 
    		{ 
        		session_start(); 
    		} 

      	?>

		<!-- header-section - start
		================================================== -->
		<header id="header-section" class="header-section sticky-header-section not-stuck clearfix">
			<!-- header-bottom - start -->
			<div class="header-bottom">
				<div class="container">
					<div class="row">

						<!-- site-logo-wrapper - start -->
						<div class="col-lg-3">
							<div class="site-logo-wrapper">
								<a href="home.php" class="logo">
									<img src="logo_thumbnail/<?php echo $row['logo_pic']; ?>" alt="logo_not_found" height = "50px" width = "214px">
								</a>
							</div>
						</div>
						<!-- site-logo-wrapper - end -->

						<!-- mainmenu-wrapper - start -->
						<div class="col-lg-9">
							<div class="mainmenu-wrapper">
								<div class="row">

									<div class="col-lg-10">
										<div class="menu-item-list ul-li clearfix">
											<ul>
												<li class="menu-item-has-children active">
													<a href="home.php">Home</a>
												</li>
												<li class="menu-item-has-children">
													<a href="#!">Venues</a>
													<?php

															$qry_venue_type = "SELECT * FROM venue_master";

                      										$q_venue_type = mysqli_query($conn, $qry_venue_type);

													?>
													<ul class="sub-menu">
														<!-- venue-type - start -->
														<?php

															while($row_venue_type = mysqli_fetch_array($q_venue_type))
															{
														?>

														<li><a href='user-side-list-view-venues.php?venue_type=<?php echo $row_venue_type['venue_type']?>'><?php echo $row_venue_type['venue_type']?></a></li>

														<?php

															}

														?>
														<!-- venue-type - end -->
													</ul>
												</li>
												<li class="menu-item-has-children">
													<a href="#!">Vendors</a>
													<?php

															$qry_vendor_type = "SELECT * FROM vendor_master";

                      										$q_vendor_type = mysqli_query($conn, $qry_vendor_type);

													?>
													<ul class="sub-menu">
														<!-- vendor-type - start -->
														<?php

															while($row_vendor_type = mysqli_fetch_array($q_vendor_type))
															{
														?>

														<li><a href='user-side-list-view-vendors.php?vendor_type=<?php echo $row_vendor_type['vendor_type']?>'><?php echo $row_vendor_type['vendor_type']?></a></li>

														<?php

															}

														?>
														<!-- vendor-type - end -->
													</ul>
												</li>
												<li>
													<a href="gallery.php">gallery</a>
												</li>
												<li class="menu-item-has-children">
													<a href="blog.php">blogs</a>
												</li>
												
											</ul>
										</div>
									</div>

									<!-- menu-item-list - start -->
									<div class="col-lg-2">
										<?php

											if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
											{

										?>
												<div class="menu-item-list ul-li clearfix">
													<ul>
														<li class="menu-item-has-children">
															<a href="#!">Profile</a>
															<ul class="sub-menu">
																<li><a href="profile.php">Profile</a></li>
																<li><a href="logout.php">Logout</a></li>
															</ul>
														</li>
													</ul>
												</div>
										<?php

											}
											else
											{

										?>

										<div class="user-search-btn-group ul-li clearfix">
											<ul>
												<li>
													<a href="#alt-login-modal" class="login-modal-btn">
														<i class="fas fa-sign-in-alt"></i>
													</a>
												</li>
												<li>
													<a href="#alt-register-modal" class="login-modal-btn">
														<i class="fas fa-user-plus"></i>
													</a>
												</li>
											</ul>
										</div>

										<!-- login-btn-group - start -->
					<div class="login-btn-group">
						
						<div>
								<div id="alt-register-modal" class="reglog-modal-wrapper register-modal mfp-hide clearfix" style="background-image: url(assets/images/login-modal-bg.jpg);">
									<div class="overlay-black clearfix">

										<!-- leftside-content - start -->
										<div class="leftside-content">
											<div class="site-logo-wrapper mb-80">
												<a href="#!" class="logo">
													<img src="logo_thumbnail/<?php echo $rowfav['logo_pic']; ?>" alt="logo_not_found">
												</a>
											</div>
											<div class="register-login-link mb-80">
												<ul>
													<li class="active"><a href="#!">Register</a></li>
												</ul>
											</div>
											<div class="copyright-text">
												<p class="m-0">©2020 <a href="#!" class="yellow-color">Book Your Events.com</a> all right reserved, made with <i class="fas fa-heart"></i> by Book Your Events.com </p>
											</div>
										</div>
										<!-- leftside-content - end -->
										<!-- rightside-content - start -->
										<div class="rightside-content text-center">

											<div class="mb-30">
												<h2 class="form-title title-large white-color">Account <strong>Register</strong></h2>
											</div>

											<div class="login-form text-center mb-50">
												<form method="post" id="register" name="register">
													<div class="form-item">
														<input type="text" class="form-control" name="ufname"  placeholder="First Name" required>
													</div>
													<div class="form-item">
														<input type="text" class="form-control" name="ulname" placeholder="Last Name">
													</div>
													<div class="form-item">
														<input type="date" class="form-control" name="udob" placeholder="Date Of Birth">
													</div>
													<div class="form-item">
														<input type="text" class="form-control" name="umob" placeholder="+91">
													</div>
													<div class="form-item">
														<input type="email" class="form-control" name="uemail" placeholder="Email" required>
													<div class="invalid-feedback">
								                      It's an invalid Email, Try Again!
								                    </div>
													</div>
													<div class="form-item">
														<input type="password" class="form-control" name="upass" placeholder="Password" required>
													</div>
													<div class="form-item">
														<input type="password" class="form-control" name="ucpass" placeholder="Repeat Password">
													</div>
													<button type="submit" class="login-btn" name="register">Register</button>
												</form>
											</div>

										</div>	
										<?php

											if(empty($_POST['uemail']))
											{
											  echo "Email Cant Be Empty";
											}
											elseif(empty($_POST['upass'] && $_POST['ucpass']))
											{
											  echo "Password is Required!!!";
											}
											elseif ($_POST['upass'] != $_POST['ucpass'])
											{
											  echo "Your Passwords Do Not Match";
											}
											else
											{
												if (isset($_POST['register']))
												{
													$ufname = $_POST['ufname'];
													$ulname = $_POST['ulname'];
													$udob = $_POST['udob'];
													$umob = $_POST['umob'];
													$uemail = $_POST['uemail'];
													$upass = $_POST['upass'];
													$ucpass = $_POST['ucpass'];


													$qry_register = "SELECT * FROM user_master WHERE uemail = '$uemail'";

	 		 										$q_register = mysqli_query($conn, $qry_register);

											 		$num_register = mysqli_num_rows($q_register);

											 		if ($num_register == 1)
											  		{
											    	echo "Email Already Taken";
											  		}

											        else
											        {

														$qry_insert_register = "INSERT INTO user_master (ufname, ulname, udob, umob, uemail, upass, ucpass) VALUES ('$ufname', '$ulname', '$udob', '$umob',  '$uemail', '$upass','$ucpass')";

														$q_insert_register = mysqli_query($conn, $qry_insert_register);

														$qry_mail_register = mail($uemail, "bookyourevents", "Thank you ".$ufname." ".$ulname." For Registration to our website");

														header('location: home.php');
			 										}
			                                    }
		                                    } 

										?>

										<!-- rightside-content - end -->

										<a class="popup-modal-dismiss" href="#!">
											<i class="fas fa-times"></i>
										</a>

									</div>
								</div>

								<div id="alt-login-modal" class="reglog-modal-wrapper mfp-hide clearfix" style="background-image: url(assets/images/login-modal-bg.jpg);">
									<div class="overlay-black clearfix">

										<!-- leftside-content - start -->
										<div class="leftside-content">
											<div class="site-logo-wrapper mb-80">
												<a href="#!" class="logo">
													<img src="logo_thumbnail/<?php echo $rowfav['logo_pic']; ?>" alt="logo_not_found">
												</a>
											</div>
											<div class="register-login-link mb-80">
												<ul>
													<li class="active"><a href="#!">Login</a></li>
												</ul>
											</div>
											<div class="copyright-text">
												<p class="m-0">©2020 <a href="#!" class="yellow-color">Book Your Events.com</a> all right reserved, made with <i class="fas fa-heart"></i> by Book Your Events.com </p>
											</div>
										</div>
										<!-- leftside-content - end -->

										<!-- rightside-content - start -->
										<div class="rightside-content text-center">

											<div class="mb-30">
												<h2 class="form-title title-large white-color">Account <strong>Login</strong></h2>
											</div>

											<div class="login-form text-center mb-50">
												<form method="post" id="login" name="login">
													<div class="form-item">
														<input type="email" placeholder="Email" name="uemail" tabindex="1" required autofocus> 
														<div class="invalid-feedback">
									                      Please fill in your email
									                    </div>
													</div>
													<a href="user-forgot-password.php" class="text-small">
							                                   Forgot Password?
							                        </a>
													<div class="form-item">
														<input type="password" placeholder="Password" name="ucpass" tabindex="2" required>	
														 <div class="invalid-feedback">
									                      please fill in your password
									                     </div>
													</div>
													<pre></pre>
													<button type="submit" class="login-btn" name="login">login</button>
													</form>
											</div>

										</div>
										<!-- rightside-content - end -->

											<?php   

												if (isset($_POST['login']))
												{
													$uemail = $_POST['uemail'];
													$ucpass = $_POST['ucpass'];
													
													$qry_login = "SELECT * FROM user_master WHERE uemail = '$uemail'  && ucpass = '$ucpass'";

	 		 										$q_login = mysqli_query($conn, $qry_login);

	 		 										$num_login = mysqli_num_rows($q_login);

													if ($num_login == 1)
												    {
												    	$_SESSION['loggedin'] = true;
													    $_SESSION['uemail'] = $uemail;
                                                        header('location: '.$_SERVER['PHP_SELF']);
  
											   	    }
											   	    else
											   	    {
											   	    	echo "Your password should match password";
											   	    }
											   	}    

										    ?>						
										<a class="popup-modal-dismiss" href="#!">
											<i class="fas fa-times"></i>
										</a>

									</div>
								</div>
						</div>

					</div>
					
					<!-- login-btn-group - end -->

										<?php
										
											}

										?>
										
									</div>
									<!-- menu-item-list - end -->

								</div>
							</div>
						</div>
						<!-- mainmenu-wrapper - end -->

					</div>
				</div>
			</div>
			<!-- header-bottom - end -->
		</header>
		<!-- header-section - end
		================================================== -->