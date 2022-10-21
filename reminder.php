<?php
include("include/db.php");
include("include/header.php");
include("include/logincheck.php");
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
            <h1>CREATE NEW MESSAGE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">CREATE NEW MESSAGE</li>
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
            <h3 class="card-title">CREATE NEW MESSAGE</h3>

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
        <form action="reminder.php" method="post">
          <div class="card-body">
            <div class="row ml-auto">
              <div class="col-12 col-md-12">
                <div class="form-group">
                  <label for="exampleInputname">TO</label>
                    <select class="form-control" id="to_name" name="to_name" placeholder="Select Course Name" required >
                      <option value="">Select Student</option>
                       <?php
                
              $sql = mysqli_query($db,"SELECT * From student_register group by name order by name asc");
          
                while ($row = mysqli_fetch_array($sql)){
            ?>                
              <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

              <?php
                }
              ?>
                    </select>
                </div> <!-- /.form-group -->               
              </div> <!-- /.col -->
              <div class="col-12 col-md-12">
                <div class="form-group">
                  <label for="exampleInputusername">Subject</label>
                    <input type="text" class="form-control" id="subject"  name="subject" placeholder="Subject" required>
                </div> <!-- /.form-group -->  
              </div> <!-- /.col -->

               <div class="col-12 col-md-12">
                <div class="form-group">
                  <label for="exampleInputemail">Message</label>
                    <textarea class="form-control" id="message" name="message" placeholder="Message" required></textarea> 
                </div> <!-- /.form-group -->
              </div><!--col-->

             
              </div><!-- row-->
              <div class="col-12 col-md-12">                                                
             <div class="col-12 col-md-3" style=" float: right;">   
              <label for="examplesubmitbutton"></label>
                <button type="submit" name="insert" id="insert" value="Submit" class="btn btn-success btn-block active">SEND</button>
                 </div><!--col-->  
                </div><!-- /.col -->
            </form>            
                    
           </div><!-- /.card --> 
   <?php
   if(isset($_POST['insert']))
     { 
      $date =  date("y-m-d H:i:s");
      $to_name = mysqli_real_escape_string($db,trim($_POST['to_name'])); 
      $subject = mysqli_real_escape_string($db,trim($_POST['subject']));
      $message = mysqli_real_escape_string($db,trim($_POST['message']));
     
      $sql = "INSERT INTO reminder (to_name,subject,message,entrytime,updatetime)
            VALUES ('$to_name','$subject','$message','$date','$date')";
            if (mysqli_query($db, $sql)) {
              echo '<meta http-equiv="refresh" content="0; url=./reminder.php">';
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
