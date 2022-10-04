<?php
include("include/db.php");
include("include/header.php");
include("include/logincheck.php");
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <?php include("include/navbar.php");?>
  <!-- /.navbar -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-3">
          <div class="col-sm-6">
            <h1>Advanced Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Students Course Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Student Course and Fee Structure</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
        <form action="course.php" method="post">
          <div class="card-body">
            <div class="row ml-auto">
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputname">Course Name</label>
                    <input type="text" class="form-control" id="coursename" name="coursename" placeholder="Course Name" required >
                </div> <!-- /.form-group -->               
              </div> <!-- /.col -->
              </div><!-- row-->
              <div class="col-12 col-md-12">                                                
             <div class="col-12 col-md-3" style=" float: right;">   
              <label for="examplesubmitbutton"></label>
                <button type="submit" name="insert" id="insert" value="Submit" class="btn btn-primary btn-block active">Submit</button>
                 </div><!--col-->  
                </div><!-- /.col -->
            </form>            
                    
           </div><!-- /.card --> 
   <?php
   if(isset($_POST['insert']))
     { 
      $date =  date("y-m-d H:i:s");
      $coursename = mysqli_real_escape_string($db,trim($_POST['coursename'])); 
      //$subcourse = mysqli_real_escape_string($db,trim($_POST['subcourse']));
      //$fees = mysqli_real_escape_string($db,trim($_POST['fees']));
      //$timeduration = mysqli_real_escape_string($db,trim($_POST['timeduration']));
      $sql = "INSERT INTO course (coursename,entrytime,updatetime)
            VALUES ('$coursename','$date','$date')";
            if (mysqli_query($db, $sql)) {
              echo '<meta http-equiv="refresh" content="0; url=./course.php">';
              echo "New record has been added successfully !";
           } else {
              echo "Error: " . $sql . ":-" . mysqli_error($db);
           }
           mysqli_close($db);
          }
      ?>                 
          </div> 
        </div><!-- /.row -->
      </div> 
    </section>    
  </div><!-- /.content -->
  </div><!-- ./wrapper -->
  <?php  include ("include/footer.php") ?>
  </body>
</html>
