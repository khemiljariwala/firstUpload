<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<?php

	include "conn.php";

?>

<?php
		$qryfav = "SELECT favicon FROM website_details WHERE website_id = 0";
		$qfav = mysqli_query($conn, $qryfav);
		$rowfav = mysqli_fetch_array($qfav);
?>
	
<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<title>BookYourEvents - Venue List</title>
		<link rel="shortcut icon" type="image/png" href="favicon_thumbnail/<?php echo $rowfav['favicon']; ?>" height = "16px" width = "16px">

		<!-- fraimwork - css include -->
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

		<!-- icon css include -->
		<link rel="stylesheet" type="text/css" href="assets/css/fontawesome-all.css">
		<link rel="stylesheet" type="text/css" href="assets/css/flaticon.css">

		<!-- carousel css include -->
		<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
		<link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
		<link rel="stylesheet" type="text/css" href="assets/css/animate.css"> 
		<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/owl.theme.default.min.css">

		<!-- others css include -->
		<link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css">
		<link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/calendar.css">

		<!-- color switcher css include -->
		<link rel="stylesheet" type="text/css" href="assets/css/colors/style-switcher.css">
		<link id="color_theme" rel="stylesheet" type="text/css" href="assets/css/colors/default.css">

		<!-- custom css include -->
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">


		<script src="assets/jquery.min.js"></script>
		<script>

    	function AddReadMore()
    	{
        	//This limit you can set after how much characters you want to show Read More.
        	var carLmt = 180;
        	// Text to show when text is collapsed
        	var readMoreTxt = " ... Read More";
        	// Text to show when text is expanded
        	var readLessTxt = " Read Less";


        	//Traverse all selectors with this class and manupulate HTML part to show Read More
        	$(".addReadMore").each(function()
        	{
            	if ($(this).find(".firstSec").length)
            	{
            		return;
            	}
                

            	var allstr = $(this).text();

            	if (allstr.length > carLmt)
            	{
                	var firstSet = allstr.substring(0, carLmt);
                	var secdHalf = allstr.substring(carLmt, allstr.length);
                	var strtoadd = firstSet + "<span class='SecSec'>" + secdHalf + "</span><span class='readMore'  title='Click to Show More'>" + readMoreTxt + "</span><span class='readLess' title='Click to Show Less'>" + readLessTxt + "</span>";
                	$(this).html(strtoadd);
            	}

        	});

        	//Read More and Read Less Click Event binding
        	$(document).on("click", ".readMore,.readLess", function()
        	{
            	$(this).closest(".addReadMore").toggleClass("showlesscontent showmorecontent");
        	});
    	}

    	$(function()
    	{
        	//Calling function after Page Load
        	AddReadMore();
    	});

    	</script>

    	<style>

    	.addReadMore.showlesscontent .SecSec,
    	.addReadMore.showlesscontent .readLess
    	{
        	display: none;
    	}

    	.addReadMore.showmorecontent .readMore
    	{
        	display: none;
    	}

    	.addReadMore .readMore,
    	.addReadMore .readLess
    	{
        	font-weight: bold;
        	margin-left: 2px;
        	color: red;
        	cursor: pointer;
    	}

    	.addReadMoreWrapTxt.showmorecontent .SecSec,
    	.addReadMoreWrapTxt.showmorecontent .readLess
    	{
        	display: block;
    	}

    </style>

		
	</head>


	<body class="default-header-p">
		

		<!-- backtotop - start -->
		<div id="thetop" class="thetop"></div>
		<div class='backtotop'>
			<a href="#thetop" class='scroll'>
				<i class="fas fa-angle-double-up"></i>
			</a>
		</div>
		<!-- backtotop - end -->


		<!-- preloader - start -->
		<div id="preloader"></div>
		<!-- preloader - end -->


		<!-- header-section - start
		================================================== -->

		<?php 

			include "header-1.php";
		
		?>
		
		<!-- header-section - end
		================================================== -->


		<!-- altranative-header - start
		================================================== -->
		
		<!-- altranative-header - end
		================================================== -->


		<!-- breadcrumb-section - start
		================================================== -->
		
		<!-- breadcrumb-section - end
		================================================== -->


		<!-- event-search-section - start
		================================================== -->
		<?php

		$venue_query_string = $_GET['venue_type'];

		?>
		<section id="event-search-section" class="event-search-section clearfix" style="background-image: url(assets/images/special-offer-bg.png);">
			<div class="container">
				<div class="row">

					<!-- section-title - start -->
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="section-title">
							<small class="sub-title">Find best event on BYE!</small>
							<h2 class="big-title">Search<strong>Venues</strong></h2>
						</div>
					</div>
					<!-- section-title - end -->

					<!-- search-form - start -->

					<div class="col-lg-8 col-md-12 col-sm-12">
						<div class="search-form form-wrapper">
						<form action="user-side-list-view-search-venues.php?venue_type=<?php echo $venue_query_string ; ?>" method="POST">

								<ul>
									<li>
										<span class="title">Venue Name</span>
										<div class="form-item">
											<input type="text" name="search" placeholder="Enter Venue Name">
										</div>
									</li>
									<li>
										<button type="submit" name="submit_search" class="submit-btn">Search Venue now</button>
									</li>
								</ul>

							</form> 		
						</div>
					</div>
					<!-- search-form - end -->
					
				</div>
			</div>
		</section>
		<!-- event-search-section - end
		================================================== -->		

		<?php

			if (isset($_POST['submit_search']))
			{
				$search = mysqli_real_escape_string($conn, $_POST['search']);

				//The First Query to get total count of rows
				$qry = "SELECT COUNT(*) FROM venue_detail INNER JOIN venue_master ON venue_detail.venue_id = venue_master.venue_id WHERE venue_name LIKE '%$search%' AND venue_type = '$venue_query_string' AND venue_is_active = 1";

				$q = mysqli_query($conn, $qry);

				$row = mysqli_fetch_row($q);

				//Here we have the total row count
				$rows = $row[0];

				//This is the number of results we want to get display per page
				$page_rows = 5;

				//This tells us page number of our last page
				$last = ceil($rows/$page_rows);

				//This make sure last cannot be last then one
				if ($last < 1)
				{
					$last = 1;
				}

				//Establish the $pagenum variable
				$pagenum = 1;

				//Get Pagenum from URL vars if it is present, else it is equal to 1.
				if (isset($_GET['pn']))
				{
					$pagenum  = preg_replace('#[^0-9]#','',$_GET['pn']);
				}

				//This makes sure that page number isnt below 1, or more than our last page
				if($pagenum < 1)
				{
					$pagenum = 1;
				}
				elseif ($pagenum > $last)
				{
					$pagenum = $last;
				}

				//This sets the range of rows to query for the chosen $pagenum
				$limit = 'LIMIT ' .($pagenum - 1) * $page_rows.',' .$page_rows;

				$sql = "SELECT * FROM venue_detail INNER JOIN venue_master ON venue_detail.venue_id = venue_master.venue_id WHERE venue_name LIKE '%$search%' AND venue_type = '$venue_query_string' AND venue_is_active = 1 ORDER BY venue_detail_id DESC $limit ";

				$result = mysqli_query($conn, $sql);

				$queryResults = mysqli_num_rows($result);

				//This shows the user what page they are on, and the total number of pages
				$textline = "Page <b>$pagenum</b> of <b>$last</b>";

				//Establish the pagination control Variables
				$paginationctrls = '';

				//If There is more than 1 page worth of results
				if ($last!=1)
				{
			
				/* First we check if we are on page one. If we are then we don't need a link to the previous page or the first page so we do nothing. If we aren't then we generate links to the first page, and to the previous page.*/
				if ($pagenum > 1)
				{
					$previous = $pagenum - 1;
					$paginationctrls.='<li class="page-item prev-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?venue_type='.$venue_query_string.'&pn='.$previous.'">Prev</a></li>';

					//Render Clickable number links that should appear on the left of the target page number
					for ($i=$pagenum - 4; $i < $pagenum; $i++)
					{ 
						if ($i > 0)
						{
							$paginationctrls.='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?venue_type='.$venue_query_string.'&pn='.$i.'">'.$i.'</a></li> ';
						}
					}
				}

				//Render the target pagenumber, but without it being a link
				$paginationctrls.='<li class="page-item active"><a class="page-link">'.$pagenum.'</a> </li>';

				//Render the clickable number links that should appear on the right
				for ($i=$pagenum+1; $i <= $last ; $i++)
				{ 
					$paginationctrls.='<li class="page-item "><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?venue_type='.$venue_query_string.'&pn='.$i.'">'.$i.'</a> </li> ';
					if ($i>=$pagenum+4)
					{
						break;
					}
				}

				//This does the same as above, only checking if we are on the last page, and then generating the "Next"
				if ($pagenum != $last)
				{
					$next = $pagenum + 1;
					$paginationctrls.=' <li class="page-item next-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?venue_type='.$venue_query_string.'&pn='.$next.'">Next</a> </li>';
				}


				}

				$list = '';
																	

		?>
											
		<!-- event-section - start
		================================================== -->
		<section id="event-section" class="event-section bg-gray-light sec-ptb-100 clearfix">
			<div class="container">
				<div class="row">

					<!-- sidebar-section - start -->
					<div class="col-lg-3 col-md-12 col-sm-12">
						<div class="sidebar-section">

							<!-- Add to Calendar - start -->
							<div title="Add to Calendar" class="addeventatc">
								Add to Calendar
								<span class="start">06/18/2015 09:00 AM</span>
								<span class="end">06/18/2015 11:00 AM</span>
								<span class="timezone">Europe/Paris</span>
								<span class="title">Summary of the event</span>
								<span class="description">Description of the event</span>
								<span class="location">Location of the event</span>
								<span class="organizer">Organizer</span>
								<span class="organizer_email">Organizer e-mail</span>
								<span class="all_day_event">false</span>
								<span class="date_format">MM/DD/YYYY</span>
							</div>
							<!-- Add to Calendar - end -->

							<!-- map-wrapper - start -->
							
							<!-- map-wrapper - end -->

							<!-- spacial-event-wrapper - start -->
							
							<!-- spacial-event-wrapper - end -->
							
						</div>
					</div>
					<!-- sidebar-section - end -->

					<!-- - start -->
					<div class="col-lg-9 col-md-12 col-sm-12">

						<div class="search-result-form">

							<ul class="nav event-layout-btngroup">
								<li><a class="active"  href=""><i class="fas fa-th-list"></i></a></li>
							</ul>

						</div>

						<div class="tab-content">

							<div id="list-style" class="tab-pane fade in active show">

								
								<?php


								echo "We have Found ".$queryResults." search results!"."<br>";
		
									if($queryResults > 0)
									{
										while ($row = mysqli_fetch_assoc($result))
										{


								?>
								<!-- event-item - start -->
								<div class="event-list-item clearfix">


									<!-- event-image - start -->
									<div class="event-image">	
										<img src="../venue/venue_thumbnail/<?php echo $row['venue_pic']; ?>" alt="Image_not_found">
									</div>
									<!-- event-image - end -->

									<!-- event-content - start -->
									<div class="event-content">
										<div class="event-title mb-15">
											<h3 class="title">
												<strong><?php echo $row['venue_name']; ?></strong>
											</h3>
											
										</div>
										<p class="discription-text mb-30">
											<p class="addReadMore showlesscontent">
												<?php echo $row['venue_description']; ?>
											</p>
										</p>
										<div class="event-info-list ul-li clearfix">
											<ul>
												<li>
													<span class="icon">
														<i class="fas fa-user"></i>
													</span>
													<div class="info-content">
														<small>Owner Name</small>
														<h3><?php echo $row['venue_fname']." ".$row['venue_lname'];?></h3>
													</div>
												</li>
												<li>
													<span class="icon">
														<i class="fas fa-dollar-sign"></i>
													</span>
													<div class="info-content">
														<small>Per DayPrice</small>
														<h3><?php echo $row['venue_per_day_price']; ?></h3>
													</div>
												</li>
												<li>
													<a href="venue-overview-details.php?venue_detail_id=<?php echo $row['venue_detail_id']?>" class="tickets-details-btn">
														See More Details
													</a>
												</li>
											</ul>
										</div>
									</div>
									<!-- event-content - end -->

								</div>
								<!-- event-item - end -->
								<?php	
										}
									}
									else
									{
										echo "There are no results matching your search";
									}
								}	

								?>
								

								</div>
								<!-- event-item - end -->

								<!-- <div class="pagination ul-li clearfix">
									<ul>
										<li class="page-item prev-item">
											<a class="page-link" href="#!">Prev</a>
										</li>
										<li class="page-item"><a class="page-link" href="#!">01</a></li>
										<li class="page-item active"><a class="page-link" href="#!">02</a></li>
										<li class="page-item"><a class="page-link" href="#!">03</a></li>
										<li class="page-item"><a class="page-link" href="#!">04</a></li>
										<li class="page-item"><a class="page-link" href="#!">05</a></li>
										<li class="page-item next-item">
											<a class="page-link" href="#!">Next</a>
										</li>
									</ul>
								</div> -->

							</div>

						</div>

					</div>
					<!-- - end -->
					
				</div>

		</section>
		<!-- event-section - end
		================================================== -->


		<!-- default-footer-section - start
		================================================== -->
		
			<?php
			
				include "footer.php";

			?>

		<!-- default-footer-section - end
		================================================== -->


		<!-- fraimwork - jquery include -->
		<script src="assets/js/jquery-3.3.1.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- carousel jquery include -->
		<script src="assets/js/slick.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>

		<!-- map jquery include -->
		<script src="assets/js/gmap3.min.js"></script>
		<script src="http://maps.google.com/maps/api/js?key=AIzaSyC61_QVqt9LAhwFdlQmsNwi5aUJy9B2SyA"></script>

		<!-- calendar jquery include -->
		<script src="assets/js/atc.min.js"></script>

		<!-- others jquery include -->
		<script src="assets/js/jquery.magnific-popup.min.js"></script>
		<script src="assets/js/isotope.pkgd.min.js"></script>
		<script src="assets/js/jarallax.min.js"></script>
		<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

		<!-- gallery img loaded - jqury include -->
		<script src="assets/js/imagesloaded.pkgd.min.js"></script>

		<!-- multy count down - jqury include -->
		<script src="assets/js/jquery.countdown.js"></script>

		<!-- color panal - jqury include -->
		<!-- <script src="assets/js/style-switcher.js"></script> -->

		<!-- custom jquery include -->
		<script src="assets/js/custom.js"></script>

	</body>
</html>