 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      
      <li class="nav-item">
        <?php
              if(!isset($_SESSION["id"])){
            ?>
                <a href="login.php" class="nav-link text-body font-weight-bold px-0 ">
                  <i class="fa fa-user me-sm-1"></i>
                  <span class="d-sm-inline d-none">Login</span>
                </a>
              </li>
               <?php
                }else{  
                ?> 
               <li class="nav-item">
              <a href="logout.php" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Log Out</span>
              </a>
            </li>

            <?php
              }
            ?> 
        <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CADD Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="studentregister.php" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p> Student Register</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="studentregisterview.php" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p> Student Register View</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="course.php" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p> Course </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="courseview.php" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p> Course View</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="subcourse.php" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p>Sub Course </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="subcourseview.php" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p>Sub Course View </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="enquiry.php" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p>Enquiry</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="enquiryview.php" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p>Enquiry View</p>
            </a>
          </li>
         
          <li class="nav-item">
                <a href="forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Monthly collection</p>
                </a>
              </li>
         <li class="nav-item">
                <a href="forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Total admission</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Today Collection</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reminder</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Feedback</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Follow up</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Certification</p>
                </a>
              </li>
              <li class="nav-item menu-open">
            <a href="#" class="nav-link ">
              <!--<i class="nav-icon fas fa-edit"></i>-->
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fees report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="forms/advanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Enquiry report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="forms/editors.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Institute ways report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admission report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Total collection</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Total expense</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
                <a href="forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Day Book</p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>