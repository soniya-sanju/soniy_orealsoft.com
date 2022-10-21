<?php
include("include/db.php");
include("include/header.php");
include("include/logincheck.php");
//if(isset($_GET['studentid'])){    
            //$studentid = $_GET['studentid'];
        //}
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
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
            <h1>Certificat Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Certificat Form</li>
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
            <h3 class="card-title">Certificat Form</h3>

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
        <form action="" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row ml-auto">
                 <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInput">Student Status</label>
                    <input class="form-control" id="student_status" name="student_status" placeholder=" Student Status" required >
                      
                </div> <!-- /.form-group -->               
              </div> <!-- /.col -->
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="exampleInput">Fees status</label>
                    <input class="form-control" id="fees_status" name="fees_status" placeholder="Fees status" required>
                      
                </div> <!-- /.form-group -->               
              </div> <!-- /.col -->
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="exampleInput">Course comblintion</label>
                  <input type="text" class="form-control" id="course_comblintion" name="course_comblintion" placeholder="Course comblintion">
              </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="exampleInput">Certification status</label>
                  <input type="file" class="form-control" id="certification_status" name="certification_status" placeholder="Certification status">
              </div><!-- /.form-group -->
            </div><!-- /.col -->
             </div> <!-- /.row -->
             <div class="row ml-auto"> 
            <div class="col-12 col-md-6">
              <div class="form-group">

                <label for="exampleInput">Process done by who?</label>
                  <input type="text" class="form-control" id="staff_name" name="staff_name" placeholder="Process done by who?">
              </div><!-- /.form-group -->
            </div><!-- /.col -->
             </div> <!-- /.row --> 
             
            <div class="col-12 col-md-12">                                                
             <div class="col-12 col-md-3" style=" float: right;">   
              <label for="examplesubmitbutton"></label>
                <button type="submit" name="insert" id="insert" value="Submit" class="btn btn-primary btn-block active">Submit</button>
                 </div><!--col-->  
                </div><!-- /.col -->
            </form>            
            </div><!-- row--> 
           <?php
   if(isset($_POST['insert']))
     { 


      $date =  date("y-m-d H:i:s");
      $student_status= mysqli_real_escape_string($db,trim($_POST['student_status']));
      $fees_status = mysqli_real_escape_string($db,trim($_POST['fees_status']));  
      $course_comblintion= mysqli_real_escape_string($db,trim($_POST['course_comblintion']));
      //$certification_status= mysqli_real_escape_string($db,trim($_POST['certification_status']));
      $staff_name = mysqli_real_escape_string($db,trim($_POST['staff_name'])); 
     
    // name of the uploaded file
    $filename = $_FILES['certification_status']['name'];

     $i=0;       
              // Select file type
              $imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
              
              // valid file extensions
              $extensions_arr = array("pdf", "txt", "doc", "docx", "jpg","jpeg","png","gif");
             
              // Check extension
              if( in_array($imageFileType,$extensions_arr) ){ 
             
              // Upload files and store in database
              if(move_uploaded_file($_FILES["certification_status"]["tmp_name"],'uploadfile/'.$filename)){
                // Image db insert sql
                
               $i=1;

              }else{
                echo "<script> alert('Error in uploading file - '".$_FILES['certification_status']['name']."');</script>";
              }
              }
              if($i==1){


              $sql = "INSERT INTO  `certificat` (student_status,fees_status,course_comblintion,certification_status,staff_name,entrytime,updatetime)
              VALUES ('$student_status
              ','$fees_status','$course_comblintion','$filename','$staff_name','$date','$date')";
              if (mysqli_query($db, $sql)) {
                echo '<meta http-equiv="refresh" content="0; url=./certificat.php">';
                echo '<script>alert("New record has been added successfully !")</script>';
             } else {

                echo "Error: " . $sql . ":-" . mysqli_error($db);
             }
           }else{
             echo '<script>alert("Record added successfully !")</script>';
           }

             mysqli_close($db);
            }


            ?>

           </div><!-- /.card -->                  
          </div> 
        </div><!-- /.row -->
      </div> <!-- /.container-fluid -->     
    </section>    
  </div><!-- /.content -->
  </div><!-- ./wrapper -->
  <?php  include ("include/footer.php") ?>
   
      
    
  </body>
</html>

aa