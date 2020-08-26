<?php ob_start(); ?>
<?php

  session_start();

  if(isset($_SESSION['venue_email']))
  {
?>
<?php

  require('conn.php');

?>
<?php 

        $qry = "SELECT * FROM venue_detail WHERE venue_email = '".$_SESSION['venue_email']."'";

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
            <img alt="image" src="venue_thumbnail/<?php echo $row['venue_pic']; ?>" class="user-img-radious-style">
            <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello <?php echo $row['venue_fname']." ".$row['venue_lname'] ; ?></div>
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
            <a href="../admin_template/index.php"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">Events</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="../admin_template/index.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a class="nav-link" href="venue-multiple-image-upload.php"><i data-feather="image"></i><span>Gallery</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link"><i data-feather="user"></i><span>Customer</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link"><i data-feather="command"></i><span>My Events</span></a>
            </li>
            <li class="dropdown">
              <a href="../user/venue-overview-details.php?venue_detail_id=<?php echo $row['venue_detail_id']?>" class="nav-link"><i data-feather="globe"></i><span>Website</span></a>
            </li>
            <li class="dropdown">
              <a href="user-side-enquiry-view-form.php" class="nav-link"><i data-feather="mail"></i><span>User Enquiry</span></a>
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
    header('location: venue-login.php');
  }

?>
<?php ob_start(); ?>