<?php ob_start(); ?>
<?php

  session_start();

  if(isset($_SESSION['aemail']))
  {
?>
<?php

  require('conn.php');

?>
<?php 

        $qry = "SELECT * FROM admin_master WHERE aemail = '".$_SESSION['aemail']."'";

        $q = mysqli_query($conn, $qry);
        $row = mysqli_fetch_array($q);

?>
<!-- Header Starts -->
<div class="navbar-bg"></div>
      
      <!-- Topbar Starts -->
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
                  collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="profile.php" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="admin_thumbnail/<?php echo $row['apic']; ?>" class="user-img-radious-style">
            <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello <?php echo $row['afname']." ".$row['alname'] ; ?></div>
              <a href="profile.php" class="dropdown-item has-icon"> <i class="far fa-user"></i> Profile </a>
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i> Logout </a>
            </div>
          </li>
        </ul>
      </nav>
      <!-- Topbar Ends -->

      <!-- Sidebar Starts -->
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="home.php"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">Events</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="home.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link"><i data-feather="user"></i><span>Customer</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Vendor</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="vendor-type-insert-form.php">Insert Vendor Type</a></li>
                <li><a class="nav-link" href="vendor-insert-form.php">Insert Vendor</a></li>
                <li><a class="nav-link" href="vendor-view-new-registrations.php">New Registered Vendors</a></li>
                <li><a class="nav-link" href="vendor-view-active-registrations.php">Active Vendors</a></li>
                <li><a class="nav-link" href="vendor-view-unactive-registrations.php">Unactive Vendors</a></li>
                <li><a class="nav-link" href="user-side-all-vendor-enquiry-view-form.php">Vendor Enquiries</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="map"></i><span>Venue</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="venue-type-insert-form.php">Insert Venue Type</a></li>
                <li><a class="nav-link" href="venue-insert-form.php">Insert Venue</a></li>
                <li><a class="nav-link" href="venue-view-new-registrations.php">New Registered Venues</a></li>
                <li><a class="nav-link" href="venue-view-active-registrations.php">Active Venues</a></li>
                <li><a class="nav-link" href="venue-view-unactive-registrations.php">Unactive Vendues</a></li>
                <li><a class="nav-link" href="user-side-all-venue-enquiry-view-form.php">Venue Enquiries</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="../user/home.php" class="nav-link"><i data-feather="globe"></i><span>Website</span></a>
            </li>
            <li class="menu-header">Manage Vendors</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Vendor</span></a>
              <?php

                $qryvendortype = "SELECT * FROM vendor_master ORDER BY vendor_type ASC";

                $qvendortype = mysqli_query($conn, $qryvendortype);

              ?>
              <ul class="dropdown-menu">
                <?php

                if (mysqli_num_rows($qvendortype) > 0)
                {
                  while($rowvendortype = mysqli_fetch_array($qvendortype))
                  {

                ?>
                    <li><a class="nav-link" href="vendor-all-view-form.php?vendor_id=<?php echo $rowvendortype['vendor_id'] ; ?>"><?php echo $rowvendortype['vendor_type'] ; ?></a></li>
                <?php

                  }
                }
                else
                {
                  echo "No Vendor Type Available!!!";
                }

                ?>
              </ul>
            </li>
            <li class="menu-header">Manage Venues</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Venues</span></a>
              <?php

                $qryvenuetype = "SELECT * FROM venue_master ORDER BY venue_type ASC";

                $qvenuetype = mysqli_query($conn, $qryvenuetype);

              ?>
              <ul class="dropdown-menu">
                <?php

                if (mysqli_num_rows($qvenuetype) > 0)
                {
                  while($rowvenuetype = mysqli_fetch_array($qvenuetype))
                  {

                ?>
                    <li><a class="nav-link" href="venue-all-view-form.php?venue_id=<?php echo $rowvenuetype['venue_id'] ; ?>"><?php echo $rowvenuetype['venue_type'] ; ?></a></li>
                <?php

                  }
                }
                else
                {
                  echo "No Venue Type Available!!!";
                }

                ?>
              </ul>
            </li>
            <li class="menu-header">Dynamic User Side</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="aperture"></i><span>Media Links</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="user-side-facebook-insert-form.php">Facebook</a></li>
                <li><a class="nav-link" href="user-side-instagram-insert-form.php">Instagram</a></li>
                <li><a class="nav-link" href="user-side-phone-no-insert-form.php">Phone Number</a></li>
                <li><a class="nav-link" href="user-side-email-id-insert-form.php">Email-ID</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="sliders"></i><span>Slider</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="user-side-slider-image-insert-form.php">Slider Images</a></li>
                <li><a class="nav-link" href="user-side-slider-text-insert-form.php">Slider Text</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>Logos</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="user-side-logo-insert-form.php">User Logo</a></li>
                <li><a class="nav-link" href="user-side-favicon-insert-form.php">User Favicon</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="activity"></i><span>Others</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="user-side-blog-insert-form.php">Blog</a></li>
                <li><a class="nav-link" href="user-side-address-insert-form.php">Address</a></li>
                <li><a class="nav-link" href="user-side-map-insert-form.php">Map</a></li>
                <li><a class="nav-link" href="user-side-gallery-insert-form.php">Gallery</a></li>
                <li><a class="nav-link" href="user-side-about-us-insert-form.php">About Us</a></li>
                <li><a class="nav-link" href="user-side-contact-us-view-form.php">Contact Us</a></li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>
      <!-- Sidebar Ends-->
<!-- Header Ends -->
<?php
  }
  else
  {
    header('location: auth-login.php');
  }

?>