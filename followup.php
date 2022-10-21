<?php
include("include/db.php");
include("include/header.php");
include("include/logincheck.php");

if(isset($_GET['id'])){ $id = $_GET['id'];}

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
            <h1>Follow up Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Follow up Form</li>
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
            <h3 class="card-title">Feedback</h3>

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
          <?php 
         
          $sqlq=mysqli_query($db,"SELECT id FROM enquiry WHERE id='".$id."' ");
           
          if(mysqli_num_rows($sqlq) >0)
            {        
          $row = mysqli_fetch_array($sqlq);  
            ?>

        <form action="followup.php" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row ml-auto">
             <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputname">Enquiry id</label>
                    <input type="number" class="form-control" id="enqid" name="enqid" placeholder="Enquiry id" required  value="<?php echo $row['id'];?>" readonly>
                </div> <!-- /.form-group -->               
              </div> <!-- /.col -->
            <?php }?>
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputname">Name(Who?)</label>
                    <input type="text" class="form-control" id="staff_name" name="staff_name" placeholder=" Staff Name" required >
                </div> <!-- /.form-group -->               
              </div> <!-- /.col -->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputname">Replay</label>
                    <input type="text" class="form-control" id="Replay" name="Replay" placeholder="Replay" required >
                </div> <!-- /.form-group -->               
              </div> <!-- /.col -->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputname">Description</label>
                    <input type="text" class="form-control" id="Description" name="Description" placeholder="Description" required >
                </div> <!-- /.form-group -->               
              </div> <!-- /.col -->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputname">Admission status</label>
                    <input type="text" class="form-control" id="Admission_status" name="Admission_status" placeholder="Admission status" required >
                </div> <!-- /.form-group -->               
              </div> <!-- /.col -->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInputname">Date ways updations</label>
                    <input type="date" class="form-control" id="updation" name="updation" placeholder="Date ways updations" required >
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
      $enqid=mysqli_real_escape_string($db,trim($_POST['enqid']));
      $staff_name = mysqli_real_escape_string($db,trim($_POST['staff_name'])); 
      $Replay = mysqli_real_escape_string($db,trim($_POST['Replay']));
      $Description = mysqli_real_escape_string($db,trim($_POST['Description']));
      $Admission_status = mysqli_real_escape_string($db,trim($_POST['Admission_status']));
      $updation = mysqli_real_escape_string($db,trim($_POST['updation']));
    $sql = "INSERT INTO `feedback` (`enqid`, `staff_name`, `Replay`, `Description`, `Admission_status`, `updation`, `entrytime`, `updatetime`)VALUES ('$enqid','$staff_name',' $Replay','$Description','$Admission_status','$updation','$date','$date')";
 
            if (mysqli_query($db, $sql)) {
              echo '<meta http-equiv="refresh" content="0; url=./followupview.php">';
              echo "New record has been added successfully !";
            
           } else {
              echo "Error: " . $sql . ":-" . mysqli_error($db);
           }
         }
         mysqli_close($db);
          
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
